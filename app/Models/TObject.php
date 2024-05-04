<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class TObject extends ParentObject
{
    use SoftDeletes;

    protected $fillable = [];

    public function __construct()
    {
        $this->file_areas = array_merge($this->file_areas, [
//            ['podr_license', 'file', ''],
//            ['rab_project', 'file', ''],
//            ['exp_zakl_rab_project', 'file', ''],
//            ['akt_rab_kom', 'file', ''],
//            ['sert_sootv', 'file', ''],
//            ['act_ind_isp', 'file', ''],
//            ['act_komp_opr', 'file', ''],
//            ['prot_np_izm', 'file', ''],
//            ['ishchi_chizmalar', 'file', ''],
//            ['zakl_cems', 'file', ''],
//            ['san_passp', 'file', ''],
//            ['sv_o_per', 'file', ''],
            ['loyiha-smeta', 'file', ''],
            ['ekpulatatsiya', 'file', ''],
            ['antenna-machta', 'file', ''],
            ['ffv', 'file', ''],
            ['sanitariya', 'file', ''],
            ['tugallangan-obyekt', 'file', ''],
            ['punkt_ustanovki', 'text', 'required'],
            ['punkt_ustanovki_location', 'text', 'required'],
//            ['ob_otvode_zem_uch', 'file', ''],
//            ['prot_izm_izol', 'file', ''],
//            ['act_skryt_rab', 'file', ''],
//            ['spr_ob_usr_ned', 'file', ''],
//            ['dogovor_arendy', 'file', ''],
//            ['act_gos_priyom', 'file', ''],
//            ['zakl_sorm', 'file', '']
        ]);
        $this->child_prefix = 't';
        parent::__construct($this->file_areas);
        $this->fillable = Arr::pluck($this->file_areas, 0);
    }
}
