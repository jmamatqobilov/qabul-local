<?php
namespace Database\Seeders;
use App\Models\Dictionary;
use App\Models\Direction;
use Illuminate\Database\Seeder;

class DictionariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dictionary = Dictionary::create([
           'name_ru' => 'Тип кабеля',
           'name_uz' => 'Kabel turi',
           'code' => 't_cable_type'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code','t')->first());
        $dictionary->save();

        $dictionary = Dictionary::create([
            'name_ru' => 'Тип кабеля',
            'name_uz' => 'Kabel turi',
            'code' => 's_cable_type'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code','s')->first());
        $dictionary->save();

        $dictionary = Dictionary::create([
            'name_ru' => 'Тип антенны',
            'name_uz' => 'Antenna turi',
            'code' => 'r_antenna_type'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code','r')->first());
        $dictionary->save();

        $dictionary = Dictionary::create([
            'name_ru' => 'Тип антенны',
            'name_uz' => 'Antenna turi',
            'code' => 'm_antenna_type'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code','m')->first());
        $dictionary->save();

        $dictionary = Dictionary::create([
            'name_ru' => 'Стандарт телерадиовещания',
            'name_uz' => 'Teleradio uzatuv standarti',
            'code' => 'r_broadcasting_standard'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code','r')->first());
        $dictionary->save();

        $dictionary = Dictionary::create([
            'name_ru' => 'Стандарт мобильного вещания',
            'name_uz' => 'Mobil uzatuv standarti',
            'code' => 'm_broadcasting_standard'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code','m')->first());
        $dictionary->save();

        $dictionary = Dictionary::create([
            'name_ru' => 'Назначение станции',
            'name_uz' => 'Stansiya vazifasi',
            'code' => 'r_station_purpose'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code','r')->first());
        $dictionary->save();

        $dictionary = Dictionary::create([
            'name_ru' => 'Назначение станции',
            'name_uz' => 'Stansiya vazifasi',
            'code' => 'm_station_purpose'
        ]);
        $dictionary
            ->direction()
            ->associate(Direction::where('code','m')->first());
        $dictionary->save();
    }
}
