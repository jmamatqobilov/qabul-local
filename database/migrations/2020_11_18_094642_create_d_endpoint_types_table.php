<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDEndpointTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_endpoint_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru');
            $table->string('name_uz')->nullable();
            $table->string('code');

            $table->unsignedBigInteger('object_type_id')->default(1);
            $table->foreign('object_type_id')
                ->references('id')
                ->on('d_object_types')
                ->onDelete('cascade');

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
        Schema::dropIfExists('d_endpoint_types');
    }
}
