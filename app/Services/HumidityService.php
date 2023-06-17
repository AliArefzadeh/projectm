<?php
namespace App\Services;

use App\Models\Alarms;
use App\Models\Humidity;
use Illuminate\Support\Facades\DB;

class HumidityService
{
    public function create(Humidity $humidity, array $data)
    {

        $lastHumidity = $humidity->latest()->first();
        $lastAlarm = Alarms::latest()->first();
        if (isset($data['fyear']) && isset($data['fmon']) && isset($data['fday'])) {
            $fyear = $data['fyear'];
            $fmon = $data['fmon'];
            $fday = $data['fday'];
            $firstDate="$fyear".'-'."$fmon".'-'."$fday";

        }
        if (isset($data['lyear']) && isset($data['lmon']) &&isset($data['lday'])) {
            $lyear = $data['lyear'];
            $lmon = $data['lmon'];
            $lday = $data['lday'];
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
        }
        return view('form.create', compact('lastHumidity','lastAlarm','humidities'));

    }


}

