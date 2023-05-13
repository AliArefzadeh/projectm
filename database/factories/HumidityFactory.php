<?php

namespace Database\Factories;

use App\Models\Humidity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Humidity>
 */
class HumidityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Humidity::class;


    public function definition(): array
    {
        return [
            'humidity' => rand(20, 80),
            'description' => $this->faker->realText,

        ];
    }
}
