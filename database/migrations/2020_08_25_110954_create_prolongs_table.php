<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProlongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prolongs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')
                ->references('id')
                ->on('applications')
                ->onDelete('cascade');
            $table->unsignedBigInteger('message_id');
            $table->foreign('message_id')
                ->references('id')
                ->on('extend_messages')
                ->onDelete('cascade');

            $table->string('order');
            $table->integer('decree_num')->nullable();
            $table->date('decree_date')->nullable();
            $table->date('deadline_date')->nullable();
            $table->date('old_deadline_date')->nullable();

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
        Schema::dropIfExists('prolongs');
    }
}
