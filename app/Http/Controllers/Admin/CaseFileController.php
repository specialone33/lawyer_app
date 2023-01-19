<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCaseFileRequest;
use App\Http\Requests\StoreCaseFileRequest;
use App\Http\Requests\UpdateCaseFileRequest;
use App\Models\CaseFile;
use App\Models\CaseStatus;
use App\Models\CaseType;
use App\Models\Court;
use App\Models\Customer;
use App\Models\Lawyer;
use App\Models\OneTimeFee;
use App\Models\Proccess;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseFileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_file_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseFiles = CaseFile::with(['case_type', 'user', 'court', 'procedural_process', 'case_status', 'customers', 'lawyer', 'one_time_fees'])->get();

        return view('admin.caseFiles.index', compact('caseFiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('case_file_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $case_types = CaseType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courts = Court::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $procedural_processes = Proccess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $case_statuses = CaseStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('surname', 'id');

        $lawyers = Lawyer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $one_time_fees = OneTimeFee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.caseFiles.create', compact('case_statuses', 'case_types', 'courts', 'customers', 'lawyers', 'one_time_fees', 'procedural_processes', 'users'));
    }

    public function store(StoreCaseFileRequest $request)
    {
        $caseFile = CaseFile::create($request->all());
        $caseFile->customers()->sync($request->input('customers', []));

        return redirect()->route('admin.case-files.index');
    }

    public function edit(CaseFile $caseFile)
    {
        abort_if(Gate::denies('case_file_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $case_types = CaseType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courts = Court::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $procedural_processes = Proccess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $case_statuses = CaseStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('surname', 'id');

        $lawyers = Lawyer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $one_time_fees = OneTimeFee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $caseFile->load('case_type', 'user', 'court', 'procedural_process', 'case_status', 'customers', 'lawyer', 'one_time_fees');

        return view('admin.caseFiles.edit', compact('caseFile', 'case_statuses', 'case_types', 'courts', 'customers', 'lawyers', 'one_time_fees', 'procedural_processes', 'users'));
    }

    public function update(UpdateCaseFileRequest $request, CaseFile $caseFile)
    {
        $caseFile->update($request->all());
        $caseFile->customers()->sync($request->input('customers', []));

        return redirect()->route('admin.case-files.index');
    }

    public function show(CaseFile $caseFile)
    {
        abort_if(Gate::denies('case_file_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseFile->load('case_type', 'user', 'court', 'procedural_process', 'case_status', 'customers', 'lawyer', 'one_time_fees');

        return view('admin.caseFiles.show', compact('caseFile'));
    }

    public function destroy(CaseFile $caseFile)
    {
        abort_if(Gate::denies('case_file_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseFile->delete();

        return back();
    }

    public function massDestroy(MassDestroyCaseFileRequest $request)
    {
        CaseFile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
