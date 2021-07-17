<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunner extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('runners', function (Blueprint $table) {
            $table->id();
            $table->integer('startnumber');
            $table->string('name');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('club_id');
            $table->integer('year_of_birth')->nullable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('runner');
    }
}
