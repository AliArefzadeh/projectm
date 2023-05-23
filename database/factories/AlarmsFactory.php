<?php

namespace Database\Factories;
use App\Models\Alarms;

use App\Models\Humidity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alarms>
 */



class AlarmsFactory extends Factory
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
            'user_id' => User::all()->random()->id,
            'humidity_id'=>Humidity::all()->random()->id,
            'construction' => 0,
            'manual' => 1,
            'led' => 1,

        ];
    }
}
