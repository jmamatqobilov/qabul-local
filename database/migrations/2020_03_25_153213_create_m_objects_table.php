<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_objects', function (Blueprint $table) {
            $table->id();

            $table->unsignedbigInteger('object_type_id')->nullable();
            $table->foreign('object_type_id')->references('id')->on('d_object_types');

            $table->unsignedbigInteger('application_id');
            $table->foreign('application_id')->references('id')->on('applications');

            $table->unsignedbigInteger('project_cems')->nullable();
            $table->foreign('project_cems')->references('id')->on('documents');

            $table->unsignedbigInteger('exploitation_cems')->nullable();
            $table->foreign('exploitation_cems')->references('id')->on('documents');

            $table->unsignedbigInteger('license_zakazchik')->nullable();
            $table->foreign('license_zakazchik')->references('id')->on('documents');

            $table->unsignedbigInteger('license_gen_podr')->nullable();
            $table->foreign('license_gen_podr')->references('id')->on('documents');

            $table->unsignedbigInteger('license_projector')->nullable();
            $table->foreign('license_projector')->references('id')->on('documents');

            $table->text('punkt_ustanovki');
            $table->text('punkt_ustanovki_location');

            $table->unsignedbigInteger('prikaz_o_komissii')->nullable();
            $table->foreign('prikaz_o_komissii')->references('id')->on('documents');

            $table->unsignedbigInteger('utv_rab_project')->nullable();
            $table->foreign('utv_rab_project')->references('id')->on('documents');

            $table->unsignedbigInteger('prikaz_ob_utv_pro_doc')->nullable();
            $table->foreign('prikaz_ob_utv_pro_doc')->references('id')->on('documents');

            $table->unsignedbigInteger('exp_zakl')->nullable();
            $table->foreign('exp_zakl')->references('id')->on('documents');

            $table->unsignedbigInteger('san_passp')->nullable();
            $table->foreign('san_passp')->references('id')->on('documents');

            $table->unsignedbigInteger('dog_arendy')->nullable();
            $table->foreign('dog_arendy')->references('id')->on('documents');

            $table->unsignedbigInteger('sert_sootv')->nullable();
            $table->foreign('sert_sootv')->references('id')->on('documents');

            $table->unsignedbigInteger('akt_zazemleniya')->nullable();
            $table->foreign('akt_zazemleniya')->references('id')->on('documents');

            $table->unsignedbigInteger('prot_izm_izol_cable')->nullable();
            $table->foreign('prot_izm_izol_cable')->references('id')->on('documents');

            $table->unsignedbigInteger('akt_comis_o_priemke')->nullable();
            $table->foreign('akt_comis_o_priemke')->references('id')->on('documents');

            $table->unsignedbigInteger('akt_ind_isp')->nullable();
            $table->foreign('akt_ind_isp')->references('id')->on('documents');

            $table->unsignedbigInteger('act_kompl_oprob')->nullable();
            $table->foreign('act_kompl_oprob')->references('id')->on('documents');

            $table->unsignedbigInteger('reshenie_nak_havo')->nullable();
            $table->foreign('reshenie_nak_havo')->references('id')->on('documents');

            $table->unsignedbigInteger('prikaz_o_gos_kom_priyom')->nullable();
            $table->foreign('prikaz_o_gos_kom_priyom')->references('id')->on('documents');

            $table->unsignedbigInteger('prikaz_o_post_deys_kom')->nullable();
            $table->foreign('prikaz_o_post_deys_kom')->references('id')->on('documents');

            $table->unsignedbigInteger('act_priyom_komissii')->nullable();
            $table->foreign('act_priyom_komissii')->references('id')->on('documents');

            $table->unsignedbigInteger('zakl_sorm')->nullable();
            $table->foreign('zakl_sorm')->references('id')->on('documents');

            $table->unsignedbigInteger('reshenie_glrch')->nullable();
            $table->foreign('reshenie_glrch')->references('id')->on('documents');

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
        Schema::dropIfExists('m_objects');
    }
}
