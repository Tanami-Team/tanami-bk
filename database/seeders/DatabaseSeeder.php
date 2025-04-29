<?php

namespace Database\Seeders;

use App\Models\Slider;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(GoalsSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ProjectSeeder::class);
    }
}
