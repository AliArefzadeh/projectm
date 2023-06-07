<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeHumidityRequest;
use App\Models\Alarms;
use App\Models\Humidity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HumidityController extends Controller
{

    public function create(Request $request,Humidity $humidity)
    {


        $lastHumidity = $humidity->latest()->first();
        $lastAlarm = Alarms::latest()->first();
        if ($request->has('fyear') && $request->has('fmon') &&$request->has('fday')) {
            $fyear = $request['fyear'];
            $fmon = $request['fmon'];
            $fday = $request['fday'];
            $firstDate="$fyear".'-'."$fmon".'-'."$fday";

        }
        if ($request->has('lyear') && $request->has('lmon') &&$request->has('lday')) {
            $lyear = $request['lyear'];
            $lmon = $request['lmon'];
            $lday = $request['lday'];
            $lastDate="$lyear".'-'."$lmon".'-'."$lday";
        }
        $humidities = 'Waiting for your selection...';
        if (isset($firstDate) && isset($lastDate)) {
            $humidities = DB::table('humidities')->whereBetween('created_at',[$firstDate,$lastDate])->get();
        }








        return view('form.create', compact('lastHumidity','lastAlarm','humidities'));
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
