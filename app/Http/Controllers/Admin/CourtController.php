<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourtRequest;
use App\Http\Requests\StoreCourtRequest;
use App\Http\Requests\UpdateCourtRequest;
use App\Models\Court;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourtController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('court_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Court::query()->select(sprintf('%s.*', (new Court())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'court_show';
                $editGate = 'court_edit';
                $deleteGate = 'court_delete';
                $crudRoutePart = 'courts';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.courts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('court_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courts.create');
    }

    public function store(StoreCourtRequest $request)
    {
        $court = Court::create($request->all());

        return redirect()->route('admin.courts.index');
    }

    public function edit(Court $court)
    {
        abort_if(Gate::denies('court_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courts.edit', compact('court'));
    }

    public function update(UpdateCourtRequest $request, Court $court)
    {
        $court->update($request->all());

        return redirect()->route('admin.courts.index');
    }

    public function show(Court $court)
    {
        abort_if(Gate::denies('court_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courts.show', compact('court'));
    }

    public function destroy(Court $court)
    {
        abort_if(Gate::denies('court_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $court->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourtRequest $request)
    {
        Court::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
