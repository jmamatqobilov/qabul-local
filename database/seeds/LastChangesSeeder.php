<?php
namespace Database\Seeders;
use App\Models\Dictionary;
use App\Models\DictionaryValue;
use App\Models\Direction;
use Illuminate\Database\Seeder;

class LastChangesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DObjectType::where('code', 'lines')->update([
            'name_ru' => 'Радиорелейные линии',
            'name_uz' => 'Radiorele liniyalari',
            'endpoint_fields' => '{"rm_broadcasting_standard":"","rm_station_power":"","rm_antenna_type":"","rm_antenna_suspension_height":"","rm_transceivers_count":""}'
        ]);

        \App\Models\DObjectType::where('code', 'gpon')->update([
            'name_ru' => 'PON',
            'name_uz' => 'PON',
            'endpoint_fields' => '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_type":""}'
        ]);

        \App\Models\DObjectType::where('code', 'xdsl')->update([
            'endpoint_fields' => '{"ts_assembly_value":"_pcount"}'
        ]);

        \App\Models\DObjectType::where('code', 'olt')->update([
            'endpoint_fields' => '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_type":""}'
        ]);
        \App\Models\DObjectType::where('code', 'switch')->update([
            'endpoint_fields' => '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_type":""}'
        ]);
        \App\Models\DObjectType::where('code', 'fttx')->update([
            'endpoint_fields' => '{"ts_assembly_value":"_pcount","ts_cable_length":"","ts_cable_type":""}'
        ]);

        \App\Models\DObjectType::where('code', 'vols')->where('direction_id', Direction::where('code','m')->first()->id)->update([
            'endpoint_fields' => '{"ts_cable_length":"","ts_cable_type":""}'
        ]);

        \App\Models\DObjectType::where('code', 'server')->update([
            'endpoint_fields' => '{"ts_assembly_value":"_server"}'
        ]);

        \App\Models\DObjectType::where('code', 'dc')->update([
            'endpoint_fields' => '{"ts_assembly_value":"_dc"}'
        ]);

        \App\Models\DObjectType::where('code', 'wimax')->update([
            'endpoint_fields' => '{"ts_cable_length":"_rcov"}'
        ]);

        \App\Models\DObjectType::where('code', 'msan')->update([
            'endpoint_fields' => '{"ts_assembly_value":"_msan","ts_cable_length":"_msan"}'
        ]);

        \App\Models\DObjectType::where('code', 'wifi')->update([
            'endpoint_fields' => '{"ts_cable_length":"_rcov"}'
        ]);

        \App\Models\DObjectType::where('code', 'commutation')->update([
            'endpoint_fields' => '{"ts_assembly_value":"_commutation", "rm_broadcasting_standard":"","rm_station_power":"","rm_station_purpose":"","rm_antenna_type":"","rm_antenna_suspension_height":"","rm_transceivers_count":""}'
        ]);

        \App\Models\DObjectType::where('code', 'base')->update([
            'endpoint_fields' => '{"ts_cable_length":"_rcov", "rm_broadcasting_standard":"","rm_station_power":"","rm_station_purpose":"","rm_antenna_type":"","rm_antenna_suspension_height":"","rm_transceivers_count":""}'
        ]);


        $dicval = DictionaryValue::create([
            'name_ru' => 'CDMA/CDMAEVDO',
            'name_uz' => 'CDMA/CDMAEVDO',
            'code' => 'cdmacdmaevdo'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'AM',
            'name_uz' => 'AM',
            'code' => 'am'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_broadcasting_standard')->first());
        $dicval->save();

        DictionaryValue::where('code', 'dvbt')->update([
            'name_ru' => 'DVB-T/DVB-T2',
            'name_uz' => 'DVB-T/DVB-T2',
        ]);
    }
}
