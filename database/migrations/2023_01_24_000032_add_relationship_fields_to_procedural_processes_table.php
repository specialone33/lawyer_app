<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProceduralProcessesTable extends Migration
{
    public function up()
    {
        Schema::table('procedural_processes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7866189')->references('id')->on('users');
            $table->unsignedBigInteger('proccess_id')->nullable();
            $table->foreign('proccess_id', 'proccess_fk_7866190')->references('id')->on('proccesses');
        });
    }
}
