<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIshchiChizmalarColumnToMObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_objects', function (Blueprint $table) {
            $table->bigInteger('ishchi_chizmalar')->unsigned()->nullable()->after('dog_arendy');
            $table->foreign('ishchi_chizmalar')
                ->references('id')
                ->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_objects', function (Blueprint $table) {
            $table->dropColumn('ishchi_chizmalar');
        });
    }
}
