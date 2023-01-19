<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\CaseFile;
use App\Models\CompanyContract;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\OtherCase;
use App\Models\Payment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payments = Payment::with(['customer', 'casefile', 'contract', 'companycontract', 'other_case'])->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $casefiles = CaseFile::pluck('case_file_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contracts = Contract::pluck('case_file_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companycontracts = CompanyContract::pluck('case_file_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $other_cases = OtherCase::pluck('case_file_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.payments.create', compact('casefiles', 'companycontracts', 'contracts', 'customers', 'other_cases'));
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function edit(Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $casefiles = CaseFile::pluck('case_file_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contracts = Contract::pluck('case_file_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companycontracts = CompanyContract::pluck('case_file_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $other_cases = OtherCase::pluck('case_file_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment->load('customer', 'casefile', 'contract', 'companycontract', 'other_case');

        return view('admin.payments.edit', compact('casefiles', 'companycontracts', 'contracts', 'customers', 'other_cases', 'payment'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->load('customer', 'casefile', 'contract', 'companycontract', 'other_case');

        return view('admin.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentRequest $request)
    {
        Payment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
