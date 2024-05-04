<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObjectIdColumnToDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->text('doc_type')->nullable();
//            $table->foreign('t_object_id')->references('id')->on('documents');

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
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('doc_type');
            $table->dropColumn('t_object_id');
            $table->dropColumn('s_object_id');
            $table->dropColumn('r_object_id');
            $table->dropColumn('m_object_id');
        });
    }
}
