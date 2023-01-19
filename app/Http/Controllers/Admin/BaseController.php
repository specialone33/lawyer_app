<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBasiRequest;
use App\Http\Requests\StoreBasiRequest;
use App\Http\Requests\UpdateBasiRequest;
use App\Models\Basi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BaseController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('basi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Basi::query()->select(sprintf('%s.*', (new Basi())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'basi_show';
                $editGate = 'basi_edit';
                $deleteGate = 'basi_delete';
                $crudRoutePart = 'basis';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('link', function ($row) {
                return $row->link ? $row->link : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.basis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('basi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.basis.create');
    }

    public function store(StoreBasiRequest $request)
    {
        $basi = Basi::create($request->all());

        return redirect()->route('admin.basis.index');
    }

    public function edit(Basi $basi)
    {
        abort_if(Gate::denies('basi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.basis.edit', compact('basi'));
    }

    public function update(UpdateBasiRequest $request, Basi $basi)
    {
        $basi->update($request->all());

        return redirect()->route('admin.basis.index');
    }

    public function show(Basi $basi)
    {
        abort_if(Gate::denies('basi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.basis.show', compact('basi'));
    }

    public function destroy(Basi $basi)
    {
        abort_if(Gate::denies('basi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $basi->delete();

        return back();
    }

    public function massDestroy(MassDestroyBasiRequest $request)
    {
        Basi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
