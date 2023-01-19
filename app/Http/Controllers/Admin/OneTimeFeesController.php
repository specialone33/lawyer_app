<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOneTimeFeeRequest;
use App\Http\Requests\StoreOneTimeFeeRequest;
use App\Http\Requests\UpdateOneTimeFeeRequest;
use App\Models\OneTimeFee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OneTimeFeesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('one_time_fee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $oneTimeFees = OneTimeFee::all();

        return view('admin.oneTimeFees.index', compact('oneTimeFees'));
    }

    public function create()
    {
        abort_if(Gate::denies('one_time_fee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.oneTimeFees.create');
    }

    public function store(StoreOneTimeFeeRequest $request)
    {
        $oneTimeFee = OneTimeFee::create($request->all());

        return redirect()->route('admin.one-time-fees.index');
    }

    public function edit(OneTimeFee $oneTimeFee)
    {
        abort_if(Gate::denies('one_time_fee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.oneTimeFees.edit', compact('oneTimeFee'));
    }

    public function update(UpdateOneTimeFeeRequest $request, OneTimeFee $oneTimeFee)
    {
        $oneTimeFee->update($request->all());

        return redirect()->route('admin.one-time-fees.index');
    }

    public function show(OneTimeFee $oneTimeFee)
    {
        abort_if(Gate::denies('one_time_fee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.oneTimeFees.show', compact('oneTimeFee'));
    }

    public function destroy(OneTimeFee $oneTimeFee)
    {
        abort_if(Gate::denies('one_time_fee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $oneTimeFee->delete();

        return back();
    }

    public function massDestroy(MassDestroyOneTimeFeeRequest $request)
    {
        OneTimeFee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
