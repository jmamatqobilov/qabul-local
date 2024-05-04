<?php
namespace Database\Seeders;
use App\Models\Direction;
use App\Models\DObjectType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*        \App\Models\DObjectType::where('code', 'gpon')->update([
                    'endpoint_fields' => '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_vols":""}'
                ]);*/

//        $dObjectType = DB::table('d_object_types')->where('code', 'gpon')->first();
        $dObjectType = DObjectType::where('code', 'gpon')->first();
        $dObjectType->endpoint_fields = '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_vols":""}';
        $dObjectType->save();

        /*        \App\Models\DObjectType::where('code', 'olt')->update([
                    'endpoint_fields' => '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_vols":""}'
                ]);*/

        $dObjectType = DObjectType::where('code', 'olt')->first();
        $dObjectType->endpoint_fields = '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_vols":""}';
        $dObjectType->save();

        /*        \App\Models\DObjectType::where('code', 'switch')->update([
                    'endpoint_fields' => '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_vols":""}'
                ]);*/

        $dObjectType = DObjectType::where('code', 'switch')->first();
        $dObjectType->endpoint_fields = '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_vols":""}';
        $dObjectType->save();


        /*        \App\Models\DObjectType::where('code', 'fttx')->update([
                    'endpoint_fields' => '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_vols":""}'
                ]);*/

        $dObjectType = DObjectType::where('code', 'fttx')->first();
        $dObjectType->endpoint_fields = '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_vols":""}';
        $dObjectType->save();

        $dObjectType = DObjectType::where('code', 'coaxcab')->first();
        $dObjectType->endpoint_fields = '{"ts_cable_length":"","ts_cable_vols":""}';
        $dObjectType->save();

        $dObjectType = DObjectType::where('code', 'svols')->first();
        $dObjectType->endpoint_fields = '{"ts_cable_length":"","ts_cable_type_new":"","ts_cable_vols":""}';
        $dObjectType->save();

        /*        \App\Models\DObjectType::where('code', 'vols')->where('direction_id', Direction::where('code', 'm')->first()->id)->update([
                    'endpoint_fields' => '{"ts_cable_length":"","ts_cable_type_new":"","ts_cable_vols":""}'
                ]);*/

        $dObjectType2 = DObjectType::where('code', 'vols')->where('direction_id', Direction::where('code', 'm')->first()->id)->first();
        $dObjectType2->endpoint_fields = '{"ts_cable_length":"","ts_cable_type_new":"","ts_cable_vols":""}';
        $dObjectType2->save();

        $dObjectType2 = DObjectType::where('code', 'vols')->where('direction_id', Direction::where('code', 'r')->first()->id)->first();
        $dObjectType2->endpoint_fields = '{"ts_cable_length":"","ts_cable_type_new":"","ts_cable_vols":""}';
        $dObjectType2->save();

        $dObjectType2 = DObjectType::where('code', 'vols')->where('direction_id', Direction::where('code', 't')->first()->id)->first();
        $dObjectType2->endpoint_fields = '{"ts_cable_length":"","ts_cable_type_new":"","ts_cable_vols":""}';
        $dObjectType2->save();
    }
}
