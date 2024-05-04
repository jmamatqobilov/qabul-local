<?php
namespace Database\Seeders;
use App\Models\Direction;
use App\Models\Territory;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HududiyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'company_name' => 'Мамажонов А',
            'email'=> 'a.mamajonov@gis.uz',
            'photo' => 'storage/userphotos/a.mamajonov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('ZcfsmEL2GT',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','andijon')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Муҳаммадюсупов С',
            'email'=> 's.muhammadyusupov@gis.uz',
            'photo' => 'storage/userphotos/s.muhammadyusupov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('Jx3FMbPyyV',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','andijon')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Наврўзова М',
            'email'=> 'm.navruzova@gis.uz',
            'photo' => 'storage/userphotos/m.navruzova.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('JdG16uAKwv',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','buxoro')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Турсунов Ў',
            'email'=> 'u.tursunov@gis.uz',
            'photo' => 'storage/userphotos/u.tursunov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('Jxoa07kUFk',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','buxoro')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Дўмонов Р',
            'email'=> 'r.dumonov@gis.uz',
            'photo' => 'storage/userphotos/r.dumonov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('TeKoKJZ7B2',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','jizzax')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Мамасолиев О',
            'email'=> 'f.mamasoliev@gis.uz',
            'photo' => 'storage/userphotos/f.mamasoliev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('A0KvPNXz7J',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','jizzax')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Жўраев У',
            'email'=> 'u.juraev@gis.uz',
            'photo' => 'storage/userphotos/u.juraev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('H7LR6pAULe',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','qashqadaryo')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Расулов Ф',
            'email'=> 'f.rasulov@gis.uz',
            'photo' => 'storage/userphotos/f.rasulov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('WCsy0LrPpH',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','qashqadaryo')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Мухитдинов Т',
            'email'=> 't.muxitdinov@gis.uz',
            'photo' => 'storage/userphotos/t.muxitdinov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('B8TTQ9AsNb',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','navoiy')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Қосимов  Ё',
            'email'=> 'y.qosimov@gis.uz',
            'photo' => 'storage/userphotos/y.qosimov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('URUBUDZ01B',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','navoiy')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Адхамов О',
            'email'=> 'o.adxamov@gis.uz',
            'photo' => 'storage/userphotos/o.adxamov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('NgsWVKuVH2',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','namangan')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Тошматов Ж',
            'email'=> 'j.toshmatov@gis.uz',
            'photo' => 'storage/userphotos/j.toshmatov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('QEG48w7VmV',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','namangan')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Янгибоев М',
            'email'=> 'm.yangiboev@gis.uz',
            'photo' => 'storage/userphotos/m.yangiboev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('CJbmEM556M',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','samarqand')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Каримов Р',
            'email'=> 'r.karimov@gis.uz',
            'photo' => 'storage/userphotos/r.karimov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('XbeQPyAa5q',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','samarqand')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Абдуганиев Э',
            'email'=> 'e.abduganiev@gis.uz',
            'photo' => 'storage/userphotos/e.abduganiev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('MqrQwtic6V',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','sirdaryo')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Авезова М',
            'email'=> 'm.avezova@gis.uz',
            'photo' => 'storage/userphotos/m.avezova.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('Fsmg5DWC7k',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','sirdaryo')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Хамраев А',
            'email'=> 'a.xamraev@gis.uz',
            'photo' => 'storage/userphotos/a.xamraev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('QfeeW0hooB',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','surxondaryo')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Мурадов А',
            'email'=> 'a.muradov@gis.uz',
            'photo' => 'storage/userphotos/a.muradov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('F8yp1JhCmQ',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','surxondaryo')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Беков Ғ',
            'email'=> 'g.bekov@gis.uz',
            'photo' => 'storage/userphotos/g.bekov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('R24Pa8ZDb5',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','toshvil')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Ризаев А',
            'email'=> 'a.rizaev@gis.uz',
            'photo' => 'storage/userphotos/a.rizaev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('LHWHcr9wE8',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','toshvil')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Холматов И',
            'email'=> 'i.xolmatov@gis.uz',
            'photo' => 'storage/userphotos/i.xolmatov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('NW7xT6i9Zz',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','fargona')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Иброхимов Б',
            'email'=> 'b.ibroximov@gis.uz',
            'photo' => 'storage/userphotos/b.ibroximov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('C0jFYVgC49',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','fargona')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Саитов И',
            'email'=> 'i.saitov@gis.uz',
            'photo' => 'storage/userphotos/i.saitov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('XT8eaz0Yyv',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','xorazm')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Қурбонбоев Қ',
            'email'=> 'q.qurbonboev@gis.uz',
            'photo' => 'storage/userphotos/q.qurbonboev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('Ftysmcf82b',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','xorazm')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Абдуразоқов Х',
            'email'=> 'x.abdurazoqov@gis.uz',
            'photo' => 'storage/userphotos/x.abdurazoqov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('A5UPKnw7Dn',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','toshkent')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Cирлиев А',
            'email'=> 'a.sirliev@gis.uz',
            'photo' => 'storage/userphotos/a.sirliev.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('WyYu8pWiz7',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','toshkent')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());

        $user = User::create([
            'company_name' => 'Есемуратов О',
            'email'=> 'o.yesemuratov@gis.uz',
            'photo' => 'storage/userphotos/o.yesemuratov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('Q7hN5Kaach',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','qoraqalpoq')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
        $user = User::create([
            'company_name' => 'Алымбетов Р',
            'email'=> 'r.alimbetov@gis.uz',
            'photo' => 'storage/userphotos/r.alimbetov.jpg',
            'inn' => rand(999990001, 999999999),
            'password' => Hash::make('HBp5KJh8vt',['rounds'=>10])
        ]);
        $user->territory()->associate(Territory::where('code','qoraqalpoq')->first());
        $user->save();
        $user->assignRole(Role::where('code','hududiy')->first());
    }
}
