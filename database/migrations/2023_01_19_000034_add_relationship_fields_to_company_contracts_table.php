<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCompanyContractsTable extends Migration
{
    public function up()
    {
        Schema::table('company_contracts', function (Blueprint $table) {
            $table->unsignedBigInteger('company_type_id')->nullable();
            $table->foreign('company_type_id', 'company_type_fk_7888913')->references('id')->on('company_types');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7888893')->references('id')->on('users');
            $table->unsignedBigInteger('lawyer_id')->nullable();
            $table->foreign('lawyer_id', 'lawyer_fk_7888897')->references('id')->on('lawyers');
            $table->unsignedBigInteger('one_time_fees_id')->nullable();
            $table->foreign('one_time_fees_id', 'one_time_fees_fk_7888902')->references('id')->on('one_time_fees');
        });
    }
}
