<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Category::all()->count() == 0){
            Category::create([
                'name' => [
                    'en' => 'Tanami tech',
                    'ar' => 'تنامي تك '
                ],
                'description' => [
                    'en' => 'Misk Skills contributes to empowering youth by helping them discover their interests, develop their skills, refine their abilities, and plan their career paths.',
                    'ar' => 'تساهم مسك المهارات في تمكين الشباب من اكتشاف اهتماماتهم, تطوير مهاراتهم, صقل قدراتهم, وتخطيط مستقبلهم الوظيفي'
                ],
                'slug' => [
                    'en' => 'Tanami-tech',
                    'ar' => 'Tanami-tech'
                ],
                'background' => '2.png',
            ]);
            Category::create([
                'name' => [
                    'en' => 'Tanami Initiatives',
                    'ar' => 'مبادرات تنامي'
                ],
                'description' => [
                    'en' => 'Misk Skills contributes to empowering youth by helping them discover their interests, develop their skills, refine their abilities, and plan their career paths.',
                    'ar' => 'تساهم مسك المهارات في تمكين الشباب من اكتشاف اهتماماتهم, تطوير مهاراتهم, صقل قدراتهم, وتخطيط مستقبلهم الوظيفي'
                ],
                'slug' => [
                    'en' => 'Tanami-Initiatives',
                    'ar' => 'Tanami-Initiatives'
                ],
                'background' => '2.png',
            ]);
        }
    }
}
