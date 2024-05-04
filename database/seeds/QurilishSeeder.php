<?php
namespace Database\Seeders;
use App\Models\Dictionary;
use App\Models\DictionaryValue;
use Illuminate\Database\Seeder;

class QurilishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Menu::where('path', 'applications')->update([
            'alter_ru' => 'Мои уведомления',
            'alter_uz' => 'Mening xabarnomalarim',
            'sort' => 75
        ]);

        \App\Models\Menu::where('path', 'hududiy/applications')->update([
            'alter_ru' => 'Уведомления',
            'alter_uz' => 'Xabarnomalar',
            'sort' => 75
        ]);

        \App\Models\Menu::where('path', 'admin/applications')->update([
            'alter_ru' => 'Уведомления',
            'alter_uz' => 'Xabarnomalar',
            'sort' => 75
        ]);

        \App\Models\Menu::where('path', 'ukn/applications')->update([
            'alter_ru' => 'Уведомления',
            'alter_uz' => 'Xabarnomalar',
            'sort' => 75
        ]);

        \App\Models\Menu::where('path', 'ukn/monitoring')->update([
            'alter_ru' => 'скрыть',
            'alter_uz' => 'hide'
        ]);

        \App\Models\Menu::where('icon', 'home')->update([
            'sort' => 50
        ]);

        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 16',
            'name_uz' => 'Optik tolali kabel 16',
            'code' => 't_vols_16'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','t_cable_type')->first());
        $dicval->save();


        $dicval = DictionaryValue::create([
            'name_ru' => 'Волоконно оптический кабель 16',
            'name_uz' => 'Optik tolali kabel 16',
            'code' => 's_vols_16'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','s_cable_type')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => '2G/3G',
            'name_uz' => '2G/3G',
            'code' => '2g3g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => '2G/4G',
            'name_uz' => '2G/4G',
            'code' => '2g4g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => '2G/3G/4G',
            'name_uz' => '2G/3G/4G',
            'code' => '2g3g4g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => '3G/4G',
            'name_uz' => '3G/4G',
            'code' => '3g4g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => '5G',
            'name_uz' => '5G',
            'code' => '5g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => '5G/4G',
            'name_uz' => '5G/4G',
            'code' => '5g4g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();

        $dicval = DictionaryValue::create([
            'name_ru' => '5G/4G/3G',
            'name_uz' => '5G/4G/3G',
            'code' => '5g4g3g'
        ]);
        $dicval
            ->dictionary()
            ->associate(Dictionary::where('code','m_broadcasting_standard')->first());
        $dicval->save();

    }
}
