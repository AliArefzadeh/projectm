<?php

namespace Database\Seeders;

use App\Models\Alarms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlarmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alarms::factory()->count(4)->create();
    }
}
