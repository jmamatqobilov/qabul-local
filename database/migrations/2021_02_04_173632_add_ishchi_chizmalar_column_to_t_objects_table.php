<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIshchiChizmalarColumnToTObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_objects', function (Blueprint $table) {
            $table->bigInteger('ishchi_chizmalar')->unsigned()->nullable()->after('prot_np_izm');
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
        Schema::table('t_objects', function (Blueprint $table) {
            $table->dropColumn('ishchi_chizmalar');
        });
    }
}
