<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class RObject extends ParentObject
{
    use SoftDeletes;

    protected $fillable = [];

    public function __construct()
    {
        $this->file_areas = array_merge($this->file_areas, [
//            ['project_cems', 'file', ''],
//            ['exploitation_cems', 'file', ''],
//            ['license_zakazchik', 'file', ''],
//            ['license_gen_podr', 'file', ''],
            ['loyiha-smeta', 'file', ''],
            ['ekpulatatsiya-r', 'file', ''],
            ['antenna-machta', 'file', ''],
            ['ffv', 'file', ''],
            ['sanitariya-r', 'file', ''],
            ['tugallangan-obyekt', 'file', ''],
            ['punkt_ustanovki', 'text', 'required'],
            ['punkt_ustanovki_location', 'text', 'required'],
//            ['prikaz_o_komissii', 'file', ''],
//            ['utv_rab_project', 'file', ''],
//            ['prikaz_ob_utv_pro_doc', 'file', ''],
//            ['exp_zakl', 'file', ''],
//            ['san_passp', 'file', ''],
//            ['dog_arendy', 'file', ''],
//            ['sert_sootv', 'file', ''],
//            ['akt_zazemleniya', 'file', ''],
//            ['prot_izm_izol_cable', 'file', ''],
//            ['akt_montaja', 'file', ''],
//            ['akt_comis_o_priemke', 'file', ''],
//            ['akt_ind_isp', 'file', ''],
//            ['act_kompl_oprob', 'file', ''],
//            ['opt_refl_izm', 'file', ''],
//            ['ishchi_chizmalar', 'file', ''],
//            ['prikaz_o_gos_kom_priyom', 'file', ''],
//            ['act_priyom_komissii', 'file', ''],
//            ['vip_treb_oxrany', 'file', ''],
//            ['reshenie_glrch', 'file', '']
        ]);
        $this->child_prefix = 'r';
        parent::__construct($this->file_areas);
        $this->fillable = Arr::pluck($this->file_areas, 0);
    }
}
