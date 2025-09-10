<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // About Us Section (ID: 1)
        \App\Models\AboutUs::create([
            'title' => json_encode([
                'ar' => 'من نحن',
                'en' => 'About Us'
            ]),
            'content' => json_encode([
                'ar' => 'منذ تأسيسنا عام 2013، ونحن نسابق الزمن — نتقدم بثقة وتطوير مستمر لنلامس السماء، ونقدم أفضل الخدمات المتكاملة التي تلبي احتياجاتكم ومتطلبات مناسباتكم، تماشيًا مع رؤية المملكة 2030 التي تسعى لاستثمار الطاقات لتحقيق الطموحات.

نضع خبراتنا المتراكمة على مدى السنوات في خدمتكم، ونقدم خدماتنا المتميزة بأسلوب متكامل ومنظم، يجمع بين الإبداع والاحترافية، حتى أصبحنا شركة رائدة في مجال تنظيم المعارض والمؤتمرات والحفلات وجميع الفعاليات.

بعد الجهد والتعب، كان الثمر إنجازًا.',
                'en' => 'Since our establishment in 2013, we have been racing against time — moving forward with confidence and continuous development to reach new heights. Our mission is to deliver the best integrated services tailored to meet your needs and the requirements of your events, aligned with Saudi Arabia\'s Vision 2030, which aims to harness strengths to realize ambitious goals.

We leverage our years of experience to serve our clients with excellence. Through creativity, professionalism, and an integrated approach, we have become a leading company in organizing exhibitions, conferences, celebrations, and all types of events.

After hardship and toil, achievement was our reward.'
            ]),
            'image' => 'about-us-image.jpg'
        ]);

        // Vision Section (ID: 2)
        \App\Models\AboutUs::create([
            'title' => json_encode([
                'ar' => 'رؤيتنا',
                'en' => 'Our Vision'
            ]),
            'content' => json_encode([
                'ar' => 'نسعى لأن نكون الأكثر تميزًا وإبداعًا وريادةً في قيادة وتنظيم المعارض والمؤتمرات على المستويين المحلي والإقليمي، من خلال خدمات مبتكرة ومتجددة، تُقدَّم بأعلى مستويات الاحترافية والمهارة.

مهما كان حجم عملك، نحمله على أكتافنا بحب واهتمام.',
                'en' => 'To be the most distinguished, creative, and pioneering force in organizing exhibitions and conferences — locally and regionally — through innovative, ever-evolving services delivered with the highest levels of professionalism and expertise.

No matter the size of your business, we carry it forward with passion and care.'
            ]),
            'image' => 'vision-image.jpg'
        ]);

        // Mission Section (ID: 3)
        \App\Models\AboutUs::create([
            'title' => json_encode([
                'ar' => 'رسالتنا',
                'en' => 'Our Mission'
            ]),
            'content' => json_encode([
                'ar' => 'بناء وتطوير مجموعة واسعة من الخدمات التنظيمية المتجددة، وتقديم حلول مبتكرة ومتكاملة، إلى جانب تعزيز ثقافة الابتكار، وإظهار تقدم مستمر في كل ما نقوم به، مع الالتزام بأعلى معايير الجودة.',
                'en' => 'To establish and continuously develop a comprehensive range of innovative, integrated services — promoting a culture of innovation and demonstrating consistent progress in everything we do, while adhering to the highest quality standards.'
            ]),
            'image' => 'mission-image.jpg'
        ]);

        // Core Values Section (ID: 4)
        \App\Models\AboutUs::create([
            'title' => json_encode([
                'ar' => 'قيمنا الجوهرية',
                'en' => 'Our Core Values'
            ]),
            'content' => json_encode([
                'ar' => 'تعزيز مهاراتنا وتوسيع نطاق خدماتنا.
مواكبة التطورات العالمية في عالم الفعاليات.
التكيّف مع الاحتياجات المتغيرة لعملائنا.
أن نكون خياركم الأول والموثوق لكل ما يتعلق بتنظيم الفعاليات.',
                'en' => 'Enhancing our skills and expanding our service offerings.
Staying ahead of global trends in the events industry.
Adapting to the evolving needs of our clients.
Becoming your trusted first choice for all event-related solutions.'
            ]),
            'image' => 'values-image.jpg'
        ]);
    }
}
