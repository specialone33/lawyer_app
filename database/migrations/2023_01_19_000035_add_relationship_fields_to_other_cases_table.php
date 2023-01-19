<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOtherCasesTable extends Migration
{
    public function up()
    {
        Schema::table('other_cases', function (Blueprint $table) {
            $table->unsignedBigInteger('case_type_id')->nullable();
            $table->foreign('case_type_id', 'case_type_fk_7889065')->references('id')->on('other_case_types');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7889023')->references('id')->on('users');
            $table->unsignedBigInteger('lawyer_id')->nullable();
            $table->foreign('lawyer_id', 'lawyer_fk_7889027')->references('id')->on('lawyers');
            $table->unsignedBigInteger('one_time_fees_id')->nullable();
            $table->foreign('one_time_fees_id', 'one_time_fees_fk_7889032')->references('id')->on('one_time_fees');
        });
    }
}
