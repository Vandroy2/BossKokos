<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title_ua' => 'Тестова новина',
            'title_ru' => 'Тестовая новость',
            'title_en' => 'Test news',
            //----------------------------------------------------------------------------------------------------------
            'content_ua' => 'Британія подвоїть бойову групу НАТО в Естонії, збільшивши кількість своїх військових на 850 осіб.
            Джерело: британський посол в Естонії Росс Аллен в ефірі естонського телебачення, цитує Інтерфакс-Україна
            Пряма мова: "Вони зараз готуються до відправки. Це близько 850 солдатів, стільки ж,
            як уже в розміщеній в Естонії бойовій групі.
            Ми плануємо, що перші солдати прибудуть цього місяця – у лютому".
            Деталі: Згідно з планом, вони візьмуть участь у найбільших в Естонії навчаннях Siil 2022 ("Їжак 2022").',
            //----------------------------------------------------------------------------------------------------------
            'content_ru'=> 'Американское информационное агентство Bloomberg ошибочно опубликовало новость о том,
            что Россия начала полномасштабное военное вторжение в Украину.
            Об этом сообщает New York Post.
            Информацию про ошибку Bloomberg сообщила аналитик и специалист по российской политике Ольга Лаутман.
            По ее словам, новость была доступна полчаса. При попытке прочитать подробности сайт выдавал ошибку.',
            //----------------------------------------------------------------------------------------------------------
            'content_en' => '(CNN)It would be hard to hold a conversation over the deafening sound of the snow machines
            preparing the Olympic venues northwest of Beijing. They are loud and they are everywhere,
            blowing snow across what will be this months most-watched slopes.
            It is almost beautiful -- except that the venues are surrounded by an endless brown,
            dry landscape completely devoid of snow.',

        ]);

        DB::table('news')->insert([
            'title_ua' => 'Тест_ua',
            'title_ru' => 'Тест',
            'title_en' => 'Test',
            //----------------------------------------------------------------------------------------------------------
            'content_ua' => 'Тест_ua',
            //----------------------------------------------------------------------------------------------------------
            'content_ru'=> 'Тест',
            //----------------------------------------------------------------------------------------------------------
            'content_en' => 'Test',

        ]);
    }
}
