<?php
namespace Database\Seeders;
use App\Models\ApplicationStatus;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicationStatus::create([
            'name_ru' => 'Заявка подана',
            'name_uz' => 'Murojaat yaratildi',
            'code' => 'request_added',
            'class_name' => 'primary',
            'level' => 10
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Валидация заявки',
            'name_uz' => 'Murojaatni tekshirish',
            'code' => 'application_validation',
            'class_name' => 'secondary',
            'level' => 11
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Исправление заявки',
            'name_uz' => 'Murojaatni tuzatish',
            'code' => 'refill',
            'class_name' => 'warning',
            'level' => 12
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Заявка исправлена',
            'name_uz' => 'Murojaat tuzatildi',
            'code' => 'refill_complete',
            'class_name' => 'success',
            'level' => 13
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Утверждение Распоряжения',
            'name_uz' => 'Farmoyishni tasdiqlash',
            'code' => 'order_attached',
            'class_name' => 'success',
            'level' => 14
        ]);


        ApplicationStatus::create([
            'name_ru' => 'Заполнение объектов',
            'name_uz' => 'Obyektlarni to\'ldirish',
            'code' => 'object_filling',
            'class_name' => 'primary',
            'use_in_alter' => true,
            'level' => 20
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Заполнение объектов завершена',
            'name_uz' => 'Obyektlarni to\'ldirish yakunlandi',
            'code' => 'object_filling_complete',
            'class_name' => 'success',
            'level' => 21
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Валидация объектов',
            'name_uz' => 'Obyektlarni tekshirish',
            'code' => 'validation_objects',
            'class_name' => 'secondary',
            'level' => 22
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Исправление объектов',
            'name_uz' => 'Obyektlarni tuzatish',
            'code' => 'refill_objects',
            'class_name' => 'warning',
            'level' => 23
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Валидация оборудований',
            'name_uz' => 'Qurilmalarni tekshirish',
            'code' => 'validation_endpoints',
            'class_name' => 'secondary',
            'level' => 24
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Исправление оборудований',
            'name_uz' => 'Qurilmalarni tuzatish',
            'code' => 'refill_endpoints',
            'class_name' => 'warning',
            'level' => 25
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Валидация на местах объектов',
            'name_uz' => 'Joyiga chiqib tekshirish',
            'code' => 'on_site_validation',
            'class_name' => 'primary',
            'level' => 26
        ]);

        ApplicationStatus::create([
            'name_ru' => 'Прикрепление акта',
            'name_uz' => 'Dalolatnoma biriktirish',
            'code' => 'attach_act',
            'class_name' => 'primary',
            'level' => 30
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Закрытие распоряжения',
            'name_uz' => 'Farmoyishni yopish',
            'code' => 'order_close',
            'class_name' => 'success',
            'level' => 31
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Заявка закрыта',
            'name_uz' => 'Farmoyish yopildi',
            'code' => 'application_closed',
            'class_name' => 'success',
            'level' => 32
        ]);
        ApplicationStatus::create([
            'name_ru' => 'Заявка отменена',
            'name_uz' => 'Farmoyish bekor qilindi',
            'code' => 'application_failed',
            'class_name' => 'danger',
            'level' => 33
        ]);
    }
}
