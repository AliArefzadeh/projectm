<?php

namespace Database\Factories;
use App\Models\Alarms;

use App\Models\Humidity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alarms>
 */



class AlarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Alarms::class;


    public $led = array("on","off");

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->limit(1)->get(),
            'humidity_id'=>Humidity::inRandomOrder()->limit(1)->get(),
            'led' => 1,
            'contruction' => 0,
            'manual' => 0,


        ];
    }
}
