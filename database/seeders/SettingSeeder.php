<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Setting::count() == 0){
            Setting::create([
                'title'=>[
                    'ar'=>'جمعية تنامي ',
                    'en'=>'جمعية تنامي ',
                ],
                'description'=>[
                    'ar'=>'جمعية تنامي ',
                    'en'=>'جمعية تنامي ',
                ],
                'contact_description'=>[
                  'ar'=>'تمكين المنظمات غير الربحية من تنفيذ وظائف وأدوار عمل وحدات العمل المتخصص ونقل المعرفة للموظف القائم بأعمال الوحدة داخل المنظمة',
                  'en'=>'Enabling non-profit organizations to implement the functions and roles of specialized work units, and transferring knowledge to the employee responsible for the units operations within the organization. ',
                ],
                'address'=>[
                    'ar'=>'( السعودية -الرياض - الامام مسلم - حى الزاهر)',
                    'en'=>'Saudi Arabia – Riyadh – Imam Muslim Street – Al Zaher District',
                ],
                'address_link'=>'https://maps.app.goo.gl/tXTjDaxxTiRzRREY6?g_st=com.google.maps.preview.copy',
                'phone'=>'(00966) 551 234 567',
                'whatsapp'=>'(00966) 56 922 5833',
                'email'=>'Partnerships@tanami.org.sa',
                'telegram'=>'https://t.me/TanamiOrg',
                'youtube'=>'https://www.youtube.com/@Sna_media1',
                'instagram'=>'https://www.instagram.com/tanamiorg',
                'twitter'=>'https://x.com/TanamiOrg',
                'short_description'=>[
                    'ar'=>'تمكين المنظمات غير الربحية من تنفيذ وظائف وأدوار عمل وحدات العمل المتخصص ونقل المعرفة للموظف القائم بأعمال الوحدة داخل المنظمة',
                    'en'=>'Enabling non-profit organizations to implement the functions and roles of specialized work units, and transferring knowledge to the employee responsible for the units operations within the organization. ',
                ],
                'logo'=>'logo.png'
            ]);
        }
    }
}
