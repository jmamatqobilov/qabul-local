<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtendMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extend_messages', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->string('attachment')->nullable();
        
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')
                ->references('id')
                ->on('applications')
                ->onDelete('cascade');

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('extend_messages');
    }
}
