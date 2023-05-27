<?php

namespace App\Http\Controllers;

use App\Models\Alarms;
use App\Models\Humidity;
use Illuminate\Http\Request;

class AlarmsController extends Controller
{
    public function Store(Request $request)
    {
        dd($request['construction']);
        $situation = $request['construction'];


        if (isset($situation) && $situation== 'on') {
            /*$lastRecord = Humidity::all()->last();*/
           $lastRecord = Humidity::latest()->first();

            Alarms::create([
                'user_id' => auth()->id(),
                'humidity_id' => $lastRecord->id,
                'construction' => 1,
                'manual' => 1,
                'led' => 'on',
            ]);
        }
        return redirect()->route('humidity.create')->with('alert', __('messages.success'));
    }
}
