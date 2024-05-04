<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_objects', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('object_type_id')->unsigned()->nullable();
            $table->foreign('object_type_id')
                ->references('id')
                ->on('d_object_types');

            $table->bigInteger('application_id')->unsigned();
            $table->foreign('application_id')
                ->references('id')
                ->on('applications');

            $table->bigInteger('podr_license')->unsigned()->nullable();
            $table->foreign('podr_license')
                ->references('id')
                ->on('documents');

            $table->bigInteger('rab_project')->unsigned()->nullable();
            $table->foreign('rab_project')
                ->references('id')
                ->on('documents');

            $table->bigInteger('exp_zakl_rab_project')->unsigned()->nullable();
            $table->foreign('exp_zakl_rab_project')
                ->references('id')
                ->on('documents');

            $table->bigInteger('akt_rab_kom')->unsigned()->nullable();
            $table->foreign('akt_rab_kom')
                ->references('id')
                ->on('documents');

            $table->bigInteger('sert_sootv')->unsigned()->nullable();
            $table->foreign('sert_sootv')
                ->references('id')
                ->on('documents');

            $table->bigInteger('act_ind_isp')->unsigned()->nullable();
            $table->foreign('act_ind_isp')
                ->references('id')
                ->on('documents');

            $table->bigInteger('act_komp_opr')->unsigned()->nullable();
            $table->foreign('act_komp_opr')
                ->references('id')
                ->on('documents');

            $table->bigInteger('prot_np_izm')->unsigned()->nullable();
            $table->foreign('prot_np_izm')
                ->references('id')
                ->on('documents');

            $table->bigInteger('zakl_cems')->unsigned()->nullable();
            $table->foreign('zakl_cems')
                ->references('id')
                ->on('documents');

            $table->bigInteger('san_passp')->unsigned()->nullable();
            $table->foreign('san_passp')
                ->references('id')
                ->on('documents');

            $table->bigInteger('sv_o_per')->unsigned()->nullable();
            $table->foreign('sv_o_per')
                ->references('id')
                ->on('documents');

            $table->text('punkt_ustanovki');
            $table->text('punkt_ustanovki_location');

            $table->bigInteger('ob_otvode_zem_uch')->unsigned()->nullable();
            $table->foreign('ob_otvode_zem_uch')
                ->references('id')
                ->on('documents');

            $table->bigInteger('prot_izm_izol')->unsigned()->nullable();
            $table->foreign('prot_izm_izol')
                ->references('id')
                ->on('documents');

            $table->bigInteger('act_skryt_rab')->unsigned()->nullable();
            $table->foreign('act_skryt_rab')
                ->references('id')
                ->on('documents');

            $table->bigInteger('spr_ob_usr_ned')->unsigned()->nullable();
            $table->foreign('spr_ob_usr_ned')
                ->references('id')
                ->on('documents');

            $table->bigInteger('dogovor_arendy')->unsigned()->nullable();
            $table->foreign('dogovor_arendy')
                ->references('id')
                ->on('documents');

            $table->bigInteger('act_gos_priyom')->unsigned()->nullable();
            $table->foreign('act_gos_priyom')
                ->references('id')
                ->on('documents');

            $table->bigInteger('zakl_sorm')->unsigned()->nullable();
            $table->foreign('zakl_sorm')
                ->references('id')
                ->on('documents');

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
        Schema::dropIfExists('objects');
    }
}
