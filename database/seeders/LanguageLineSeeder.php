<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::truncate();

        LanguageLine::updateOrCreate
        ([
            'group' => 'main',
            'key' => 'Title',
            'text' => [
                'ru' => 'Главная страница',
                'uk' => 'Головна сторiнка',
                'en' => 'Main page',
            ],
        ]);

        LanguageLine::updateOrCreate
        ([
            'group' => 'main',
            'key' => 'Help',
            'text' => [
                'ru' => 'Помочь нам',
                'uk' => 'Допомогти нам',
                'en' => 'Help to us',
            ],
        ]);

        LanguageLine::updateOrCreate
        ([
            'group' => 'main',
            'key' => 'Next section',
            'text' => [
                'ru' => 'Следующий раздел',
                'uk' => 'Наступний роздiл',
                'en' => 'Next section',
            ],
        ]);

        LanguageLine::updateOrCreate
        ([
            'group' => 'payment',
            'key' => 'Payment repeat',
            'text' => [
                'ru' => 'Повторить платеж',
                'uk' => 'Повторити платiж',
                'en' => 'Repeat payment',
            ],
        ]);

        LanguageLine::updateOrCreate
        ([
            'group' => 'payment',
            'key' => 'Top up balance',
            'text' => [
                'ru' => 'Пополнить баланс',
                'uk' => 'Поповнити баланс',
                'en' => 'Top up balance',
            ],
        ]);

        LanguageLine::updateOrCreate
        ([
            'group' => 'payment',
            'key' => 'Buy a pet',
            'text' => [
                'ru' => 'Приобрести питомца',
                'uk' => 'Придбати собацюру',
                'en' => 'Buy a pet',
            ],
        ]);

        LanguageLine::updateOrCreate
        ([
            'group' => 'images',
            'key' => 'Gallery',
            'text' => [
                'ru' => 'Перейти в галерею',
                'uk' => 'Перейти до галереї',
                'en' => 'Buy a pet',
            ],
        ]);

        LanguageLine::updateOrCreate
        ([
            'group' => 'images',
            'key' => 'New images',
            'text' => [
                'ru' => 'Новые картинки',
                'uk' => 'Новi свiтлини',
                'en' => 'New images',
            ],
        ]);
    }
    }



