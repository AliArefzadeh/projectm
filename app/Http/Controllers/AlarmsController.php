<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckConstructionMode;
use App\Http\Requests\AlarmRequest;
use App\Models\Alarms;
use App\Models\Humidity;
use App\Providers\RouteServiceProvider;
use App\Services\AlarmServise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Composer\Autoload\includeFile;

class AlarmsController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckConstructionMode::class,['only'=>['update']]);
    }

    public function index(Request $request)
    {

        /*$lastHumidity = $humidity->latest()->first();*/
        /*$lastAlarm = Alarms::latest()->first();*/
        /*$alarms=Alarms::filters($request->all())->get();*/
        $alarms=Alarms::filters($request->all());




        return view('form.controlRoom', compact(/*'lastHumidity','lastAlarm',*/'alarms'));
    }





    public function Store(Request $request)
    {
        (new AlarmServise)->create($request->all());
        return redirect()->back()->with('alert', __('messages.success'));

    }

    public function update(AlarmRequest $request,Humidity $humidity)
    {

        /*$alarms = $humidity->alarm()->latest()->first();
        if ($alarms && $alarms->construction == 1) {
            return redirect()->route('humidity.create')->with('alert_e', __('messages.constructionsIsOn'));
        }*/
        /*متن بالا رو با میدل ور انجام بده*/

        (new AlarmServise)->update($request->all(), $humidity);
        return redirect()->route('humidity.create')->with('alert', __('messages.success'));


    }







}
