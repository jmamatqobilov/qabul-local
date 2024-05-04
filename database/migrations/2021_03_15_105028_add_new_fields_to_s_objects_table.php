<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToSObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('s_objects', function (Blueprint $table) {
            $table->unsignedBigInteger('loyiha-smeta')->nullable();
            $table->foreign('loyiha-smeta')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('loyihalashtirish')->nullable();
            $table->foreign('loyihalashtirish')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('sanitariya-s')->nullable();
            $table->foreign('sanitariya-s')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('olchov')->nullable();
            $table->foreign('olchov')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('texnik-pasport')->nullable();
            $table->foreign('texnik-pasport')
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
        Schema::table('s_objects', function (Blueprint $table) {
            $table->dropColumn(['loyiha-smeta','loyihalashtirish','sanitariya-s','olchov','texnik-pasport','tugallangan-obyekt']);
        });
    }
}
