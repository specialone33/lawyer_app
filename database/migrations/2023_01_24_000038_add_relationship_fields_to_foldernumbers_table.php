<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFoldernumbersTable extends Migration
{
    public function up()
    {
        Schema::table('foldernumbers', function (Blueprint $table) {
            $table->unsignedBigInteger('casefile_id')->nullable();
            $table->foreign('casefile_id', 'casefile_fk_7919627')->references('id')->on('case_files');
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->foreign('contract_id', 'contract_fk_7919628')->references('id')->on('contracts');
            $table->unsignedBigInteger('companycontract_id')->nullable();
            $table->foreign('companycontract_id', 'companycontract_fk_7919632')->references('id')->on('company_contracts');
            $table->unsignedBigInteger('other_cases_id')->nullable();
            $table->foreign('other_cases_id', 'other_cases_fk_7919633')->references('id')->on('other_cases');
        });
    }
}
