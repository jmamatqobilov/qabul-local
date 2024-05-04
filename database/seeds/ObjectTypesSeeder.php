<?php
namespace Database\Seeders;
use App\Models\Direction;
use App\Models\DObjectType;
use Illuminate\Database\Seeder;

class ObjectTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objecttype = DObjectType::create([
            'name_ru' => 'ВОЛС',
            'name_uz' => 'OTAL',
            'code' => 'tvols'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Коаксиальные кабели',
            'name_uz' => 'Koaksial kabel',
            'code' => 'coaxcab'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Системы передачи',
            'name_uz' => 'Uzatish tizimlari',
            'code' => 'nsys'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'ЭАТС',
            'name_uz' => 'EATS',
            'code' => 'eats'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'МиниАТС',
            'name_uz' => 'MiniATS',
            'code' => 'mini_ats'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Линии радиосвязи',
            'name_uz' => 'Radioaloqa liniyalari',
            'code' => 'lines'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Сооружения связи',
            'name_uz' => 'Aloqa qurilmalari',
            'code' => 'nbuildings'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Связывающие устройства ВОЛС',
            'name_uz' => 'OTAL bog\'lovchi qurilmalari',
            'code' => 'volsdevices'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Активные устройства',
            'name_uz' => 'Aktiv qurilmalar',
            'code' => 'actdevices'
        ]);
        $objecttype->direction()->associate(Direction::where('code','t')->first());
        $objecttype->save();

        $objecttype = DObjectType::create([
            'name_ru' => 'Сервер',
            'name_uz' => 'Server',
            'code' => 'server'
        ]);
        $objecttype->direction()->associate(Direction::where('code','s')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Дата-центр',
            'name_uz' => 'Data markaz',
            'code' => 'dc'
        ]);
        $objecttype->direction()->associate(Direction::where('code','s')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Wi-MAX',
            'name_uz' => 'Wi-MAX',
            'code' => 'wimax'
        ]);
        $objecttype->direction()->associate(Direction::where('code','s')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'GPON',
            'name_uz' => 'GPON',
            'code' => 'gpon'
        ]);
        $objecttype->direction()->associate(Direction::where('code','s')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Fttx',
            'name_uz' => 'Fttx',
            'code' => 'fttx'
        ]);
        $objecttype->direction()->associate(Direction::where('code','s')->first());
        $objecttype->save();

        $objecttype = DObjectType::create([
            'name_ru' => 'Волоконно оптические линии свзяи',
            'name_uz' => 'Optik tolali aloqa liniyalari',
            'code' => 'rvols'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Телевидение',
            'name_uz' => 'Televideniye',
            'code' => 'tv'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Радио',
            'name_uz' => 'Radio',
            'code' => 'radio'
        ]);
        $objecttype->direction()->associate(Direction::where('code','r')->first());
        $objecttype->save();

        $objecttype = DObjectType::create([
            'name_ru' => 'Волоконно оптические линии свзяи',
            'name_uz' => 'Optik tolali aloqa liniyalari',
            'code' => 'mvols'
        ]);
        $objecttype->direction()->associate(Direction::where('code','m')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Радиорелейная линия',
            'name_uz' => 'Radiorele liniyasi',
            'code' => 'rrl'
        ]);
        $objecttype->direction()->associate(Direction::where('code','m')->first());
        $objecttype->save();
        $objecttype = DObjectType::create([
            'name_ru' => 'Базовая станция',
            'name_uz' => 'Tayanch stansiyasi',
            'code' => 'base'
        ]);
        $objecttype->direction()->associate(Direction::where('code','m')->first());
        $objecttype->save();
    }
}
