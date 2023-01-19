<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOtherCasePivotTable extends Migration
{
    public function up()
    {
        Schema::create('customer_other_case', function (Blueprint $table) {
            $table->unsignedBigInteger('other_case_id');
            $table->foreign('other_case_id', 'other_case_id_fk_7889024')->references('id')->on('other_cases')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_id_fk_7889024')->references('id')->on('customers')->onDelete('cascade');
        });
    }
}
