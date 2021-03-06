<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Setting;
use Database\Factories\QuestionFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Setting::factory(3)->create();
        Question::factory(3)->create();
    }
}
