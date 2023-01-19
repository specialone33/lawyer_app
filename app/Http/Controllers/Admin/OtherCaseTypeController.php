<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOtherCaseTypeRequest;
use App\Http\Requests\StoreOtherCaseTypeRequest;
use App\Http\Requests\UpdateOtherCaseTypeRequest;
use App\Models\OtherCaseType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OtherCaseTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('other_case_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherCaseTypes = OtherCaseType::all();

        return view('admin.otherCaseTypes.index', compact('otherCaseTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('other_case_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.otherCaseTypes.create');
    }

    public function store(StoreOtherCaseTypeRequest $request)
    {
        $otherCaseType = OtherCaseType::create($request->all());

        return redirect()->route('admin.other-case-types.index');
    }

    public function edit(OtherCaseType $otherCaseType)
    {
        abort_if(Gate::denies('other_case_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.otherCaseTypes.edit', compact('otherCaseType'));
    }

    public function update(UpdateOtherCaseTypeRequest $request, OtherCaseType $otherCaseType)
    {
        $otherCaseType->update($request->all());

        return redirect()->route('admin.other-case-types.index');
    }

    public function show(OtherCaseType $otherCaseType)
    {
        abort_if(Gate::denies('other_case_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.otherCaseTypes.show', compact('otherCaseType'));
    }

    public function destroy(OtherCaseType $otherCaseType)
    {
        abort_if(Gate::denies('other_case_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherCaseType->delete();

        return back();
    }

    public function massDestroy(MassDestroyOtherCaseTypeRequest $request)
    {
        OtherCaseType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
