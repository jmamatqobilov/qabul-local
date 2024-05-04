<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToMObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_objects', function (Blueprint $table) {
            $table->unsignedBigInteger('loyiha-smeta')->nullable();
            $table->foreign('loyiha-smeta')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('ekpulatatsiya-r')->nullable();
            $table->foreign('ekpulatatsiya-r')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('antenna-machta-m')->nullable();
            $table->foreign('antenna-machta-m')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('ffv')->nullable();
            $table->foreign('ffv')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('sanitariya-r')->nullable();
            $table->foreign('sanitariya-r')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('operativ-qidiruv')->nullable();
            $table->foreign('operativ-qidiruv')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('tugallangan-obyekt')->nullable();
            $table->foreign('tugallangan-obyekt')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_objects', function (Blueprint $table) {
            $table->dropColumn(['loyiha-smeta','ekpulatatsiya-r','antenna-machta-m','ffv','sanitariya-r','operativ-qidiruv','tugallangan-obyekt']);
        });
    }
}
