<?php
namespace Database\Seeders;
use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userrole = Role::create([
            'name' => 'Registered',
            'code' => 'user'
        ]);
        $userrole->assignPermission(Permission::where('name','GIVE_APPLICATION')->first());
        $userrole->assignPermission(Permission::where('name','ADD_OBJECT')->first());
        $userrole->assignPermission(Permission::where('name','ADD_ENDPOINT')->first());
        $gisrole = Role::create([
            'name' => 'UzKomNazorat',
            'code' => 'ukn'
        ]);
        $gisrole->assignPermission(Permission::where('name','MANAGE_DICTIONARY')->first());
        $gisrole->assignPermission(Permission::where('name','MODERATE_APPLICATION')->first());
        $monrole = Role::create([
            'name' => 'Monitor',
            'code' => 'ukn'
        ]);
        $monrole->assignPermission(Permission::where('name','MONITOR')->first());
        $hududiyrole = Role::create([
            'name' => 'Hududiy',
            'code' => 'hududiy'
        ]);
        $hududiyrole->assignPermission(Permission::where('name','MODERATE_OBJECTS')->first());
        $hududiyrole->assignPermission(Permission::where('name','MODERATE_ENDPOINTS')->first());
        $adminrole = Role::create([
            'name' => 'Administrator',
            'code' => 'admin'
        ]);
        $adminrole->assignPermission(Permission::where('name','VIEW_ADMIN')->first());
        $adminrole->assignPermission(Permission::where('name','MANAGE_DICTIONARY')->first());
        $adminrole->assignPermission(Permission::where('name','MANAGE_USERS')->first());
        $adminrole->assignPermission(Permission::where('name','MANAGE_MENUS')->first());
        $adminrole->assignPermission(Permission::where('name','MANAGE_APPLICATIONS')->first());
        $adminrole->assignPermission(Permission::where('name','MANAGE_OBJECTS')->first());
        $adminrole->assignPermission(Permission::where('name','MANAGE_ENDPOINTS')->first());
    }
}
