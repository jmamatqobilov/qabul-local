<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTsCableTypeColumnToEndpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('endpoints', 'ts_cable_vols')) {
            Schema::table('endpoints', function (Blueprint $table) {
                $table->dropColumn('ts_cable_vols'); /**/
            });
        }

        Schema::table('endpoints', function (Blueprint $table) {
            $table->renameColumn('ts_cable_type', 'ts_cable_vols'); /**/
            $table->unsignedBigInteger('ts_cable_type_new')->nullable()->after('ts_cable_length');
            $table->foreign('ts_cable_type_new')
                ->references('id')
                ->on('dictionary_values')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
        Schema::table('endpoints', function (Blueprint $table) {
            $table->renameColumn('ts_cable_vols', 'ts_cable_type');
            $table->dropColumn('ts_cable_type_new');
        });
    }
}
