<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arFaqTitle = ['كم مدة الاستشارة؟', 'كيف يتم التواصل أثناء الاستشارة؟', 'هل بالإمكان حجز موعد مراجعة مع الطبيب؟'];
        $enFaqTitle = ['How long does the consultation take?', 'How do you communicate during the consultation?', 'Is it possible to book an appointment with the doctor?'];

        $arFaqDescription = [
            'مدة الاستشارة ٢٠ دقيقة للطب النفسي وعلم النفس و ١٥ دقيقة لباقي التخصصات.',
            'من خلال مكالمة الفيديو او المكالمة الصوتية او الكتابة (حسب ما تقتضيه الحالة).',
            'نعم في حال كان موعد المراجعة خلال ١٤ يوم بعد الموعد الأساسي يحق للمريض حجز موعد مراجعة مجاني مع الطبيب.'
        ];
        $enFaqDescription = [
            'The consultation duration is 20 minutes for psychiatry and psychology and 15 minutes for other specialties.',
            'Through video call, voice call or writing (as appropriate).',
            'Yes, if the follow-up appointment is within 14 days of the original appointment, the patient is entitled to book a free follow-up appointment with the doctor.'
        ];

        /* ===================================================== */

        $arAboutTitle = 'عن المنصة';
        $enAboutTitle = 'About The Platform';

        $arAboutDescription = 'أبوقرات منصة طبية تُقدم استشارات طبية عن بُعد ورعاية صحية منزلية. من خلال أبوقرات، يُمكنك استشارة نخبة من الأطباء والاستشاريين عبر مكالمات الفيديو في أكثر من 25 قسمًا طبيًا، لضمان صحتك وصحة أحبائك.';
        $enAboutDescription = 'Apokrat is a medical platform that provides remote medical consultations and home healthcare. Through Apokrat you can consult with a select group of doctors and consultantsvia video call in more than 25 medical departments, ensuring your health and the health of your loved ones.';

        Faq::factory()
        ->has(FaqTranslation::factory()->state(['locale'=> 'en','title' => $enAboutTitle, 'description' => $enAboutDescription]),'faq_translation')
        ->has(FaqTranslation::factory()->state(['locale'=> 'ar','title' => $arAboutTitle, 'description' => $arAboutDescription]),'faq_translation')
        ->create(['category'=> 'about']);

        /* ===================================================== */

        $arConditionsTitle = ['الحسابات', 'الملكية الفكرية', 'إيقاف الخدمة'];
        $enConditionsTitle = ['Accounts', 'Intellectual Property', 'Stop Service'];

        $enConditionsDescription = [
            'When creating a new account, you must provide us with accurate, complete, and current information at all times. Failure to do so constitutes a clear breach of the Terms and may result in immediate suspension of your account on our Service. You are responsible for safeguarding and safeguarding the password you use to access the Service and for any activities or actions that occur under your password, whether your password is with our Service or a third-party service. You agree not to disclose your password to any third party. You must notify us as soon as you become aware of any breach of security or unauthorized use of your account.',
            'This Service and its original content, features, and functionality are and will remain the sole property of the Company. The Service is protected by copyright, trademark, and other laws applicable in both Saudi Arabia and foreign countries. Our trademarks and trade marks may not be used to promote another product or service without our prior written consent.',
            'We may terminate or suspend your account immediately, without prior notice or liability, for any reason, including but not limited to, breach of the Terms. Upon termination of the Service, your right to use the Service will cease immediately. If you wish to terminate your account, you may simply discontinue using the Service.'
        ];
        $arConditionsDescription = [
            'عند إنشاء حساب جديد، يجب عليك تزويدنا بمعلومات دقيقة ومكتملة وحديثة في جميع الأوقات. يشكل عدم القيام بذلك خرقاً واضحا للشروط وهذا قد يؤدي إلى التعليق الفوري لحسابك على خدمتنا. أنت مسؤول عن حماية و حفظ كلمة المرور التي تستخدمها للوصول إلى الخدمة بالتالي عن أي أنشطة أو إجراءات تتم بموجب استخدام كلمة المرور الخاصة بك سواء كانت كلمة المرور الخاصة بك مع خدمتنا أو خدمة مقدمة طرف ثالث. أنت توافق على عدم الكشف عن كلمة مرورك لأي طرف ثالث. يجب عليك إخطارنا بمجرد علمك بأي خرق للأمن أو الاستخدام غير المصرح به لحسابك.',
            'هذه الخدمة ومحتواها الأصلي ومميزاتها و وظائفها هي في الأساس وستظل ملكية حصرية. الخدمة محمية بموجب حقوق الطبع والنشر والعلامات التجارية والقوانين الأخرى السارية في كل من المملكة العربية السعودية والدول الأجنبية. لا يجوز استخدام علاماتنا التجارية السمات التجارية الخاصة بنا للترويج لمنتج أو خدمة اخرى دون موافقة كتابية مسبقة.',
            'يحق لنا إنهاء أو تعليق حسابك على الفور، دون إشعار مسبق أو مسؤولية، لأي سبب من الأسباب، بما في ذلك على سبيل المثال لا الحصر، القيام بخرق الشروط المنصوص عليها. عند إيقاف الخدمة، سيتوقف حقك في استخدام الخدمة على الفور. إذا كنت ترغب في إيقاف حسابك، يمكنك ببساطة التوقف عن استخدام الخدمة.'
        ];


        for($i=0 ; $i <= 2; $i++){
            Faq::factory()
            ->has(FaqTranslation::factory()->state(['locale'=> 'en','title' => $enFaqTitle[$i], 'description' => $enFaqDescription[$i]]),'faq_translation')
            ->has(FaqTranslation::factory()->state(['locale'=> 'ar','title' => $arFaqTitle[$i], 'description' => $arFaqDescription[$i]]),'faq_translation')
            ->create(['category'=> 'faq']);

            Faq::factory()
            ->has(FaqTranslation::factory()->state(['locale'=> 'en','title' => $enConditionsTitle[$i], 'description' => $enConditionsDescription[$i]]),'faq_translation')
            ->has(FaqTranslation::factory()->state(['locale'=> 'ar','title' => $arConditionsTitle[$i], 'description' => $arConditionsDescription[$i]]),'faq_translation')
            ->create(['category'=> 'conditions_policy']);
        }
    }
}
