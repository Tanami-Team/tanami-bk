<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectActivite;
use App\Models\ProjectFile;
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
                'general_objective'=>[
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
        if(ProjectActivite::all()->count()==0){
            foreach(Project::all() as $project){
                ProjectActivite::create([
                    'name'=>[
                        'ar'=>'اختيار وانتقاء الجمعيات',
                        'en'=>'Selection and selection of associations',
                    ],
                    'icon'=>'1.png',
                    'status'=>1,
                    'project_id'=>$project->id
                ]);
                ProjectActivite::create([
                    'name'=>[
                        'ar'=>'التهيئة والتعريف للعاملين في الجمعيات',
                        'en'=>'Preparation and introduction for workers in associations',
                    ],
                    'icon'=>'2.png',
                    'status'=>1,
                    'project_id'=>$project->id
                ]);
                ProjectActivite::create([
                    'name'=>[
                        'ar'=>'بناء السياسات واللوائح والأدلة',
                        'en'=>'Building policies, regulations, and evidence',
                    ],
                    'icon'=>'3.png',
                    'status'=>1,
                    'project_id'=>$project->id
                ]);
                ProjectActivite::create([
                    'name'=>[
                        'ar'=>'التأسيس التنظيمي للوحدة',
                        'en'=>'Organizational establishment of the unit',
                    ],
                    'icon'=>'4.png',
                    'status'=>1,
                    'project_id'=>$project->id
                ]);
            }

        }
        if(ProjectFile::all()->count()==0){
            foreach(Project::all() as $project){
                ProjectFile::create([
                    'name'=>[
                        'ar'=>'القوائم المالية 2022م',
                        'en'=>'Financial statements',
                    ],
                    'file'=>'1.png',
                    'status'=>1,
                    'project_id'=>$project->id
                ]);
                ProjectFile::create([
                    'name'=>[
                        'ar'=>'القوائم المالية 2022م',
                        'en'=>'Financial statements',
                    ],
                    'file'=>'1.png',
                    'status'=>1,
                    'project_id'=>$project->id
                ]);
                ProjectFile::create([
                    'name'=>[
                        'ar'=>'القوائم المالية 2022م',
                        'en'=>'Financial statements',
                    ],
                    'file'=>'1.png',
                    'status'=>1,
                    'project_id'=>$project->id
                ]);
                ProjectFile::create([
                    'name'=>[
                        'ar'=>'القوائم المالية 2022م',
                        'en'=>'Financial statements',
                    ],
                    'file'=>'1.png',
                    'status'=>1,
                    'project_id'=>$project->id
                ]);

            }

        }
    }
}
