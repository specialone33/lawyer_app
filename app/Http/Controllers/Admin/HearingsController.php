<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHearingRequest;
use App\Http\Requests\StoreHearingRequest;
use App\Http\Requests\UpdateHearingRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HearingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hearing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hearings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hearing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hearings.create');
    }

    public function store(StoreHearingRequest $request)
    {
        $hearing = Hearing::create($request->all());

        return redirect()->route('admin.hearings.index');
    }

    public function edit(Hearing $hearing)
    {
        abort_if(Gate::denies('hearing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hearings.edit', compact('hearing'));
    }

    public function update(UpdateHearingRequest $request, Hearing $hearing)
    {
        $hearing->update($request->all());

        return redirect()->route('admin.hearings.index');
    }

    public function show(Hearing $hearing)
    {
        abort_if(Gate::denies('hearing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hearings.show', compact('hearing'));
    }

    public function destroy(Hearing $hearing)
    {
        abort_if(Gate::denies('hearing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hearing->delete();

        return back();
    }

    public function massDestroy(MassDestroyHearingRequest $request)
    {
        Hearing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
