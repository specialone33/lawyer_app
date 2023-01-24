<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCaseFilesTable extends Migration
{
    public function up()
    {
        Schema::table('case_files', function (Blueprint $table) {
            $table->unsignedBigInteger('case_type_id')->nullable();
            $table->foreign('case_type_id', 'case_type_fk_7866315')->references('id')->on('case_types');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7866317')->references('id')->on('users');
            $table->unsignedBigInteger('court_id')->nullable();
            $table->foreign('court_id', 'court_fk_7866318')->references('id')->on('courts');
            $table->unsignedBigInteger('procedural_process_id')->nullable();
            $table->foreign('procedural_process_id', 'procedural_process_fk_7866324')->references('id')->on('proccesses');
            $table->unsignedBigInteger('case_status_id')->nullable();
            $table->foreign('case_status_id', 'case_status_fk_7866326')->references('id')->on('case_statuses');
            $table->unsignedBigInteger('lawyer_id')->nullable();
            $table->foreign('lawyer_id', 'lawyer_fk_7866330')->references('id')->on('lawyers');
            $table->unsignedBigInteger('one_time_fees_id')->nullable();
            $table->foreign('one_time_fees_id', 'one_time_fees_fk_7866446')->references('id')->on('one_time_fees');
        });
    }
}
