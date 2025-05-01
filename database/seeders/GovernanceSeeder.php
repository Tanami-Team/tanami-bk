<?php

namespace Database\Seeders;

use App\Models\GovernanceFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(GovernanceFile::all()->count() == 0){
            GovernanceFile::create([
                'name'=>[
                    'ar'=>'القوائم المالية 2022م',
                    'en'=>'Financial statements',
                ],
                'file'=>'1.pdf',
                'status'=>1,
            ]);
            GovernanceFile::create([
                'name'=>[
                    'ar'=>'القوائم المالية 2022م',
                    'en'=>'Financial statements',
                ],
                'file'=>'1.pdf',
                'status'=>1,
            ]);
            GovernanceFile::create([
                'name'=>[
                    'ar'=>'القوائم المالية 2022م',
                    'en'=>'Financial statements',
                ],
                'file'=>'1.pdf',
                'status'=>1,
            ]);
            GovernanceFile::create([
                'name'=>[
                    'ar'=>'القوائم المالية 2022م',
                    'en'=>'Financial statements',
                ],
                'file'=>'1.pdf',
                'status'=>1,
            ]);
        }
    }
}
