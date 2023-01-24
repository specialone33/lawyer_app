<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasisTable extends Migration
{
    public function up()
    {
        Schema::create('basis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('link');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
