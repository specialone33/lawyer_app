<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLawyerRequest;
use App\Http\Requests\StoreLawyerRequest;
use App\Http\Requests\UpdateLawyerRequest;
use App\Models\Lawyer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LawyerController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('lawyer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Lawyer::query()->select(sprintf('%s.*', (new Lawyer())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'lawyer_show';
                $editGate = 'lawyer_edit';
                $deleteGate = 'lawyer_delete';
                $crudRoutePart = 'lawyers';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('surname', function ($row) {
                return $row->surname ? $row->surname : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.lawyers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lawyer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lawyers.create');
    }

    public function store(StoreLawyerRequest $request)
    {
        $lawyer = Lawyer::create($request->all());

        return redirect()->route('admin.lawyers.index');
    }

    public function edit(Lawyer $lawyer)
    {
        abort_if(Gate::denies('lawyer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lawyers.edit', compact('lawyer'));
    }

    public function update(UpdateLawyerRequest $request, Lawyer $lawyer)
    {
        $lawyer->update($request->all());

        return redirect()->route('admin.lawyers.index');
    }

    public function show(Lawyer $lawyer)
    {
        abort_if(Gate::denies('lawyer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lawyers.show', compact('lawyer'));
    }

    public function destroy(Lawyer $lawyer)
    {
        abort_if(Gate::denies('lawyer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lawyer->delete();

        return back();
    }

    public function massDestroy(MassDestroyLawyerRequest $request)
    {
        Lawyer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
