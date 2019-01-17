<?php

use App\Models\Eloquent\Visit;
use App\Models\Eloquent\Website;
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
        Website::query()->truncate();
        Visit::query()->truncate();

        for ($i = 0; $i < 3; $i++) {
            factory(Website::class)->create();
        }

        for ($i = 0; $i < 100; $i++) {
            factory(Visit::class)->create([
                'website_id' => rand(1, 3),
            ]);
        }
    }
}
