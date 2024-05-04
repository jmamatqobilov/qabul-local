<?php
namespace Database\Seeders;
use App\Models\Menu;
use App\Role;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'name_ru' => 'Главная',
            'name_uz' => 'Bosh sahifa',
            'path' => '',
            'icon' => 'home',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','user')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Мои заявки',
            'name_uz' => 'Mening arizalarim',
            'alter_ru' => 'Мои уведомления',
            'alter_uz' => 'Mening xabarnomalarim',
            'path' => 'applications',
            'icon' => 'edit-2',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','user')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Мои объекты',
            'name_uz' => 'Mening obyektlarim',
            'path' => 'objects',
            'icon' => 'box',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','user')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Мои оборудования',
            'name_uz' => 'Mening qurilmalarim',
            'path' => 'endpoints',
            'icon' => 'tool',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','user')->first());
        $menu->save();

        $menu = Menu::create([
            'name_ru' => 'Главная',
            'name_uz' => 'Bosh sahifa',
            'path' => 'ukn/',
            'icon' => 'home',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','ukn')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Заявки',
            'name_uz' => 'Arizalar',
            'alter_ru' => 'Уведомления',
            'alter_uz' => 'Xabarnomalar',
            'path' => 'ukn/applications',
            'icon' => 'edit-2',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','ukn')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Обьекты',
            'name_uz' => 'Obyektlar',
            'path' => 'ukn/objects',
            'icon' => 'box',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','ukn')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Оборудования',
            'name_uz' => 'Qurilmalar',
            'path' => 'ukn/endpoints',
            'icon' => 'settings',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','ukn')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Статистика',
            'name_uz' => 'Statistika',
            'path' => 'ukn/stats',
            'icon' => 'bar-chart-2',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','ukn')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Мониторинг',
            'name_uz' => 'Monitoring',
            'alter_ru' => 'скрыть',
            'alter_uz' => 'hide',
            'path' => 'ukn/monitoring',
            'icon' => 'activity',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','ukn')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Карта',
            'name_uz' => 'Xarita',
            'path' => 'ukn/map',
            'icon' => 'map-pin',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','ukn')->first());
        $menu->save();

        $menu = Menu::create([
            'name_ru' => 'Главная',
            'name_uz' => 'Bosh sahifa',
            'path' => 'hududiy/',
            'icon' => 'home',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','hududiy')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Заявки',
            'name_uz' => 'Arizalar',
            'alter_ru' => 'Уведомления',
            'alter_uz' => 'Xabarnomalar',
            'path' => 'hududiy/applications',
            'icon' => 'edit-2',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','hududiy')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Обьекты',
            'name_uz' => 'Obyektlar',
            'path' => 'hududiy/objects',
            'icon' => 'box',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','hududiy')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Статистика',
            'name_uz' => 'Statistika',
            'path' => 'hududiy/stats',
            'icon' => 'bar-chart-2',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','hududiy')->first());
        $menu->save();

        $menu = Menu::create([
            'name_ru' => 'Главная',
            'name_uz' => 'Bosh sahifa',
            'path' => 'admin/',
            'icon' => 'home',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','admin')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Пользователи',
            'name_uz' => 'Foydalanuvchilar',
            'path' => 'admin/users',
            'icon' => 'database',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','admin')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Заявки',
            'name_uz' => 'Arizalar',
            'alter_ru' => 'Уведомления',
            'alter_uz' => 'Xabarnomalar',
            'path' => 'admin/applications',
            'icon' => 'edit-2',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','admin')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Меню',
            'name_uz' => 'Menyular',
            'path' => 'admin/menus',
            'icon' => 'menu',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','admin')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Словари',
            'name_uz' => 'Slovarlar',
            'path' => 'admin/dictionaries',
            'icon' => 'book',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','admin')->first());
        $menu->save();
        $menu = Menu::create([
            'name_ru' => 'Типы объектов',
            'name_uz' => 'Obyekt turlari',
            'path' => 'admin/objecttypes',
            'icon' => 'codesandbox',
            'parent' => '0'
        ]);
        $menu->role()->associate(Role::where('code','admin')->first());
        $menu->save();
    }
}
