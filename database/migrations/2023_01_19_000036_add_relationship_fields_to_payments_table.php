<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_7897526')->references('id')->on('customers');
            $table->unsignedBigInteger('casefile_id')->nullable();
            $table->foreign('casefile_id', 'casefile_fk_7899484')->references('id')->on('case_files');
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->foreign('contract_id', 'contract_fk_7899485')->references('id')->on('contracts');
            $table->unsignedBigInteger('companycontract_id')->nullable();
            $table->foreign('companycontract_id', 'companycontract_fk_7899486')->references('id')->on('company_contracts');
            $table->unsignedBigInteger('other_case_id')->nullable();
            $table->foreign('other_case_id', 'other_case_fk_7899487')->references('id')->on('other_cases');
        });
    }
}
