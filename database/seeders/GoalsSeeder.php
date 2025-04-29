<?php

namespace Database\Seeders;

use App\Models\Goals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Goals::count() == 0){
            Goals::create([
                'name'=>[
                    'ar'=>'تأسيس منظمات غير ربحية ووحدات عمل متخصصة  ',
                    'en'=>'Establishing Non-Profit Organizations and Specialized Work Units',
                ],
                'status'=>1,
            ]);
            Goals::create([
                'name'=>[
                    'ar'=>'تمكين الجمعيات الناشئة وتسريع اطلاق اعمالها ',
                    'en'=>'Empowering Emerging Associations and Accelerating the Launch of Their Operations',
                ],
                'status'=>1,
            ]);
            Goals::create([
                'name'=>[
                    'ar'=>'دعم الافكار والمبادرات الريادية التنموية وتطويرها  ',
                    'en'=>'Supporting and Developing Innovative Developmental Ideas and Initiatives',
                ],
                'status'=>1,
            ]);
            Goals::create([
                'name'=>[
                    'ar'=>'بناء نموذج عمل مؤسسي مبتكر للشركات الاستراتيجية ',
                    'en'=>'Developing an Innovative Corporate Business Model for Strategic Partnerships.',
                ],
                'status'=>1,
            ]);
            Goals::create([
                'name'=>[
                    'ar'=>'تحقيق التميز المؤسسي ',
                    'en'=>'Driving Organizational Excellence.',
                ],
                'status'=>1,
            ]);
        }
    }
}
