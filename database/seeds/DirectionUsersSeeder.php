<?php
namespace Database\Seeders;
use App\Models\Direction;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DirectionUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'company_name' => 'Саидазимов С.',
            'email'=> 's.saidazimov@gis.uz',
            'director_fio' => 'Турғунов Комолидин Абзалович',
            'photo' => 'storage/userphotos/s.saidazimov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('Fpiz4crbjU',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','t')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());
        $user = User::create([
            'company_name' => 'Мирзаев Ш.',
            'email'=> 'sh.mirzaev@gis.uz',
            'director_fio' => 'Турғунов Комолидин Абзалович',
            'photo' => 'storage/userphotos/sh.mirzaev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('obxn6PbXrV',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','t')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());

        $user = User::create([
            'company_name' => 'Хаитматов А.',
            'email'=> 'a.xaitmatov@gis.uz',
            'director_fio' => 'Исламов Жамшид Нигматжанович',
            'photo' => 'storage/userphotos/a.xaitmatov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('KBstJHEa4k',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','s')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());
        $user = User::create([
            'company_name' => 'Рахматуллаев Ш.',
            'email'=> 'sh.raxmatullaev@gis.uz',
            'director_fio' => 'Исламов Жамшид Нигматжанович',
            'photo' => 'storage/userphotos/sh.raxmatullaev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('L7Na9UurH2',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','s')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());

        $user = User::create([
            'company_name' => 'Махмудов У.',
            'email'=> 'u.maxmudov@gis.uz',
            'director_fio' => 'Тигай Павел Александрович',
            'photo' => 'storage/userphotos/u.maxmudov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('HuDBJXNeH6',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','r')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());
        $user = User::create([
            'company_name' => 'Нажмиддинов Б.',
            'email'=> 'b.najmiddinov@gis.uz',
            'director_fio' => 'Тигай Павел Александрович',
            'photo' => 'storage/userphotos/b.najmiddinov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('UtPoT0L3iY',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','r')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());

        $user = User::create([
            'company_name' => 'Otabekov O.',
            'email'=> 'o.otabekov@gis.uz',
            'director_fio' => 'Мамарасулов Музаффар Рустамович',
            'photo' => 'storage/userphotos/o.otabekov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('FmGzTZ5r5C',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','m')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());
        $user = User::create([
            'company_name' => 'Хамдамов З.',
            'email'=> 'z.xamdamov@gis.uz',
            'director_fio' => 'Мамарасулов Музаффар Рустамович',
            'photo' => 'storage/userphotos/z.xamdamov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('ArpMvtT9J8',['rounds'=>10])
        ]);
        $user->direction()->associate(Direction::where('code','m')->first());
        $user->save();
        $user->assignRole(Role::where('code','ukn')->first());
    }
}
