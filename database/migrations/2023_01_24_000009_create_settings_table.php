<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('telephone_1')->nullable();
            $table->string('telephone_2')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->longText('bio')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
