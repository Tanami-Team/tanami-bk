<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Slider::all()->count() == 0){
            Slider::create([
                'title' => [
                    'en' => 'General Assembly Members',
                    'ar' => 'اعضاء الجمعية العمومية '
                ],
                'description' => [
                    'en' => 'The Charitable Association for the Development of Developmental Work (Tanami) is a non-profit organization licensed by the Ministry of Human Resources and Social Development.
                            Tanami is considered one of the first and most prominent associations specialized in developing and empowering the non-profit sector.
                            Its roots are deeply embedded within the sector, and it has established a strong presence in advancing developmental work within a short period, relying on a wealth of experience and long years of expertise accumulated by the Tanami team.',
                    'ar' => 'حمعية متخصصة تسعي الي تطوير القطاع غير الربحي وتمكينه عبر مبادرات مبتكرة وعمل مؤسسي جاذب وبناء شرامات مستدامة'
                ],
                'image' => '1.png',
                'link' => 'https://tanami.org.sa/',
                'status'=>true,
            ]);
            Slider::create([
                'title' => [
                    'en' => 'General Assembly Members',
                    'ar' => 'اعضاء الجمعية العمومية '
                ],
                'description' => [
                    'en' => 'The Charitable Association for the Development of Developmental Work (Tanami) is a non-profit organization licensed by the Ministry of Human Resources and Social Development.
                            Tanami is considered one of the first and most prominent associations specialized in developing and empowering the non-profit sector.
                            Its roots are deeply embedded within the sector, and it has established a strong presence in advancing developmental work within a short period, relying on a wealth of experience and long years of expertise accumulated by the Tanami team.',
                    'ar' => 'حمعية متخصصة تسعي الي تطوير القطاع غير الربحي وتمكينه عبر مبادرات مبتكرة وعمل مؤسسي جاذب وبناء شرامات مستدامة'
                ],
                'image' => '1.png',
                'link' => 'https://tanami.org.sa/',
                'status'=>true,
            ]);
            Slider::create([
                'title' => [
                    'en' => 'General Assembly Members',
                    'ar' => 'اعضاء الجمعية العمومية '
                ],
                'description' => [
                    'en' => 'The Charitable Association for the Development of Developmental Work (Tanami) is a non-profit organization licensed by the Ministry of Human Resources and Social Development.
                            Tanami is considered one of the first and most prominent associations specialized in developing and empowering the non-profit sector.
                            Its roots are deeply embedded within the sector, and it has established a strong presence in advancing developmental work within a short period, relying on a wealth of experience and long years of expertise accumulated by the Tanami team.',
                    'ar' => 'حمعية متخصصة تسعي الي تطوير القطاع غير الربحي وتمكينه عبر مبادرات مبتكرة وعمل مؤسسي جاذب وبناء شرامات مستدامة'
                ],
                'image' => '1.png',
                'link' => 'https://tanami.org.sa/',
                'status'=>true,
            ]);
            Slider::create([
                'title' => [
                    'en' => 'General Assembly Members',
                    'ar' => 'اعضاء الجمعية العمومية '
                ],
                'description' => [
                    'en' => 'The Charitable Association for the Development of Developmental Work (Tanami) is a non-profit organization licensed by the Ministry of Human Resources and Social Development.
                            Tanami is considered one of the first and most prominent associations specialized in developing and empowering the non-profit sector.
                            Its roots are deeply embedded within the sector, and it has established a strong presence in advancing developmental work within a short period, relying on a wealth of experience and long years of expertise accumulated by the Tanami team.',
                    'ar' => 'حمعية متخصصة تسعي الي تطوير القطاع غير الربحي وتمكينه عبر مبادرات مبتكرة وعمل مؤسسي جاذب وبناء شرامات مستدامة'
                ],
                'image' => '1.png',
                'link' => 'https://tanami.org.sa/',
                'status'=>true,
            ]);
        }
    }
}
