<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHashes extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hashes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hash');
            $table->timestampsTz();
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('hashes');
    }
}
