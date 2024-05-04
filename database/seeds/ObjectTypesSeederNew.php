<?php
namespace Database\Seeders;
use App\Models\Direction;
use App\Models\DObjectType;
use Illuminate\Database\Seeder;

class ObjectTypesSeederNew extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objecttype = DObjectType::create([
            'name_ru' => 'Мультисервисный узел абонентского доступа MSAN',
            'name_uz' => 'Multiservisli qurilmalardan foydalanish qurilmalari MSAN',
            'code' => 'msan',
            'endpoint_fields' => '{"ts_assembly_value":"_msan","ts_cable_length":"_msan"}'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'OLT',
            'name_uz' => 'OLT',
            'code' => 'olt'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'РРЛ',
            'name_uz' => 'RRL',
            'code' => 'trrl'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Switch',
            'name_uz' => 'Switch',
            'code' => 'switch'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();

        $objecttype = DObjectType::create([
            'name_ru' => 'Wi-Fi',
            'name_uz' => 'Wi-Fi',
            'code' => 'wifi',
            'endpoint_fields' => '{"ts_assembly_value":"","ts_cable_length":""}'
        ]);
        $objecttype->direction()->associate(Direction::where('code','s')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'ВОЛС',
            'name_uz' => 'OTAL',
            'code' => 'svols'
        ]);
        $objecttype->direction()->associate(Direction::where('code','s')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'xDSL',
            'name_uz' => 'xDSL',
            'code' => 'xdsl'
        ]);
        $objecttype->direction()->associate(Direction::where('code','s')->first());
        $objecttype->save();


        $objecttype = DObjectType::create([
            'name_ru' => 'Головная станция формирования',
            'name_uz' => 'Shakllantiruvchi bosh stansiya',
            'code' => 'gs'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Кабельная гибридная сеть КТВ и СПД',
            'name_uz' => 'kabelli gibrid tarmoq KTV va MUT',
            'code' => 'ktvmut'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'ТВ студия',
            'name_uz' => 'TV studiya',
            'code' => 'tvstudio'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Радио студия',
            'name_uz' => 'Radio studiya',
            'code' => 'radiostudio'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'КТВ студия',
            'name_uz' => 'KTV studiya',
            'code' => 'ktvstudio'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Антенно-мачтовое сооружение',
            'name_uz' => 'Antenna-machta inshooti',
            'code' => 'machta'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'ТВ передатчик',
            'name_uz' => 'TV uzatkich',
            'code' => 'tvsender'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Радио передатчик',
            'name_uz' => 'Radio uzatkich',
            'code' => 'radiosender'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'РРЛ',
            'name_uz' => 'RRL',
            'code' => 'rrl'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'ТВ модулятор',
            'name_uz' => 'TV modulyator',
            'code' => 'tvmodulyator'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Радио модулятор',
            'name_uz' => 'Radio modulyator',
            'code' => 'radiomodulyator'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'КТВ модулятор',
            'name_uz' => 'KTV modulyator',
            'code' => 'ktvmodulyator'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Спутник станция',
            'name_uz' => 'Sun’iy yo‘ldosh stansiyasi',
            'code' => 'sputnik'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Ретрансляционный узел',
            'name_uz' => 'Retranslyasiya bog‘lamasi',
            'code' => 'retransl'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();

        $objecttype = DObjectType::create([
            'name_ru' => 'Центр коммутации',
            'name_uz' => 'Kommutatsiya markazi',
            'code' => 'commutation'
        ]);
        $objecttype->direction()->associate(Direction::where('code','m')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Серверное оборудование',
            'name_uz' => 'Server qurilmasi',
            'code' => 'mserver'
        ]);
        $objecttype->direction()->associate(Direction::where('code','m')->first());
        $objecttype->save();
    }
}
