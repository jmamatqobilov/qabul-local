<?php
namespace Database\Seeders;
use App\Models\Direction;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'company_name' => 'Administrator',
            'email'=> 'admin@qabul',
            'password' => Hash::make('QabulAdminPassword')
        ]);
        $user->assignRole(Role::where('code','admin')->first());

        $user = User::create([
            'company_name' => 'Director',
            'email'=> 'director@qabul',
            'director_fio' => 'Xodjaev Asadjon',
            'inn' => '900000000',
            'is_director' => true,
            'password' => Hash::make('QabulDirectorPassword')
        ]);
        $user->assignRole(Role::where('code','ukn')->first());
    }
}
