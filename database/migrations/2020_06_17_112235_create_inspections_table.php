<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('employees');
            $table->string('inspection_act');
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')
                ->references('id')
                ->on('applications')
                ->onDelete('cascade');

            $table->unsignedBigInteger('t_object_id')->nullable();
            $table->foreign('t_object_id')->references('id')->on('t_objects');
            $table->unsignedBigInteger('s_object_id')->nullable();
            $table->foreign('s_object_id')->references('id')->on('s_objects');
            $table->unsignedBigInteger('r_object_id')->nullable();
            $table->foreign('r_object_id')->references('id')->on('r_objects');
            $table->unsignedBigInteger('m_object_id')->nullable();
            $table->foreign('m_object_id')->references('id')->on('m_objects');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspections');
    }
}
