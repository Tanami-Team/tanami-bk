<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Partner::all()->count() == 0){
            Partner::create([
                'image'=>'1.png',
                'status'=>true,
            ]);
            Partner::create([
                'image'=>'2.png',
                'status'=>true,
            ]);
            Partner::create([
                'image'=>'3.png',
                'status'=>true,
            ]);
            Partner::create([
                'image'=>'4.png',
                'status'=>true,
            ]);
            Partner::create([
                'image'=>'5.png',
                'status'=>true,
            ]);
        }

    }
}
