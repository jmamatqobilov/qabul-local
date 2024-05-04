<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObjectToEndpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('endpoints', function (Blueprint $table) {

            $table->unsignedBigInteger('t_object_id')->nullable();
            $table->foreign('t_object_id')->references('id')->on('t_objects');
            $table->unsignedBigInteger('s_object_id')->nullable();
            $table->foreign('s_object_id')->references('id')->on('s_objects');
            $table->unsignedBigInteger('r_object_id')->nullable();
            $table->foreign('r_object_id')->references('id')->on('r_objects');
            $table->unsignedBigInteger('m_object_id')->nullable();
            $table->foreign('m_object_id')->references('id')->on('m_objects');

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
            $table->dropForeign('endpoints_t_object_id_foreign');
            $table->dropColumn('t_object_id');
            $table->dropForeign('endpoints_s_object_id_foreign');
            $table->dropColumn('s_object_id');
            $table->dropForeign('endpoints_r_object_id_foreign');
            $table->dropColumn('r_object_id');
            $table->dropForeign('endpoints_m_object_id_foreign');
            $table->dropColumn('m_object_id');
        });
    }
}
