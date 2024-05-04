<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCableLengthToEndpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('endpoints', function (Blueprint $table) {
            $table->unsignedBigInteger('ts_cable_length_')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('endpoints', function (Blueprint $table) {
            $table->dropColumn('ts_cable_length_');
        });
    }
}
