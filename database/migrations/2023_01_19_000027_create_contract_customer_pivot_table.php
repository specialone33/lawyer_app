<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractCustomerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('contract_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id', 'contract_id_fk_7866467')->references('id')->on('contracts')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_id_fk_7866467')->references('id')->on('customers')->onDelete('cascade');
        });
    }
}
