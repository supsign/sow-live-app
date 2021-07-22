<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastUpdateOnResults extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->string('last_update')->nullable()->after('stage_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->dropColumn('last_update');
        });
    }
}
