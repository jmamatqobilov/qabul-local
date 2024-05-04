<?php
namespace Database\Seeders;
use App\Models\DObjectType;
use Illuminate\Database\Seeder;

class QollanilishSohasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // {"qol_soha":""}
        $objectType = DObjectType::where('code', 'server')->first();
        $objectType->endpoint_fields = '{"qol_soha":""}';
        $objectType->save();
    }
}
