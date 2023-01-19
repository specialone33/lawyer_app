<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompanyContractRequest;
use App\Http\Requests\StoreCompanyContractRequest;
use App\Http\Requests\UpdateCompanyContractRequest;
use App\Models\CompanyContract;
use App\Models\CompanyContractAlteration;
use App\Models\CompanyType;
use App\Models\Customer;
use App\Models\Lawyer;
use App\Models\OneTimeFee;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CompanyContractController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('company_contract_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CompanyContract::with(['company_type', 'user', 'customers', 'lawyer', 'one_time_fees', 'alterations'])->select(sprintf('%s.*', (new CompanyContract())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'company_contract_show';
                $editGate = 'company_contract_edit';
                $deleteGate = 'company_contract_delete';
                $crudRoutePart = 'company-contracts';

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
            $table->editColumn('case_file_number', function ($row) {
                return $row->case_file_number ? $row->case_file_number : '';
            });

            $table->addColumn('company_type_name', function ($row) {
                return $row->company_type ? $row->company_type->name : '';
            });

            $table->addColumn('user_surname', function ($row) {
                return $row->user ? $row->user->surname : '';
            });

            $table->editColumn('user.email', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->email) : '';
            });
            $table->editColumn('user.surname', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->surname) : '';
            });
            $table->editColumn('customers', function ($row) {
                $labels = [];
                foreach ($row->customers as $customer) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $customer->surname);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('opponent', function ($row) {
                return $row->opponent ? $row->opponent : '';
            });

            $table->addColumn('lawyer_surname', function ($row) {
                return $row->lawyer ? $row->lawyer->surname : '';
            });

            $table->editColumn('lawyer.name', function ($row) {
                return $row->lawyer ? (is_string($row->lawyer) ? $row->lawyer : $row->lawyer->name) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'company_type', 'user', 'customers', 'lawyer']);

            return $table->make(true);
        }

        return view('admin.companyContracts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('company_contract_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company_types = CompanyType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('surname', 'id');

        $lawyers = Lawyer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $one_time_fees = OneTimeFee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alterations = CompanyContractAlteration::pluck('name', 'id');

        return view('admin.companyContracts.create', compact('alterations', 'company_types', 'customers', 'lawyers', 'one_time_fees', 'users'));
    }

    public function store(StoreCompanyContractRequest $request)
    {
        $companyContract = CompanyContract::create($request->all());
        $companyContract->customers()->sync($request->input('customers', []));
        $companyContract->alterations()->sync($request->input('alterations', []));

        return redirect()->route('admin.company-contracts.index');
    }

    public function edit(CompanyContract $companyContract)
    {
        abort_if(Gate::denies('company_contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company_types = CompanyType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('surname', 'id');

        $lawyers = Lawyer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $one_time_fees = OneTimeFee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alterations = CompanyContractAlteration::pluck('name', 'id');

        $companyContract->load('company_type', 'user', 'customers', 'lawyer', 'one_time_fees', 'alterations');

        return view('admin.companyContracts.edit', compact('alterations', 'companyContract', 'company_types', 'customers', 'lawyers', 'one_time_fees', 'users'));
    }

    public function update(UpdateCompanyContractRequest $request, CompanyContract $companyContract)
    {
        $companyContract->update($request->all());
        $companyContract->customers()->sync($request->input('customers', []));
        $companyContract->alterations()->sync($request->input('alterations', []));

        return redirect()->route('admin.company-contracts.index');
    }

    public function show(CompanyContract $companyContract)
    {
        abort_if(Gate::denies('company_contract_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyContract->load('company_type', 'user', 'customers', 'lawyer', 'one_time_fees', 'alterations');

        return view('admin.companyContracts.show', compact('companyContract'));
    }

    public function destroy(CompanyContract $companyContract)
    {
        abort_if(Gate::denies('company_contract_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyContract->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyContractRequest $request)
    {
        CompanyContract::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
