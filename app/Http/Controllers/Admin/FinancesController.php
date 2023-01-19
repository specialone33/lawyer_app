<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFinanceRequest;
use App\Http\Requests\StoreFinanceRequest;
use App\Http\Requests\UpdateFinanceRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinancesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('finance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finances.index');
    }

    public function create()
    {
        abort_if(Gate::denies('finance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finances.create');
    }

    public function store(StoreFinanceRequest $request)
    {
        $finance = Finance::create($request->all());

        return redirect()->route('admin.finances.index');
    }

    public function edit(Finance $finance)
    {
        abort_if(Gate::denies('finance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finances.edit', compact('finance'));
    }

    public function update(UpdateFinanceRequest $request, Finance $finance)
    {
        $finance->update($request->all());

        return redirect()->route('admin.finances.index');
    }

    public function show(Finance $finance)
    {
        abort_if(Gate::denies('finance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finances.show', compact('finance'));
    }

    public function destroy(Finance $finance)
    {
        abort_if(Gate::denies('finance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finance->delete();

        return back();
    }

    public function massDestroy(MassDestroyFinanceRequest $request)
    {
        Finance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
