<?php
namespace Database\Seeders;
use App\Models\Dictionary;
use App\Models\DictionaryValue;
use Illuminate\Database\Seeder;

class DictionaryValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 4',
            'name_uz' => 'Optik tolali kabel 4',
            'code' => 't_vols_4'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','t_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 6',
            'name_uz' => 'Optik tolali kabel 6',
            'code' => 't_vols_6'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','t_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 8',
            'name_uz' => 'Optik tolali kabel 8',
            'code' => 't_vols_8'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','t_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 12',
            'name_uz' => 'Optik tolali kabel 12',
            'code' => 't_vols_12'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','t_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 24',
            'name_uz' => 'Optik tolali kabel 24',
            'code' => 't_vols_24'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','t_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 32',
            'name_uz' => 'Optik tolali kabel 32',
            'code' => 't_vols_32'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','t_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 64',
            'name_uz' => 'Optik tolali kabel 64',
            'code' => 't_vols_64'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','t_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'ТПП (ТППэп, ТППэпЗ, ТСВ, ТПВ, ТГ ТБГ)',
            'name_uz' => 'ТПП (ТППэп, ТППэпЗ, ТСВ, ТПВ, ТГ ТБГ)',
            'code' => 'ttp'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','t_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 4',
            'name_uz' => 'Optik tolali kabel 4',
            'code' => 's_vols_4'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','s_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 6',
            'name_uz' => 'Optik tolali kabel 6',
            'code' => 's_vols_6'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','s_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 8',
            'name_uz' => 'Optik tolali kabel 8',
            'code' => 's_vols_8'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','s_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 12',
            'name_uz' => 'Optik tolali kabel 12',
            'code' => 's_vols_12'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','s_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 24',
            'name_uz' => 'Optik tolali kabel 24',
            'code' => 's_vols_24'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','s_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 32',
            'name_uz' => 'Optik tolali kabel 32',
            'code' => 's_vols_32'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','s_cable_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 64',
            'name_uz' => 'Optik tolali kabel 64',
            'code' => 's_vols_64'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','s_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Панельный',
            'name_uz' => 'Panelli',
            'code' => 'panelnyi'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_antenna_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Дециметровый',
            'name_uz' => 'Detsimetrli',
            'code' => 'decimetrovyi'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_antenna_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Логопериодическая',
            'name_uz' => 'Logoperiodik',
            'code' => 'logoperiodiceskaya'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_antenna_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Панельная',
            'name_uz' => 'Panelli',
            'code' => 'panelnyi'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_antenna_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Рандом (барабанная)',
            'name_uz' => 'Random (barabanli)',
            'code' => 'random'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_antenna_type')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Оптика',
            'name_uz' => 'Optika',
            'code' => 'optic'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_antenna_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'DVB-T',
            'name_uz' => 'DVB-T',
            'code' => 'dvbt'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_broadcasting_standard')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'FM',
            'name_uz' => 'FM',
            'code' => 'fm'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_broadcasting_standard')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'Кабельное ТВ',
            'name_uz' => 'Kabel TV',
            'code' => 'cable_television'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => '2G',
            'name_uz' => '2G',
            'code' => '2g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => '3G',
            'name_uz' => '3G',
            'code' => '3g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => '4G',
            'name_uz' => '4G',
            'code' => '4g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'телерадиовещание',
            'name_uz' => 'teleradio uzatish',
            'code' => 'teleradio_broadcasting'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_station_purpose')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'радиовещание',
            'name_uz' => 'radio uzatish',
            'code' => 'radio_broadcasting'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_station_purpose')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'кабельное телевидение',
            'name_uz' => 'kabel televideniyesi',
            'code' => 'cable_television'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','r_station_purpose')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'для мобильной связи',
            'name_uz' => 'mobil aloqa uchun',
            'code' => 'for_mobile'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_station_purpose')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'прием-передача радиосигнала',
            'name_uz' => 'radiosignal uzatish-qabul qilish',
            'code' => 'radio_transmission'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_station_purpose')->first());
        $dicval->save();
        $dicval = DictionaryValue::create([
            'name_ru' => 'прием-передача сигнала',
            'name_uz' => 'signal uzatish-qabul qilish',
            'code' => 'signal_transmission'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_station_purpose')->first());
        $dicval->save();
    }
}
