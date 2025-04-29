<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Blog::count() == 0) {
            Blog::create([
                'name' => [
                    'en' => 'Tanami Association organized the Future Foresight Forum in the Non-Profit Sector.',
                    'ar' => 'عقدت جمعية تنامي ملتقى استشراف المستقبل في القطاع غير الربحي'
                ],
                'description' => [
                    'en' => 'Mawten Real Estate Company is nearing the completion of the development of the latest ready-built factories project in its series of industrial real estate projects, located within Al Bawaba Industrial City in Riyadh.
                    The project involves the development of 56 ready-built factories on a land area of 53,000 square meters, targeting the support of small and medium-sized enterprises (SMEs), with built-up areas ranging between 400 to 500 square meters. These factories are allocated for light industries and entrepreneurial projects supported by the Ministry of Industry and the Industrial Development Fund, following the highest standards in compliance with the specifications of the Saudi Authority for Industrial Cities and Technology Zones (MODON).
                    Construction is progressing steadily and work is accelerating according to the projects schedule. As of now, 85% of the project has been completed, with the first phase—comprising 24 factories—already completed and leased, thanks to God. The second phase, which includes 32 factories, is expected to be completed by mid-August 2024, God willing.
                    Each factory includes a production hall, mezzanine offices, parking spaces, storage areas, and all necessary utilities such as electricity, water, safety systems, and fire protection systems.
                    The project is located within Al Bawaba Industrial City, which is characterized by comprehensive infrastructure, services, and integrated facilities. This provides a high-value offering for industrial investors, enabling them to accelerate their investments by saving time and reducing the costs associated with starting business operations, without the need for the lengthy and costly process of constructing and developing new factories.
                    Mawten Real Estate Company is a leader in the development of industrial and logistics real estate projects that support the industrial and logistics sectors. The company has a proven track record, including the successful development of Al Bawaba Industrial City in Riyadh—the largest privately developed industrial city in the Middle East—covering an area of 6.5 million square meters with investments exceeding SAR 1.3 billion.
                    In addition, Mawten has successfully developed and leased 72 ready-built factories in Al Bawaba Industrial City, adhering to the highest standards set by MODON, within a very short timeframe. The company has also developed workforce housing projects in Riyadh and logistics services projects in Jeddah.',
                    'ar' => 'شارفت شركة "موطن العقارية" على استكمال تطوير مشروع المصانع الجاهزة الأحدث في سلسلة مشاريعها العقارية الصناعية الواقع ضمن مدينة البوابة الصناعية بالعاصمة الرياض، والذي يتضمن تطوير 56 مصنعاً جاهزاً على أرض مساحتها 53 ألف متر مربع تستهدف دعم المنشآت الصغيرة والمتوسطة بمساحات بناء تتراوح بين 400 إلى 500 متر مربع تم تخصيصها للصناعات الخفيفة ومشاريع رواد الأعمال المدعومة من وزارة الصناعة وصندوق التنمية الصناعية، وفق أعلى المعايير المطابقة لمواصفات الهيئة السعودية للمدن الصناعية ومناطق التقنية "مدن". وتشهد الإنشاءات تقدماً ملحوظاً وتتسارع الأعمال وفق الجدول الزمني المحدد للمشروع، حيث اكتملت الأعمال بنسبة 85%، وتم بحمد الله انجاز وتأجير المرحلة الأولى والتي تتضمن 24 مصنعاً، ويتوقع انجاز المرحلة الثانية التي تضم 32 مصنعاً واكتمال المشروع في منتصف شهر أغسطس 2024م بمشيئة الله تعالى. ويحتوي كل مصنع على صالة للإنتاج مع ميزانين للمكاتب ومواقف للسيارات وأماكن للتخزين مع جميع الخدمات اللازمة من كهرباء ومياه، وأنظمة السلامة، والحريق، وغيرها، ويقع ضمن مخطط مدينة البوابة الصناعية التي تتميز ببنية تحتية شاملة وخدمات ومرافق متكاملة، وهو ما يمثل إضافة نوعية للمستثمرين الصناعيين تساعدهم في دعم وتسريع استثماراتهم من خلال اختصار الوقت والتكاليف اللازمة لبدء نشاطهم التجاري ضمن بيئة صناعية متكاملة، وعدم الحاجة للدخول في عملية بناء وتطوير مصانع تستغرق وقتاً طويلاً وتتطلب جهداً كبيراً وأموالاً طائلة. وتعتبر شركة "موطن العقارية" رائدة في تطوير مشاريع العقارات الصناعية واللوجستية التي تسهم في دعم القطاع الصناعي واللوجستي، حيث خاضت تجارب ناجحة تمثلت في تطوير مشروع مدينة البوبة الصناعية بمدينة الرياض والتي تصنف أكبر مدينة صناعية في المنطقة يُطورها القطاع الخاص في الشرق الأوسط على مساحة 6,5 مليون متر مربع وباستثمارات بلغت 1,3 مليار ريال، بالإضافة إلى نجاحها في إنشاء 72 مصنعاً جاهزاً في مدينة البوابة الصناعية بالرياض وفق أعلى المواصفات المطابقة لهيئة "مدن" وتأجيرها بالكامل في غضون فترة قصيرة جداً، إضافة إلى مشاريع إسكان القوى العاملة في الرياض ومشاريع للخدمات اللوجستية في مدينة جدة.'
                ],
                'slug' => [
                    'en' => 'Tanami Association',
                    'ar' => 'Tanami Association'
                ],
                'image' => '1.png',
                'background' => '2.png',
                'status' => true,
            ]);
        }
    }
}
