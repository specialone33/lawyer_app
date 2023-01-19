<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProccessRequest;
use App\Http\Requests\StoreProccessRequest;
use App\Http\Requests\UpdateProccessRequest;
use App\Models\Proccess;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProccessController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('proccess_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Proccess::query()->select(sprintf('%s.*', (new Proccess())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'proccess_show';
                $editGate = 'proccess_edit';
                $deleteGate = 'proccess_delete';
                $crudRoutePart = 'proccesses';

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

        return view('admin.proccesses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('proccess_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proccesses.create');
    }

    public function store(StoreProccessRequest $request)
    {
        $proccess = Proccess::create($request->all());

        return redirect()->route('admin.proccesses.index');
    }

    public function edit(Proccess $proccess)
    {
        abort_if(Gate::denies('proccess_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proccesses.edit', compact('proccess'));
    }

    public function update(UpdateProccessRequest $request, Proccess $proccess)
    {
        $proccess->update($request->all());

        return redirect()->route('admin.proccesses.index');
    }

    public function show(Proccess $proccess)
    {
        abort_if(Gate::denies('proccess_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.proccesses.show', compact('proccess'));
    }

    public function destroy(Proccess $proccess)
    {
        abort_if(Gate::denies('proccess_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proccess->delete();

        return back();
    }

    public function massDestroy(MassDestroyProccessRequest $request)
    {
        Proccess::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
