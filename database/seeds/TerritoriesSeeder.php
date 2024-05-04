<?php
namespace Database\Seeders;
use App\Models\Territory;
use Illuminate\Database\Seeder;

class TerritoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Territory::create([
            'name_ru' => 'Республика Каракалпакстан',
            'name_uz' => 'Qoraqalpog\'iston Respublikasi',
            'director_fio' => 'Serjanov Sherali Sagidullayevich',
            'code' => 'qoraqalpoq'
        ]);
        Territory::create([
            'name_ru' => 'Андижанская область',
            'name_uz' => 'Andijon viloyati',
            'director_fio' => 'Mamatkarimov Begali Shavkatbekovich',
            'code' => 'andijon'
        ]);
        Territory::create([
            'name_ru' => 'Бухарская область',
            'name_uz' => 'Buxoro viloyati',
            'director_fio' => 'Rajabov Beshim Madiyevich',
            'code' => 'buxoro'
        ]);
        Territory::create([
            'name_ru' => 'Джизакская область',
            'name_uz' => 'Jizzax viloyati',
            'director_fio' => 'Dobilov Oybek Abduganiyevich',
            'code' => 'jizzax'
        ]);
        Territory::create([
            'name_ru' => 'Кашкадарьинская область',
            'name_uz' => 'Qashqadaryo viloyati',
            'director_fio' => 'Nurmuradov Zafarjon Nurmurod o\'g\'li',
            'code' => 'qashqadaryo'
        ]);
        Territory::create([
            'name_ru' => 'Навоийская область',
            'name_uz' => 'Navoiy viloyati',
            'director_fio' => 'Rasulov Mustafo Giyosovich',
            'code' => 'navoiy'
        ]);
        Territory::create([
            'name_ru' => 'Наманганская область',
            'name_uz' => 'Namangan viloyati',
            'director_fio' => 'Xasanov Aloxon Tuxtasunovich',
            'code' => 'namangan'
        ]);
        Territory::create([
            'name_ru' => 'Самаркандская область',
            'name_uz' => 'Samarqand viloyati',
            'director_fio' => 'Raxmatov Komil Tolibovich',
            'code' => 'samarqand'
        ]);
        Territory::create([
            'name_ru' => 'Сурхандарьинская область',
            'name_uz' => 'Surxondaryo viloyati',
            'director_fio' => 'Shonazarov Xurshid Shanazarovich',
            'code' => 'surxondaryo'
        ]);
        Territory::create([
            'name_ru' => 'Сырдарьинская область',
            'name_uz' => 'Sirdaryo viloyati',
            'director_fio' => 'Babayev Farxad Olimdjanovich',
            'code' => 'sirdaryo'
        ]);
        Territory::create([
            'name_ru' => 'Тошкент вилояти',
            'name_uz' => 'Toshkent viloyati',
            'director_fio' => 'Zikriyaxodjayev Zokirjon Zafarovich',
            'code' => 'toshvil'
        ]);
        Territory::create([
            'name_ru' => 'Ферганская область',
            'name_uz' => 'Farg\'ona viloyati',
            'director_fio' => 'Rafikov Muminjon Ismailovich',
            'code' => 'fargona'
        ]);
        Territory::create([
            'name_ru' => 'Хорезмская область',
            'name_uz' => 'Xorazm viloyati',
            'director_fio' => 'Radjapov Zoxidjon Madraximovich',
            'code' => 'xorazm'
        ]);
        Territory::create([
            'name_ru' => 'г.Ташкент',
            'name_uz' => 'Toshkent shahar',
            'director_fio' => 'Meliboyev Oybek Ganisherovich',
            'code' => 'toshkent'
        ]);
    }
}
