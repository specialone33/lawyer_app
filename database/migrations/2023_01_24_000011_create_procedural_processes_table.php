<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduralProcessesTable extends Migration
{
    public function up()
    {
        Schema::create('procedural_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_of_suit_days');
            $table->string('service_of_suit_days_type');
            $table->string('service_of_suit_before_after');
            $table->integer('filing_motions_days');
            $table->string('filing_motions_type');
            $table->string('filing_motions_before_after');
            $table->integer('filing_add_sentences_days');
            $table->string('filing_add_sentences_type');
            $table->string('filing_add_sentences_before_after');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
