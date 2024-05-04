<?php
namespace Database\Seeders;
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'VIEW_ADMIN'
        ]);
        Permission::create([
            'name' => 'MANAGE_DICTIONARY'
        ]);
        Permission::create([
            'name' => 'MANAGE_USERS'
        ]);
        Permission::create([
            'name' => 'MANAGE_MENUS'
        ]);
        Permission::create([
            'name' => 'MANAGE_APPLICATIONS'
        ]);
        Permission::create([
            'name' => 'MANAGE_OBJECTS'
        ]);
        Permission::create([
            'name' => 'MANAGE_ENDPOINTS'
        ]);
        Permission::create([
            'name' => 'GIVE_APPLICATION'
        ]);
        Permission::create([
            'name' => 'MODERATE_APPLICATION'
        ]);
        Permission::create([
            'name' => 'MODERATE_OBJECTS'
        ]);
        Permission::create([
            'name' => 'MODERATE_ENDPOINTS'
        ]);
        Permission::create([
            'name' => 'ADD_OBJECT'
        ]);
        Permission::create([
            'name' => 'ADD_ENDPOINT'
        ]);
        Permission::create([
            'name' => 'MONITOR'
        ]);
    }
}
