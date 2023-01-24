<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyContractCompanyContractAlterationPivotTable extends Migration
{
    public function up()
    {
        Schema::create('company_contract_company_contract_alteration', function (Blueprint $table) {
            $table->unsignedBigInteger('company_contract_id');
            $table->foreign('company_contract_id', 'company_contract_id_fk_7888941')->references('id')->on('company_contracts')->onDelete('cascade');
            $table->unsignedBigInteger('company_contract_alteration_id');
            $table->foreign('company_contract_alteration_id', 'company_contract_alteration_id_fk_7888941')->references('id')->on('company_contract_alterations')->onDelete('cascade');
        });
    }
}
