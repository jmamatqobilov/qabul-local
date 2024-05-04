<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToTObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_objects', function (Blueprint $table) {
            $table->unsignedBigInteger('loyiha-smeta')->nullable();
            $table->foreign('loyiha-smeta')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('ekpulatatsiya')->nullable();
            $table->foreign('ekpulatatsiya')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('antenna-machta')->nullable();
            $table->foreign('antenna-machta')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('ffv')->nullable();
            $table->foreign('ffv')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('sanitariya')->nullable();
            $table->foreign('sanitariya')
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
        Schema::table('t_objects', function (Blueprint $table) {
            $table->dropColumn(['loyiha-smeta','ekpulatatsiya','antenna-machta','ffv','sanitariya','tugallangan-obyekt']);
        });
    }
}
