<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContractsTable extends Migration
{
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->unsignedBigInteger('contract_type_id')->nullable();
            $table->foreign('contract_type_id', 'contract_type_fk_7866621')->references('id')->on('contract_types');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7866461')->references('id')->on('users');
            $table->unsignedBigInteger('lawyer_id')->nullable();
            $table->foreign('lawyer_id', 'lawyer_fk_7866469')->references('id')->on('lawyers');
            $table->unsignedBigInteger('one_time_fees_id')->nullable();
            $table->foreign('one_time_fees_id', 'one_time_fees_fk_7866476')->references('id')->on('one_time_fees');
        });
    }
}
