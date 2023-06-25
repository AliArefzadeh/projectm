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

        /*$humidities = Humidity::filter($request->all())->orderByDesc('created_at')->get();*/
        /*$humidities = is_object(Humidity::filter($request->all()))==1 ? Humidity::filter($request->all())->get() : Humidity::filter($request->all());*/
        $humidities = Humidity::filter($request->all());


        //اگر $humidities استرینگ باشه نمیتونی فانکشن get() رو روش صدا بزنی پس باید توی خوده صفحه create.blade این متد رو بهش
        //اضافه کنی که لازم نباشه مثل کامنتهای بالا از لاجیک توی کنترلر استفاده کنیم.


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
