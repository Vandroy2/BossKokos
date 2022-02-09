<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
                'question_ua'=>$this->faker->realText(50),
                'question_ru'=>$this->faker->realText(50),
                'question_en'=>$this->faker->realText(50),
                'answer_ua'=>$this->faker->realText(500),
                'answer_ru'=>$this->faker->realText(500),
                'answer_en'=>$this->faker->realText(500),
        ];
    }
}
