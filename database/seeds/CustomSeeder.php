<?php
namespace Database\Seeders;
use App\Models\Dictionary;
use App\Models\DictionaryValue;
use App\Models\Direction;
use Illuminate\Database\Seeder;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* Dictionaires Seeder */

        Dictionary::where('code', 't_cable_type')->update(['name_ru'=> 'Количество оптических волокон в оптоволоконном кабеле связи','name_uz' => 'Optik tolali a\'loqa kabelidagi optik tolalar soni', 'code' => 't_cable_vols', 'direction_id' => 1]);
        Dictionary::where('code', 's_cable_type')->update(['name_ru'=> 'Количество оптических волокон в оптоволоконном кабеле связи','name_uz' => 'Optik tolali a\'loqa kabelidagi optik tolalar soni', 'code' => 's_cable_vols', 'direction_id' => 2]);

        $dictionary = Dictionary::create([
            'name_ru' => 'Тип кабеля',
            'name_uz' => 'Kabel turi',
            'code' => 't_cable_type'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code', 't')->first());
        $dictionary->save();

        $dictionary = Dictionary::create([
            'name_ru' => 'Тип кабеля',
            'name_uz' => 'Kabel turi',
            'code' => 's_cable_type'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code', 's')->first());
        $dictionary->save();

        /* END Dictionaires Seeder */



        /* Dictionaires Values Seeder */

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для укладки в помещении',
            'name_uz' => 'Binolar ichida yotqizish uchun',
            'code' => 't_type_1'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 't_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для укладки в канализацию',
            'name_uz' => 'Kanalizatsiyaga yotqizish uchun',
            'code' => 't_type_2'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 't_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для укладки в грунты I-IV групп',
            'name_uz' => 'I-IV guruh tuproqlarga yotqizish uchun',
            'code' => 't_type_3'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 't_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для укладки на каменистую почву',
            'name_uz' => 'Toshli tuproqqa yotqizish uchun',
            'code' => 't_type_4'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 't_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Подвесной',
            'name_uz' => 'Osma',
            'code' => 't_type_5'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 't_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для прокладки в пакетах через водные преграды',
            'name_uz' => 'Suv to\'siqlari orqali o\'tishlarda yotqizish uchun',
            'code' => 't_type_6'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 't_cable_type')->first());
        $dicval->save();

        // s type

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для укладки в помещении',
            'name_uz' => 'Binolar ichida yotqizish uchun',
            'code' => 's_type_1'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 's_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для укладки в канализацию',
            'name_uz' => 'Kanalizatsiyaga yotqizish uchun',
            'code' => 's_type_2'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 's_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для укладки в грунты I-IV групп',
            'name_uz' => 'I-IV guruh tuproqlarga yotqizish uchun',
            'code' => 's_type_3'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 's_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для укладки на каменистую почву',
            'name_uz' => 'Toshli tuproqqa yotqizish uchun',
            'code' => 's_type_4'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 's_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Подвесной',
            'name_uz' => 'Osma',
            'code' => 's_type_5'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 's_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'Для прокладки в пакетах через водные преграды',
            'name_uz' => 'Suv to\'siqlari orqali o\'tishlarda yotqizish uchun',
            'code' => 's_type_6'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 's_cable_type')->first());
        $dicval->save();

        // ------------------------------------


//        new standart type

        $dicval = DictionaryValue::create([
            'name_ru' => 'DVB-C',
            'name_uz' => 'DVB-C',
            'code' => 'dvbc'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 'r_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'DVB-C2',
            'name_uz' => 'DVB-C2',
            'code' => 'dvbc2'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 'r_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => 'MMDS',
            'name_uz' => 'MMDS',
            'code' => 'mmds'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code', 'r_broadcasting_standard')->first());
        $dicval->save();

        /* END Dictionaires Values Seeder */

    }
}
