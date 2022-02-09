<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'setting_type' => 'feedback email',
            'setting_email' => $this->faker->unique()->safeEmail(),
        ];
    }


}
