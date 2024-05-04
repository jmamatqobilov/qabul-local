<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDObjectTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_object_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru');
            $table->string('name_uz')->nullable();
            $table->string('code');

            $table->bigInteger('direction_id')->unsigned()->default(1);
            $table->foreign('direction_id')
                ->references('id')
                ->on('directions')
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
        Schema::dropIfExists('d_object_types');
    }
}
