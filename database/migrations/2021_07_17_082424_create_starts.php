<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarts extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('starts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('runner_id')->constrained();
            $table->foreignId('stage_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->string('start_time');
            $table->timestampsTz();
            $table->unique(['runner_id', 'stage_id', 'category_id']);
            $table->index(['runner_id', 'stage_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('starts');
    }
}
