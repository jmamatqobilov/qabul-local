<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endpoints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')
                ->references('id')
                ->on('applications')
                ->onDelete('cascade');

            $table->unsignedBigInteger('object_type_id');
            $table->foreign('object_type_id')
                ->references('id')
                ->on('d_object_types')
                ->onDelete('cascade');


            $table->string('vendor_name')->nullable();
            $table->string('model')->nullable();
            $table->string('vendor_country')->nullable();
            $table->integer('produce_year')->nullable();

            $table->text('deny_comment')->nullable();

            $table->float('ts_assembly_value')->nullable();
            $table->float('ts_cable_length')->nullable();

            /*change back to ts_cable_type*/
            $table->unsignedBigInteger('ts_cable_type')->nullable();
            $table->foreign('ts_cable_type')
                ->references('id')
                ->on('dictionary_values')
                ->onDelete('cascade');

            $table->unsignedBigInteger('rm_broadcasting_standard')->nullable();
            $table->foreign('rm_broadcasting_standard')
                ->references('id')
                ->on('dictionary_values')
                ->onDelete('cascade');

            $table->float('rm_station_power')->nullable();
            $table->unsignedBigInteger('rm_station_purpose')->nullable();
            $table->foreign('rm_station_purpose')
                ->references('id')
                ->on('dictionary_values')
                ->onDelete('cascade');

            $table->unsignedBigInteger('rm_antenna_type')->nullable();
            $table->foreign('rm_antenna_type')
                ->references('id')
                ->on('dictionary_values')
                ->onDelete('cascade');

            $table->float('rm_antenna_suspension_height')->nullable();
            $table->integer('rm_transceivers_count')->nullable();

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
        Schema::dropIfExists('endpoints');
    }
}
