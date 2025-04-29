<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Member::all()->count() == 0){
            Member::create([
                'name'=>'د.فؤاد عبد الكريم العبد الكريم',
                'job'=>'رئيس مجلس الادارة',
                'image'=>'1.png',
            ]);
        }
    }
}
