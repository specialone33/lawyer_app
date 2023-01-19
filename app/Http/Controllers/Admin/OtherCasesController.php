<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOtherCaseRequest;
use App\Http\Requests\StoreOtherCaseRequest;
use App\Http\Requests\UpdateOtherCaseRequest;
use App\Models\Customer;
use App\Models\Lawyer;
use App\Models\OneTimeFee;
use App\Models\OtherCase;
use App\Models\OtherCaseType;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OtherCasesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('other_case_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OtherCase::with(['case_type', 'user', 'customers', 'lawyer', 'one_time_fees'])->select(sprintf('%s.*', (new OtherCase())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'other_case_show';
                $editGate = 'other_case_edit';
                $deleteGate = 'other_case_delete';
                $crudRoutePart = 'other-cases';

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

            $table->addColumn('case_type_name', function ($row) {
                return $row->case_type ? $row->case_type->name : '';
            });

            $table->editColumn('case_description', function ($row) {
                return $row->case_description ? $row->case_description : '';
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

            $table->rawColumns(['actions', 'placeholder', 'case_type', 'user', 'customers', 'lawyer', 'one_time_fees']);

            return $table->make(true);
        }

        return view('admin.otherCases.index');
    }

    public function create()
    {
        abort_if(Gate::denies('other_case_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $case_types = OtherCaseType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('surname', 'id');

        $lawyers = Lawyer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $one_time_fees = OneTimeFee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.otherCases.create', compact('case_types', 'customers', 'lawyers', 'one_time_fees', 'users'));
    }

    public function store(StoreOtherCaseRequest $request)
    {
        $otherCase = OtherCase::create($request->all());
        $otherCase->customers()->sync($request->input('customers', []));

        return redirect()->route('admin.other-cases.index');
    }

    public function edit(OtherCase $otherCase)
    {
        abort_if(Gate::denies('other_case_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $case_types = OtherCaseType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::pluck('surname', 'id');

        $lawyers = Lawyer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $one_time_fees = OneTimeFee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $otherCase->load('case_type', 'user', 'customers', 'lawyer', 'one_time_fees');

        return view('admin.otherCases.edit', compact('case_types', 'customers', 'lawyers', 'one_time_fees', 'otherCase', 'users'));
    }

    public function update(UpdateOtherCaseRequest $request, OtherCase $otherCase)
    {
        $otherCase->update($request->all());
        $otherCase->customers()->sync($request->input('customers', []));

        return redirect()->route('admin.other-cases.index');
    }

    public function show(OtherCase $otherCase)
    {
        abort_if(Gate::denies('other_case_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherCase->load('case_type', 'user', 'customers', 'lawyer', 'one_time_fees');

        return view('admin.otherCases.show', compact('otherCase'));
    }

    public function destroy(OtherCase $otherCase)
    {
        abort_if(Gate::denies('other_case_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherCase->delete();

        return back();
    }

    public function massDestroy(MassDestroyOtherCaseRequest $request)
    {
        OtherCase::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
