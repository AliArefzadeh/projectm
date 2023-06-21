<?php

namespace App\Http\Controllers;

use App\Models\Alarms;
use App\Models\Humidity;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $lastHumidity = Humidity::latest()->first();
        $lastAlarm = Alarms::latest()->first();
        $humidities = Humidity::filter($request->all());

        return view('index',compact('humidities','lastHumidity','lastAlarm'));
    }


}
