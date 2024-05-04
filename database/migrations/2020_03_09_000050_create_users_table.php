<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('director_fio')->nullable();
            $table->bigInteger('inn')->unique()->default('111000111');
            $table->string('address')->nullable();
            $table->string('license')->nullable();

            $table->boolean('is_director')->default(false);

            $table->bigInteger('direction_id')->unsigned()->nullable();
            $table->foreign('direction_id')->references('id')->on('directions');

            $table->bigInteger('territory_id')->unsigned()->nullable();
            $table->foreign('territory_id')->references('id')->on('territories');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
