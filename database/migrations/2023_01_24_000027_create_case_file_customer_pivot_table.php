<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseFileCustomerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('case_file_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('case_file_id');
            $table->foreign('case_file_id', 'case_file_id_fk_7866328')->references('id')->on('case_files')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_id_fk_7866328')->references('id')->on('customers')->onDelete('cascade');
        });
    }
}
