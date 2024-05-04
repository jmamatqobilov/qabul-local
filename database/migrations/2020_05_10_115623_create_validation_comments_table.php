<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidationCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validation_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('t_object_id')->nullable();
            $table->foreign('t_object_id')->references('id')->on('t_objects');
            $table->unsignedbigInteger('s_object_id')->nullable();
            $table->foreign('s_object_id')->references('id')->on('s_objects');
            $table->unsignedbigInteger('r_object_id')->nullable();
            $table->foreign('r_object_id')->references('id')->on('r_objects');
            $table->unsignedbigInteger('m_object_id')->nullable();
            $table->foreign('m_object_id')->references('id')->on('m_objects');
            $table->string('field_name');
            $table->text('comment');
            $table->boolean('is_solved')->default(false);
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
        Schema::dropIfExists('validation_comments');
    }
}
