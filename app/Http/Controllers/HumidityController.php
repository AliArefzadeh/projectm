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

        /*
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
             $humidities = DB::table('humidities')->leftjoin('alarms','humidities.id','=','alarms.humidity_id')
                 ->select('humidities.*','alarms.led','alarms.humidity_id')->whereBetween('humidities.created_at',[$firstDate,$lastDate])->get();
         }

         if (is_object($humidities)) {
             $x = array();
             $i = 0;

             foreach ($humidities as $humidity ) {
                 $y=$humidity->humidity_id;
                 $x[] = $y;
                 if ($i!==0 && $x[$i] == $x[$i-1] && $x[$i]!==null) {
                     unset($humidities[$i-1]);
                 }
                 $i++;
             }
         }*/

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
