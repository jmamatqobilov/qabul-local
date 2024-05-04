<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIshchiChizmalarColumnToRObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('r_objects', function (Blueprint $table) {
            $table->bigInteger('ishchi_chizmalar')->unsigned()->nullable()->after('opt_refl_izm');
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
        Schema::table('r_objects', function (Blueprint $table) {
            $table->dropColumn('ishchi_chizmalar');
        });
    }
}
