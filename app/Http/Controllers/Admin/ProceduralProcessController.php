<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProceduralProcessRequest;
use App\Http\Requests\StoreProceduralProcessRequest;
use App\Http\Requests\UpdateProceduralProcessRequest;
use App\Models\Proccess;
use App\Models\ProceduralProcess;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProceduralProcessController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('procedural_process_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proceduralProcesses = ProceduralProcess::with(['user', 'proccess'])->get();

        return view('admin.proceduralProcesses.index', compact('proceduralProcesses'));
    }

    public function create()
    {
        abort_if(Gate::denies('procedural_process_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proccesses = Proccess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.proceduralProcesses.create', compact('proccesses', 'users'));
    }

    public function store(StoreProceduralProcessRequest $request)
    {
        $proceduralProcess = ProceduralProcess::create($request->all());

        return redirect()->route('admin.procedural-processes.index');
    }

    public function edit(ProceduralProcess $proceduralProcess)
    {
        abort_if(Gate::denies('procedural_process_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proccesses = Proccess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proceduralProcess->load('user', 'proccess');

        return view('admin.proceduralProcesses.edit', compact('proccesses', 'proceduralProcess', 'users'));
    }

    public function update(UpdateProceduralProcessRequest $request, ProceduralProcess $proceduralProcess)
    {
        $proceduralProcess->update($request->all());

        return redirect()->route('admin.procedural-processes.index');
    }

    public function show(ProceduralProcess $proceduralProcess)
    {
        abort_if(Gate::denies('procedural_process_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proceduralProcess->load('user', 'proccess');

        return view('admin.proceduralProcesses.show', compact('proceduralProcess'));
    }

    public function destroy(ProceduralProcess $proceduralProcess)
    {
        abort_if(Gate::denies('procedural_process_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proceduralProcess->delete();

        return back();
    }

    public function massDestroy(MassDestroyProceduralProcessRequest $request)
    {
        ProceduralProcess::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
