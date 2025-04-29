<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Client::all()->count() == 0){
            Client::create([
                'image'=>'1.png',
                'status'=>true,
            ]);
            Client::create([
                'image'=>'2.png',
                'status'=>true,
            ]);
            Client::create([
                'image'=>'3.png',
                'status'=>true,
            ]);
            Client::create([
                'image'=>'4.png',
                'status'=>true,
            ]);
            Client::create([
                'image'=>'5.png',
                'status'=>true,
            ]);
        }
    }
}
