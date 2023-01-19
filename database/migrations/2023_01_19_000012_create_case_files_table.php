<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseFilesTable extends Migration
{
    public function up()
    {
        Schema::create('case_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('case_file_number');
            $table->date('registration_date');
            $table->longText('case_description')->nullable();
            $table->date('hearing');
            $table->string('next_actions')->nullable();
            $table->string('opponent');
            $table->longText('comments')->nullable();
            $table->string('petition_filing_number')->nullable();
            $table->string('decision_number')->nullable();
            $table->decimal('charging_expenses', 15, 2)->nullable();
            $table->integer('hours')->nullable();
            $table->decimal('hourly_rate', 15, 2)->nullable();
            $table->string('custom_one_time_fee_name')->nullable();
            $table->decimal('custom_one_time_fee_value', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
