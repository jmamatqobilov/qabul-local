<?php
namespace Database\Seeders;
use App\Models\Direction;
use Illuminate\Database\Seeder;

class DirectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Direction::create([
            'name_ru' => 'Телекомуникация',
            'name_uz' => 'Telekomunikatsiya',
            'code' => 't'
        ]);
        Direction::create([
            'name_ru' => 'Сеть передачи данных',
            'name_uz' => 'Ma\'lumot uzatish tarmoqlari',
            'code' => 's'
        ]);
        Direction::create([
            'name_ru' => 'Телерадиовещание',
            'name_uz' => 'Teleradioeshittirish',
            'code' => 'r'
        ]);
        Direction::create([
            'name_ru' => 'Мобильное и радиосвязь',
            'name_uz' => 'Mobil va radiouzatish',
            'code' => 'm'
        ]);
    }
}
