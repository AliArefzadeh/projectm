<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeHumidityRequest;
use App\Models\Alarms;
use App\Models\Humidity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HumidityController extends Controller
{

    public function create(Request $request)
    {
        $lastHumidity = Humidity::latest()->first();
        $lastAlarm = Alarms::latest()->first();

        $humidities = Humidity::filter($request->all())->orderByDesc('created_at')->get();
        //این get() بالا در واقع توی کوئری ها نوشته شده بود همونطور که توی کامنت های زیر میبینی
        //ولی جواب نداد و از اونجا حذف و به اینجا اورده شد
        //بعد دوباره $this->>buildr رو حذف و از همون DB استفاده کردیم تا بشه از فانکشن duplicate هم استفاده کرد و
        //بازم get() رو به اخرش برگردوندیدم

        return view('form.create', compact('lastHumidity', 'lastAlarm', 'humidities'));

    }

    public function store(storeHumidityRequest $request)
    {
        Humidity::create($request->all());

        return redirect()->route('humidity.create')->with('alert', __('messages.success'));
    }

    public function form(storeHumidityRequest $request)
    {
        Humidity::create($request->all());

        return redirect()->route('humidity.create')->with('alert', __('messages.success'));
    }

}
