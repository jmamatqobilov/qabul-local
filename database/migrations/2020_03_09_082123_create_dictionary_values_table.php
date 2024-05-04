<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_values', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru');
            $table->string('name_uz')->nullable();
            $table->string('code');

            $table->bigInteger('dictionary_id')->unsigned()->default(1);
            $table->foreign('dictionary_id')
                ->references('id')
                ->on('dictionaries')
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
        Schema::dropIfExists('dictionary_values');
    }
}
