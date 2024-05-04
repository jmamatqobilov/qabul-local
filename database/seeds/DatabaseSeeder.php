<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // comment start

        $this->call(DirectionsSeeder::class);
        $this->call(TerritoriesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(HududiyUsersSeeder::class);
        $this->call(DirectionUsersSeeder::class);

        $this->call(ApplicationStatusSeeder::class);
        $this->call(MenusSeeder::class);
        $this->call(ObjectTypesSeeder::class);
        $this->call(ObjectTypesSeederNew::class);



        $this->call(DictionariesSeeder::class);
        $this->call(DictionaryValuesSeeder::class);

        $this->call(QurilishSeeder::class);

        // comment end

        $this->call(CustomSeeder::class);
//        $this->call(CustomSeeder2::class);

        // qollanilish sohasi

        $this->call(QollanilishSohasiSeeder::class);
    }
}
