<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Последующие языковые строки содержат сообщения по-умолчанию, используемые
    | классом, проверяющим значения (валидатором). Некоторые из правил имеют
    | несколько версий, например, size. Вы можете поменять их на любые
    | другие, которые лучше подходят для вашего приложения.
    |
    */

    'accepted'        => 'Qiymatni qabul qilishigiz kerak :attribute.',
    'active_url'      => 'Maydon :attribute kiritilgan URL haqiqiy emas.',
    'after'           => 'Maydonda :attribute muddat keyin bo\'lishi kerak :date.',
    'after_or_equal'  => 'maydonda :attribute kun yoki undan keyin sanaga teng bo\'lishi kerak :date.',
    'alpha'           => 'Maydon :attribute faqat harflardan iborat bo\'lishi mumkin.',
    'alpha_dash'      => 'Maydon :attribute faqat harflar, raqamlar, chiziqlar va pastki chiziqlardan iborat bo\'lishi mumkin.',
    'alpha_num'       => 'Maydon :attributefaqat harf va raqamlardan iborat bo\'lishi mumkin.',
    'array'           => 'Maydon :attribute bir qator bo\'lishi kerak.',
    'before'          => 'Maydonda :attribute avvalgi sana bo\'lishi kerak :date.',
    'before_or_equal' => 'maydonda :attribute oldin yoki unga teng kun bo\'lishi kerak :date.',
    'between'         => [
        'numeric' => 'Maydon :attribute qiymati :min va :max orasida bo\'lishi kerak.',
        'file'    => 'Maydondagi fayl hajmi:attribute :min va :max orasida bo\'lishi kerak kilobayt.',
        'string'  => 'Maydondagi belgilar soni :attribute :min va :max orasida bo\'lishi kerak',
        'array'   => 'Maydondagi elementlar soni :attribute :min va :max orasida bo\'lishi kerak',
    ],
    'boolean'        => 'Maydon :attribute mantiqiy qiymatga ega bo\'lishi kerak.',
    'confirmed'      => 'Maydon :attributetas diqlashga mos kelmadi.',
    'date'           => 'Maydon :attribute sanaga mos emas.',
    'date_equals'    => 'Поле :attribute должно быть датой равной :date.',
    'date_format'    => 'Maydon :attribute formatga mos kelmadi :format.',
    'different'      => 'Maydon :attribute va :other farq qilishi kerak.',
    'digits'         => ':attribute uzunligi :digits ta raqamdan iborat bo\'lishi kerak.',
    'digits_between' => 'Raqamli maydon uzunligi :attribute :min va :max orasida bo\'lishi kerak',
    'dimensions'     => 'Maydon :attribute rasm hajmi mos emas',
    'distinct'       => 'Maydon :attribute takroriy qiymatni o\'z ichiga oladi.',
    'email'          => 'Maydon :attribute haqiqiy elektron pochta manzili bo\'lishi kerak.',
    'ends_with'      => 'Maydon :attribute quyidagi qiymatlardan biri bilan tugashi kerak: :values',
    'exists'         => 'Uchun tanlangan qiymat :attribute noto\'g\'ri.',
    'file'           => 'Maydon :attribute fayl bo\'lishi kerak.',
    'filled'         => 'Maydon :attribute to\'ldirish talab qilinadi.',
    'gt'             => [
        'numeric' => 'Maydon :attribute kattaroq bo\'lishi kerak :value.',
        'file'    => 'Maydondagi fayl hajmi:attribute kattaroq bo\'lishi kerak:value kilobayt (а).',
        'string'  => 'Maydondagi belgilar soni :attribute ko\'proq bo\'lishi kerak :value.',
        'array'   => 'Maydondagi elementlar soni :attribute ko\'proq bo\'lishi kerak :value.',
    ],
    'gte' => [
        'numeric' => 'Maydon :attribute katta yoki teng bo\'lishi kerak :value.',
        'file'    => 'Maydondagi fayl hajmi :attribute katta yoki teng bo\'lishi kerak :value Kilobayt (а).',
        'string'  => 'Maydondagi simvollar soni :attribute katta yoki teng bo\'lishi kerak :value.',
        'array'   => 'Maydondagi elelmentlar soni :attribute katta yoki teng bo\'lishi kerak :value.',
    ],
    'image'    => 'Maydon :attribute rasm bo\'lishi kerak.',
    'in'       => 'Uchun tanlangan qiymat :attribute noto\'g\'ri.',
    'in_array' => 'Maydon :attribute mavjud emas :other.',
    'integer'  => 'Maydon :attribute butun son bo\'lishi kerak.',
    'ip'       => 'Maydon :attribute haqiqiy IP-manzil bo\'lishi kerak.',
    'ipv4'     => 'Maydon :attribute haqiqiy IPv4 manzili bo\'lishi kerak.',
    'ipv6'     => 'Maydon :attribute haqiqiy IPv6 manzili bo\'lishi kerak.',
    'json'     => 'Maydon :attribute JSON qatori bo\'lishi kerak.',
    'lt'       => [
        'numeric' => 'Maydon :attribute kamroq bo\'lishi kerak :value.',
        'file'    => 'Maydondagi fayl hajmi :attribute kamroq bo\'lishi kerak :value Kilobayt (а).',
        'string'  => 'Maydondagi simvollar soni :attribute kamroq bo\'lishi kerak :value.',
        'array'   => 'Maydondagi elementlar soni :attribute kamroq bo\'lishi kerak :value.',
    ],
    'lte' => [
        'numeric' => 'Maydon :attribute kichik yoki teng bo‘lishi kerak :value.',
        'file'    => 'Maydondagi fayl hajmi :attribute kichik yoki teng bo‘lishi kerak :value Kilobayt (а).',
        'string'  => 'Maydondagi simvollar soni :attribute kichik yoki teng bo‘lishi kerak :value.',
        'array'   => 'Maydondagi elementlar soni :attribute kichik yoki teng bo‘lishi kerak :value.',
    ],
    'max' => [
        'numeric' => 'Maydon:attribute  dan ortiq bo\'lishi mumkin emas.:max',
        'file'    => 'Maydondagi fayl hajmi :attribute ortiq bo\'lishi mumkin emas :max Kilobayt(а).',
        'string'  => 'Maydondagi simvollar soni :attribute oshmasligi kerak :max.',
        'array'   => 'Maydondagi elementlar soni :attribute oshmasligi kerak :max.',
    ],
    'mimes'     => 'Maydon :attribute quyidagi turdagi fayldan biri bo\'lishi kerak: :values.',
    'mimetypes' => 'Maydon :attribute quyidagi turdagi fayldan biri bo\'lishi kerak: :values.',
    'min'       => [
        'numeric' => 'Maydon :attribute kichik bo\'lishi mumkin emas :min.',
        'file'    => 'Maydondagi fayl hajmi :attribute kichik bo\'lishi mumkin emas :min Kilobayt (а).',
        'string'  => 'Maydondagi simvollar soni :attribute kichik bo\'lishi mumkin emas :min.',
        'array'   => 'Maydondagi elementlar soni :attribute kichik bo\'lishi mumkin emas :min.',
    ],
    'not_in'               => 'Uchun tanlangan qiymat :attribute noto\'g\'ri.',
    'not_regex'            => 'Tanlangan format :attribute noto\'g\'ri.',
    'numeric'              => 'Maydon :attribute son bo\'lishi kerak.',
    'password'             => 'Parol noto\'g\'ri .',
    'present'              => 'Maydon :attribute hozir bo\'lishi kerak.',
    'regex'                => 'Maydon :attribute noto\'g\'ri formatd.',
    'required'             => 'Maydon :attribute to\'ldirish  zarur.',
    'required_if'          => 'Maydon :attribute to\'ldirish talab qilinadi, qachon :other teng :value.',
    'required_unless'      => 'Maydon :attribute to\'ldirish talab qilinadi, qachon :other teng emas :values.',
    'required_with'        => 'Maydon :attribute to\'ldirish talab qilinadi, qachon :values ko\'rsatilgan.',
    'required_with_all'    => 'Maydon :attribute to\'ldirish talab qilinadi, qachon :values ko\'rsatilgan.',
    'required_without'     => 'Maydon :attribute to\'ldirish talab qilinadi, qachon :values ko\'rsatilmagan.',
    'required_without_all' => 'Maydon :attribute to\'ldirish uchun talab qilinadi, qachon hech biri :values ko\'rsatilmagan.',
    'same'                 => 'Maydon qiymatlari :attribute и :other mos kelishi kerak.',
    'size'                 => [
        'numeric' => 'Maydon :attribute teng bo\'lishi kerak :size.',
        'file'    => 'Maydondagi fayl hajmi :attribute teng bo\'lishi kerak :size kilobayt(а).',
        'string'  => 'Maydondagi simvollar soni :attribute teng bo\'lishi kerak:size.',
        'array'   => 'Maydondagi elementlar soni:attribute teng bo\'lishi kerak :size.',
    ],
    'starts_with' => 'Maydon :attribute quyidagi qiymatlardan biri bilan boshlanishi kerak: :values',
    'string'      => 'Maydon :attribute qator bo\'lishi kerak.',
    'timezone'    => 'Maydon :attribute vaqt mintaqasi bo‘lishi kerak.',
    'unique'      => 'Bu maydon qiymati:attribute allaqachon mavjud.',
    'uploaded'    => 'Maydon yuklanmoqda:attribute bajarilmadi.',
    'url'         => 'Maydon :attribute noto\'g\'ri formatda.',
    'uuid'        => 'Maydon :attribute UUIDto\'g\'ri bo\'lishi kerak.',
    'custom_required_without' => 'Fayl yuklang yoki hujjat kutubxonadan tortib o\'tkazing.',
    /*
    |--------------------------------------------------------------------------
    | Qiymatlarni tekshirish uchun foydalanuvchi tillari manbalari
    |--------------------------------------------------------------------------
    |
    | Bu erda siz atributlar uchun o\'z xabarlaringizni ko\'rsatishingiz mumkin.
    | Belgilangan atribut qoidasi uchun sizning xabaringizni aniqlashni osonlashtiradi.
    |
    | http://laravel.com/docs/validation#custom-error-messages
    |Foydalanish namunasi
    |
    |   'custom' => [
    |       'email' => [
    |           'required' => 'Elektron pochta manzilingizni bilishimiz kerak!',
    |       ],
    |   ],
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Xususiy atribut nomlari
    |--------------------------------------------------------------------------
    |
    | Keyingi qatorlar foydalanuvchi interfeysi elementlarining dasturiy nomlarini o\'qilishi mumkin bo\'lganlarga almashtirish uchun ishlatiladi.
Masalan, "elektron pochta" maydonining o\'rniga xabarlarda "elektron pochta manzili" ko\'rsatiladi.
    |
    |
    |
    | Foydalanish namunasi
    |
    |   'attributes' => [
    |       'email' => 'elektron manzil',
    |   ],
    |
    */

    'attributes' => [
        'name'                  => 'Ism',
        'username'              => 'Foydlanuvchi',
        'email'                 => 'E-Mail manzil',
        'first_name'            => 'Ism',
        'last_name'             => 'familiya',
        'password'              => 'Parol',
        'current_password'      => 'Mazkur parol',
        'password_confirmation' => 'Parolni tasdiqlash',
        'city'                  => 'Shahar',
        'country'               => 'Davlat',
        'address'               => 'Manzil',
        'phone'                 => 'Telefon',
        'mobile'                => 'Mob.raqam',
        'age'                   => 'Yosh',
        'sex'                   => 'Jins',
        'gender'                => 'Jins',
        'day'                   => 'Kun',
        'month'                 => 'Oy',
        'year'                  => 'Yil',
        'hour'                  => 'Soat',
        'minute'                => 'Daqiqa',
        'second'                => 'Soniya',
        'title'                 => 'Nomi',
        'content'               => 'Kontent',
        'description'           => 'Ta\'rif',
        'excerpt'               => 'Xulosa',
        'date'                  => 'Sana',
        'time'                  => 'Vaqt',
        'available'             => 'Mavjud',
        'size'                  => 'hajm',
    ],
];
