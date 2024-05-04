<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_objects', function (Blueprint $table) {
            $table->id();

            $table->unsignedbigInteger('object_type_id')->nullable();
            $table->foreign('object_type_id')
                ->references('id')
                ->on('d_object_types')->onDelete('cascade');

            $table->unsignedbigInteger('application_id');
            $table->foreign('application_id')
                ->references('id')
                ->on('applications');

            $table->unsignedbigInteger('podr_license')->nullable();
            $table->foreign('podr_license')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('rab_project')->nullable();
            $table->foreign('rab_project')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('exp_zakl_rab_project')->nullable();
            $table->foreign('exp_zakl_rab_project')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('akt_rab_kom')->nullable();
            $table->foreign('akt_rab_kom')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('sert_sootv')->nullable();
            $table->foreign('sert_sootv')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('act_ind_isp')->nullable();
            $table->foreign('act_ind_isp')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('act_komp_opr')->nullable();
            $table->foreign('act_komp_opr')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('prot_np_izm')->nullable();
            $table->foreign('prot_np_izm')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('zakl_cems')->nullable();
            $table->foreign('zakl_cems')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('san_passp')->nullable();
            $table->foreign('san_passp')
                ->references('id')
                ->on('documents');

            $table->unsignedbigInteger('sv_o_per')->nullable();
            $table->foreign('sv_o_per')
                ->references('id')
                ->on('documents');

            $table->text('punkt_ustanovki');
            $table->text('punkt_ustanovki_location');

            $table->unsignedbigInteger('ob_otvode_zem_uch')->nullable();
            $table->foreign('ob_otvode_zem_uch')->references('id')->on('documents');

            $table->unsignedbigInteger('prot_izm_izol')->nullable();
            $table->foreign('prot_izm_izol')->references('id')->on('documents');

            $table->unsignedbigInteger('act_skryt_rab')->nullable();
            $table->foreign('act_skryt_rab')->references('id')->on('documents');

            $table->unsignedbigInteger('spr_ob_usr_ned')->nullable();
            $table->foreign('spr_ob_usr_ned')->references('id')->on('documents');

            $table->unsignedbigInteger('dogovor_arendy')->nullable();
            $table->foreign('dogovor_arendy')->references('id')->on('documents');

            $table->unsignedbigInteger('act_gos_priyom')->nullable();
            $table->foreign('act_gos_priyom')->references('id')->on('documents');

            $table->unsignedbigInteger('zakl_sorm')->nullable();
            $table->foreign('zakl_sorm')->references('id')->on('documents');

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
        Schema::dropIfExists('s_objects');
    }
}
