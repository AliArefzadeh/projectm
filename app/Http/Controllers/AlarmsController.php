<?php

namespace App\Http\Controllers;

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
    public function index(Request $request)
    {

        /*$lastHumidity = $humidity->latest()->first();*/
        /*$lastAlarm = Alarms::latest()->first();*/
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
        $alarms = 'Waiting for your selection...';
        if (isset($firstDate) && isset($lastDate)) {
            $alarms = DB::table('alarms')->whereBetween('alarms.created_at',[$firstDate,$lastDate])->orderByDesc('created_at')->get();
        }


        if (is_object($alarms) && isset($request['sortBy'])) {
            if (  $request['sortBy']=='forced') {
                $alarms = DB::table('alarms')->whereBetween('alarms.created_at',[$firstDate,$lastDate])->where('alarms.manual','=','1')->orderByDesc('created_at')->get();
            }
            if (  $request['sortBy']=='construction') {
                $alarms = DB::table('alarms')->whereBetween('alarms.created_at',[$firstDate,$lastDate])->where('alarms.construction','=','1')->orderByDesc('created_at')->get();
            }
        }

        return view('form.controlRoom', compact(/*'lastHumidity','lastAlarm',*/'alarms'));
    }





    public function Store(Request $request)
    {
        (new AlarmServise)->create($request->all());
        return redirect()->back()->with('alert', __('messages.success'));
       /* $situation = $request['construction'];
        $led = $request['led'];
        $lastRecord = Humidity::latest()->first();*/
        /*$lastRecord = Humidity::all()->last();*/
        /*$latestAlarm = $lastRecord->alarm()->latest()->first()->led;*/

/*

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
        }*/

    }

    public function update(AlarmRequest $request,Humidity $humidity)
    {

        $alarms = $humidity->alarm()->latest()->first();
        if ($alarms && $alarms->construction == 1) {
            return redirect()->route('humidity.create')->with('alert_e', __('messages.constructionsIsOn'));
        }
        /*متن بالا رو بال میدل ور انجام بده*/

        (new AlarmServise)->update($request->all(), $humidity);
        return redirect()->route('humidity.create')->with('alert', __('messages.success'));


        /*dd($request['onoff']);*/
       /* $led = $request['onoff'];
        $alarms=$humidity->alarm()->latest()->first();*/
        /*dd($request);*/
       /* if ($led == 'on' && $alarms->construction == 0) {
            $request->merge([
                'led' => 'off',
                'manual' => '1',
                'user_id'=>auth()->id(),
                'construction'=>'0'
            ]);
            $humidity->alarm()->create($request->all());
            return redirect()->route('humidity.create')->with('alert', __('messages.success'));
        }
        elseif ($led == 'off' && $alarms->construction == 0) {
            $request->merge([
                'led' => 'on',
                'manual' => '1',
                'user_id'=>auth()->id(),
                'construction'=>'0'
            ]);
            $humidity->alarm()->create($request->all());
            return redirect()->route('humidity.create')->with('alert', __('messages.success'));
        }*/

    }







}
