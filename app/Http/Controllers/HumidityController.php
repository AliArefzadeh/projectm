<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeHumidityRequest;
use App\Models\Alarms;
use App\Models\Humidity;
use Illuminate\Http\Request;

class HumidityController extends Controller
{
    public function create()
    {
        $lastHumidity = Humidity::latest()->first();
        $lastAlarm = Alarms::latest()->first();
        return view('form.create', compact('lastHumidity','lastAlarm'));
    }
    public function store(storeHumidityRequest $request)
    {
        Humidity::create($request->all());

        return redirect()->route('humidity.create')->with('alert',__('messages.success'));
    }

    public function form(storeHumidityRequest $request)
    {
        Humidity::create($request->all());

        return redirect()->route('humidity.create')->with('alert',__('messages.success'));
    }

}
