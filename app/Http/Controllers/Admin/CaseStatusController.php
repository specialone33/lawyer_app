<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCaseStatusRequest;
use App\Http\Requests\StoreCaseStatusRequest;
use App\Http\Requests\UpdateCaseStatusRequest;
use App\Models\CaseStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseStatuses = CaseStatus::all();

        return view('admin.caseStatuses.index', compact('caseStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('case_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.caseStatuses.create');
    }

    public function store(StoreCaseStatusRequest $request)
    {
        $caseStatus = CaseStatus::create($request->all());

        return redirect()->route('admin.case-statuses.index');
    }

    public function edit(CaseStatus $caseStatus)
    {
        abort_if(Gate::denies('case_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.caseStatuses.edit', compact('caseStatus'));
    }

    public function update(UpdateCaseStatusRequest $request, CaseStatus $caseStatus)
    {
        $caseStatus->update($request->all());

        return redirect()->route('admin.case-statuses.index');
    }

    public function show(CaseStatus $caseStatus)
    {
        abort_if(Gate::denies('case_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.caseStatuses.show', compact('caseStatus'));
    }

    public function destroy(CaseStatus $caseStatus)
    {
        abort_if(Gate::denies('case_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyCaseStatusRequest $request)
    {
        CaseStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
