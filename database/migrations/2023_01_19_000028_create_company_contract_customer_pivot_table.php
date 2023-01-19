<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyContractCustomerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('company_contract_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('company_contract_id');
            $table->foreign('company_contract_id', 'company_contract_id_fk_7888894')->references('id')->on('company_contracts')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_id_fk_7888894')->references('id')->on('customers')->onDelete('cascade');
        });
    }
}
