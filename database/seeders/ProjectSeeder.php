<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Project::all()->count() == 0){
            Project::create([
                'name'=>[
                    'ar'=>'جدير',
                    'en'=>'Gadeer'
                ],
                'slug'=>[
                    'ar'=>'جدير',
                    'en'=>'Gadeer'
                ],
                'short_description'=>[
                    'ar'=>'مأسسة وحدات الحوكمة وتأطير منظومتها في المنظمات غير الربحية وبناء قدرتها المؤسسية وحوكمة أعمالها ونقل المعرفة لأخصائي الحوكمة والمعني بامتثــال المنظمة لمعايير الحوكمة المعتمدة والمعمول بها في المملكة والالتزام بمتطلباتها.',
                    'en'=>'Jadid is a platform and mobile application that provides free consulting services to individuals and NGOs by providing consultations from experts specializing in various fields from all regions of the Kingdom.',
                ],
                'long_description'=>[
                    'ar'=>'مأسسة وحدات الحوكمة وتأطير منظومتها في المنظمات غير الربحية وبناء قدرتها المؤسسية وحوكمة أعمالها ونقل المعرفة لأخصائي الحوكمة والمعني بامتثــال المنظمة لمعايير الحوكمة المعتمدة والمعمول بها في المملكة والالتزام بمتطلباتها.',
                    'en'=>'Jadid is a platform and mobile application that provides free consulting services to individuals and NGOs by providing consultations from experts specializing in various fields from all regions of the Kingdom.',
                ],
                'price'=>10000,
                'available'=>true,
                'category_id'=>1,
                'image'=>'1.png',
                'background'=>'2.png',
            ]);
            Project::create([
                'name'=>[
                    'ar'=>'جدير',
                    'en'=>'Gadeer'
                ],
                'slug'=>[
                    'ar'=>'جدير',
                    'en'=>'Gadeer'
                ],
                'short_description'=>[
                    'ar'=>'مأسسة وحدات الحوكمة وتأطير منظومتها في المنظمات غير الربحية وبناء قدرتها المؤسسية وحوكمة أعمالها ونقل المعرفة لأخصائي الحوكمة والمعني بامتثــال المنظمة لمعايير الحوكمة المعتمدة والمعمول بها في المملكة والالتزام بمتطلباتها.',
                    'en'=>'Jadid is a platform and mobile application that provides free consulting services to individuals and NGOs by providing consultations from experts specializing in various fields from all regions of the Kingdom.',
                ],
                'long_description'=>[
                    'ar'=>'مأسسة وحدات الحوكمة وتأطير منظومتها في المنظمات غير الربحية وبناء قدرتها المؤسسية وحوكمة أعمالها ونقل المعرفة لأخصائي الحوكمة والمعني بامتثــال المنظمة لمعايير الحوكمة المعتمدة والمعمول بها في المملكة والالتزام بمتطلباتها.',
                    'en'=>'Jadid is a platform and mobile application that provides free consulting services to individuals and NGOs by providing consultations from experts specializing in various fields from all regions of the Kingdom.',
                ],
                'price'=>10000,
                'available'=>true,
                'category_id'=>1,
                'image'=>'1.png',
                'background'=>'2.png',
            ]);
            Project::create([
                'name'=>[
                    'ar'=>'جدير',
                    'en'=>'Gadeer'
                ],
                'slug'=>[
                    'ar'=>'جدير',
                    'en'=>'Gadeer'
                ],
                'short_description'=>[
                    'ar'=>'مأسسة وحدات الحوكمة وتأطير منظومتها في المنظمات غير الربحية وبناء قدرتها المؤسسية وحوكمة أعمالها ونقل المعرفة لأخصائي الحوكمة والمعني بامتثــال المنظمة لمعايير الحوكمة المعتمدة والمعمول بها في المملكة والالتزام بمتطلباتها.',
                    'en'=>'Jadid is a platform and mobile application that provides free consulting services to individuals and NGOs by providing consultations from experts specializing in various fields from all regions of the Kingdom.',
                ],
                'long_description'=>[
                    'ar'=>'مأسسة وحدات الحوكمة وتأطير منظومتها في المنظمات غير الربحية وبناء قدرتها المؤسسية وحوكمة أعمالها ونقل المعرفة لأخصائي الحوكمة والمعني بامتثــال المنظمة لمعايير الحوكمة المعتمدة والمعمول بها في المملكة والالتزام بمتطلباتها.',
                    'en'=>'Jadid is a platform and mobile application that provides free consulting services to individuals and NGOs by providing consultations from experts specializing in various fields from all regions of the Kingdom.',
                ],
                'price'=>10000,
                'available'=>true,
                'category_id'=>2,
                'image'=>'1.png',
                'background'=>'2.png',
            ]);
            Project::create([
                'name'=>[
                    'ar'=>'جدير',
                    'en'=>'Gadeer'
                ],
                'slug'=>[
                    'ar'=>'جدير',
                    'en'=>'Gadeer'
                ],
                'short_description'=>[
                    'ar'=>'مأسسة وحدات الحوكمة وتأطير منظومتها في المنظمات غير الربحية وبناء قدرتها المؤسسية وحوكمة أعمالها ونقل المعرفة لأخصائي الحوكمة والمعني بامتثــال المنظمة لمعايير الحوكمة المعتمدة والمعمول بها في المملكة والالتزام بمتطلباتها.',
                    'en'=>'Jadid is a platform and mobile application that provides free consulting services to individuals and NGOs by providing consultations from experts specializing in various fields from all regions of the Kingdom.',
                ],
                'long_description'=>[
                    'ar'=>'مأسسة وحدات الحوكمة وتأطير منظومتها في المنظمات غير الربحية وبناء قدرتها المؤسسية وحوكمة أعمالها ونقل المعرفة لأخصائي الحوكمة والمعني بامتثــال المنظمة لمعايير الحوكمة المعتمدة والمعمول بها في المملكة والالتزام بمتطلباتها.',
                    'en'=>'Jadid is a platform and mobile application that provides free consulting services to individuals and NGOs by providing consultations from experts specializing in various fields from all regions of the Kingdom.',
                ],
                'price'=>10000,
                'available'=>true,
                'category_id'=>2,
                'image'=>'1.png',
                'background'=>'2.png',
            ]);
        }
    }
}
