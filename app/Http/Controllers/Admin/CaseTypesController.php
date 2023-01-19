<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCaseTypeRequest;
use App\Http\Requests\StoreCaseTypeRequest;
use App\Http\Requests\UpdateCaseTypeRequest;
use App\Models\CaseType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseTypes = CaseType::all();

        return view('admin.caseTypes.index', compact('caseTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('case_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.caseTypes.create');
    }

    public function store(StoreCaseTypeRequest $request)
    {
        $caseType = CaseType::create($request->all());

        return redirect()->route('admin.case-types.index');
    }

    public function edit(CaseType $caseType)
    {
        abort_if(Gate::denies('case_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.caseTypes.edit', compact('caseType'));
    }

    public function update(UpdateCaseTypeRequest $request, CaseType $caseType)
    {
        $caseType->update($request->all());

        return redirect()->route('admin.case-types.index');
    }

    public function show(CaseType $caseType)
    {
        abort_if(Gate::denies('case_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.caseTypes.show', compact('caseType'));
    }

    public function destroy(CaseType $caseType)
    {
        abort_if(Gate::denies('case_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCaseTypeRequest $request)
    {
        CaseType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
