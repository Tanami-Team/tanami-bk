<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Goals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Feature::count() == 0){
            Feature::create([
                'name'=>[
                    'ar'=>'اول مسرعة اعمال للمنظمات غير الربحية والتي تهدف الي تسريع اعمال الجمعيات الناشئة ',
                    'en'=>'The first business accelerator for non-profit organizations, aiming to fast-track the growth of emerging associations.'
                ],
                'status'=>true,
            ]);
            Feature::create([
                'name'=>[
                    'ar'=>'جمعية متخصصة تسعي الي تطوير القطاع غير الربحي وتمكينه عبر مبادرات مبتكرة وعمل مؤسسي جاذب وبناء شرامات مستدامةحمعية متخصصة تسعي الي تطوير القطاع غير الربحي وتمكينه عبر مبادرات مبتكرة وعمل مؤسسي جاذب وبناء شرامات مستدامة',
                    'en'=>'A specialized association that strives to develop and empower the non-profit sector through innovative initiatives, attractive institutional work, and the building of sustainable partnerships.'
                ],
                'status'=>true,
            ]);
            Feature::create([
                'name'=>[
                    'ar'=>'اول مسرعة اعمال للمنظمات غير الربحية والتي تهدف الي تسريع اعمال الجمعيات الناشئة ',
                    'en'=>'The first business accelerator dedicated to non-profit organizations, with the mission of fast-tracking the growth of emerging associations.'
                ],
                'status'=>true,
            ]);
            Feature::create([
                'name'=>[
                    'ar'=>'جمعية متخصصة تسعي الي تطوير القطاع غير الربحي وتمكينه عبر مبادرات مبتكرة وعمل مؤسسي جاذب وبناء شرامات مستدامةحمعية متخصصة تسعي الي تطوير القطاع غير الربحي وتمكينه عبر مبادرات مبتكرة وعمل مؤسسي جاذب وبناء شرامات مستدامة',
                    'en'=>'A specialized association that strives to develop and empower the non-profit sector through innovative initiatives, attractive institutional work, and the building of sustainable partnerships.'
                ],
                'status'=>true,
            ]);
        }
    }
}
