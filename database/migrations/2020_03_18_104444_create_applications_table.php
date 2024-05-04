<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('direction_id');
            $table->foreign('direction_id')
                ->references('id')
                ->on('directions')
                ->onDelete('cascade');

            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('hududiy_id');
            $table->foreign('hududiy_id')
                ->references('id')
                ->on('territories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('objects_count');

            /*order*/
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('act_id');
            $table->foreign('act_id')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('decree_id')->nullable();
            $table->foreign('decree_id')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
                ->references('id')
                ->on('application_statuses')
                ->onDelete('cascade');

            $table->integer('decree_num')->nullable();
            $table->date('decree_date')->nullable();
            $table->string('responsible')->nullable();
            $table->date('deadline_date')->nullable();

            $table->text('deny_comment')->nullable();
            $table->dateTime('apply_datetime')->nullable();

            /*final-act*/
            $table->unsignedBigInteger('final_act_id')->nullable();
            $table->foreign('final_act_id')
                ->references('id')
                ->on('documents')
                ->onDelete('cascade');

            $table->text('failed_issue')->nullable();

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
        Schema::dropIfExists('applications');
    }
}
