<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foldernumber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FoldernumberController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('foldernumber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $foldernumbers = Foldernumber::with(['casefile', 'contract', 'companycontract', 'other_cases'])->get();

        return view('admin.foldernumbers.index', compact('foldernumbers'));
    }

    public function show(Foldernumber $foldernumber)
    {
        abort_if(Gate::denies('foldernumber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $foldernumber->load('casefile', 'contract', 'companycontract', 'other_cases');

        return view('admin.foldernumbers.show', compact('foldernumber'));
    }
}
