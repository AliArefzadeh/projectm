<?php

namespace App\Http\Controllers;

use App\Models\Alarms;
use App\Models\Humidity;
use Illuminate\Http\Request;

class AlarmsController extends Controller
{
    public function Store(Request $request)
    {

        $situation = $request['construction'];
        $led = $request['led'];
        $lastRecord = Humidity::latest()->first();
        /*$lastRecord = Humidity::all()->last();*/
        /*$latestAlarm = $lastRecord->alarm()->latest()->first()->led;*/



        if (isset($situation) && $situation== 'on') {
            if ($led == 'LED on') {
                Alarms::create([
                    'user_id' => auth()->id(),
                    'humidity_id' => $lastRecord->id,
                    'construction' => 1,
                    'manual' => 1,
                    'led' => 'on',
                ]);
            } elseif ($led == 'LED off') {
                Alarms::create([
                    'user_id' => auth()->id(),
                    'humidity_id' => $lastRecord->id,
                    'construction' => 1,
                    'manual' => 1,
                    'led' => 'off',
                ]);
            }

        }
        elseif (isset($situation) && $situation== 'off' ) {
            Alarms::create([
                'user_id' => auth()->id(),
                'humidity_id' => $lastRecord->id,
                'construction' => 0,
                'manual' => 1,
                'led' => 'off',
            ]);
        }

        return redirect()->route('humidity.create')->with('alert', __('messages.success'));
    }
}
