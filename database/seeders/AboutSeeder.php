<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(About::count() == 0){
            About::create([
                'name' => [
                    'en' => 'About Tanami',
                    'ar' => 'عن الجمعية'
                ],
                'description' => [
                    'en' => 'The Charitable Association for the Development of Developmental Work (Tanami) is a non-profit organization licensed by the Ministry of Human Resources and Social Development.
                            Tanami is considered one of the first and most prominent associations specialized in developing and empowering the non-profit sector.
                            Its roots are deeply embedded within the sector, and it has established a strong presence in advancing developmental work within a short period, relying on a wealth of experience and long years of expertise accumulated by the Tanami team.',
                    'ar' => 'الجمعية الخيرية لتطوير العمل التنموي تنامي جمعية أهلية مرخصة من وزارة الموارد البشرية والتنمية الاجتماعية وتعد جمعية تنامي من أوائل وأبرز الجمعيات المتخصصة في مجال تطوير وتمكين القطاع غير الربحي. وتأصلت جذورها في القطاع وأثبتت حضورها في تطوير العمل التتموي خلال فترة زمنية وجيزة مستندة على مخزون خبرات وتجارب سنوات طويلة اكتسبها فريق عمل تنامي'
                ],
                'slug' => [
                    'en' => 'About',
                    'ar' => 'About'
                ],
                'image' => '1.png',
                'background' => '2.png',
                'status'=>true,
                'show_home'=>true,
            ]);
        }
    }
}
