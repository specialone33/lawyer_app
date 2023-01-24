<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneTimeFeesTable extends Migration
{
    public function up()
    {
        Schema::create('one_time_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('value', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
