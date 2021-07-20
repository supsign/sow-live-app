<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResults extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('rank')->nullable();
            $table->string('start')->nullable();
            $table->string('radio1')->nullable();
            $table->string('radio2')->nullable();
            $table->string('radio3')->nullable();
            $table->string('radio4')->nullable();
            $table->string('radio5')->nullable();
            $table->string('time')->nullable();
            $table->string('behind')->nullable();
            $table->foreignId('runner_id')->constrained();
            $table->foreignId('stage_id')->constrained();
            $table->timestampsTz();
            $table->unique(['runner_id', 'stage_id']);
            $table->index(['runner_id', 'stage_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
