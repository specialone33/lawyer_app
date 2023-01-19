<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContractRequest;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Customer;
use App\Models\Lawyer;
use App\Models\OneTimeFee;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContractController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('contract_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Contract::with(['contract_type', 'user', 'customers', 'lawyer', 'one_time_fees'])->select(sprintf('%s.*', (new Contract())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'contract_show';
                $editGate = 'contract_edit';
                $deleteGate = 'contract_delete';
                $crudRoutePart = 'contracts';

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

            $table->addColumn('contract_type_name', function ($row) {
                return $row->contract_type ? $row->contract_type->name : '';
            });

            $table->editColumn('contract_description', function ($row) {
                return $row->contract_description ? $row->contract_description : '';
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
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : '';
            });
            $table->editColumn('charging_expenses', function ($row) {
                return $row->charging_expenses ? $row->charging_expenses : '';
            });
            $table->editColumn('hours', function ($row) {
                return $row->hours ? $row->hours : '';
            });
            $table->editColumn('hourly_rate', function ($row) {
                return $row->hourly_rate ? $row->hourly_rate : '';
            });
            $table->addColumn('one_time_fees_name', function ($row) {
                return $row->one_time_fees ? $row->one_time_fees->name : '';
            });

            $table->editColumn('one_time_fees.value', function ($row) {
                return $row->one_time_fees ? (is_string($row->one_time_fees) ? $row->one_time_fees : $row->one_time_fees->value) : '';
            });
            $table->editColumn('custom_one_time_fee_name', function ($row) {
                return $row->custom_one_time_fee_name ? $row->custom_one_time_fee_name : '';
            });
            $table->editColumn('custom_one_time_fee_value', function ($row) {
                return $row->custom_one_time_fee_value ? $row->custom_one_time_fee_value : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'contract_type', 'user', 'customers', 'lawyer', 'one_time_fees']);

            return $table->make(true);
        }

        return view('admin.contracts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contract_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract_types = ContractType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('surname', 'id');

        $lawyers = Lawyer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $one_time_fees = OneTimeFee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contracts.create', compact('contract_types', 'customers', 'lawyers', 'one_time_fees', 'users'));
    }

    public function store(StoreContractRequest $request)
    {
        $contract = Contract::create($request->all());
        $contract->customers()->sync($request->input('customers', []));

        return redirect()->route('admin.contracts.index');
    }

    public function edit(Contract $contract)
    {
        abort_if(Gate::denies('contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract_types = ContractType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('surname', 'id');

        $lawyers = Lawyer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $one_time_fees = OneTimeFee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contract->load('contract_type', 'user', 'customers', 'lawyer', 'one_time_fees');

        return view('admin.contracts.edit', compact('contract', 'contract_types', 'customers', 'lawyers', 'one_time_fees', 'users'));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->all());
        $contract->customers()->sync($request->input('customers', []));

        return redirect()->route('admin.contracts.index');
    }

    public function show(Contract $contract)
    {
        abort_if(Gate::denies('contract_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->load('contract_type', 'user', 'customers', 'lawyer', 'one_time_fees');

        return view('admin.contracts.show', compact('contract'));
    }

    public function destroy(Contract $contract)
    {
        abort_if(Gate::denies('contract_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->delete();

        return back();
    }

    public function massDestroy(MassDestroyContractRequest $request)
    {
        Contract::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
