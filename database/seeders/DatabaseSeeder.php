<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\User;
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
        User::factory()->create([
            'name'  => 'Client',
            'email' => 'client@moltaqa.sa',
            'is_authorized' => 1,
            'lat'   => '31.032810932279375',
            'lng'  => '31.360510014414142',
            'location' => 'محل قطة وعصفورة'
        ]);

        User::factory(10)->create();

        Driver::insert(include database_path('intial_data/drivers.php'));
    }
}
