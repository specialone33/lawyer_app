<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompanyContractAlterationRequest;
use App\Http\Requests\StoreCompanyContractAlterationRequest;
use App\Http\Requests\UpdateCompanyContractAlterationRequest;
use App\Models\CompanyContractAlteration;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyContractAlterationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('company_contract_alteration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyContractAlterations = CompanyContractAlteration::all();

        return view('admin.companyContractAlterations.index', compact('companyContractAlterations'));
    }

    public function create()
    {
        abort_if(Gate::denies('company_contract_alteration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyContractAlterations.create');
    }

    public function store(StoreCompanyContractAlterationRequest $request)
    {
        $companyContractAlteration = CompanyContractAlteration::create($request->all());

        return redirect()->route('admin.company-contract-alterations.index');
    }

    public function edit(CompanyContractAlteration $companyContractAlteration)
    {
        abort_if(Gate::denies('company_contract_alteration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyContractAlterations.edit', compact('companyContractAlteration'));
    }

    public function update(UpdateCompanyContractAlterationRequest $request, CompanyContractAlteration $companyContractAlteration)
    {
        $companyContractAlteration->update($request->all());

        return redirect()->route('admin.company-contract-alterations.index');
    }

    public function show(CompanyContractAlteration $companyContractAlteration)
    {
        abort_if(Gate::denies('company_contract_alteration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyContractAlterations.show', compact('companyContractAlteration'));
    }

    public function destroy(CompanyContractAlteration $companyContractAlteration)
    {
        abort_if(Gate::denies('company_contract_alteration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyContractAlteration->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyContractAlterationRequest $request)
    {
        CompanyContractAlteration::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
