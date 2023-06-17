<?php

namespace App\Services;

use App\Models\Alarms;
use App\Models\Humidity;

class AlarmServise
{
    public function create(array $data)
    {
        $situation = $data['construction'];
        if (isset($data['led'])) {
            $led = $data['led'];
        }
        $lastRecord = Humidity::latest()->first();
        $params = array();
        /*$lastRecord = Humidity::all()->last();*/
        /*$latestAlarm = $lastRecord->alarm()->latest()->first()->led;*/


        if (isset($situation) && $situation == 'on') {
            if ($led == 'LED on') {
                $params = ([
                    'user_id' => auth()->id(),
                    'humidity_id' => $lastRecord->id,
                    'construction' => 1,
                    'manual' => 1,
                    'led' => 'on',
                ]);
            } elseif ($led == 'LED off') {
                $params = ([
                    'user_id' => auth()->id(),
                    'humidity_id' => $lastRecord->id,
                    'construction' => 1,
                    'manual' => 1,
                    'led' => 'off',
                ]);
            }

        } elseif (isset($situation) && $situation == 'off') {
            $params = ([
                'user_id' => auth()->id(),
                'humidity_id' => $lastRecord->id,
                'construction' => 0,
                'manual' => 1,
                'led' => 'off',
            ]);
        }
        return Alarms::create($params);
    }

    public function update(array $data, Humidity $humidity)
    {
        $led = $data['onoff'];
        $alarms = $humidity->alarm()->latest()->first();
        $params = array();
        /*if ($led == 'on' && $alarms->construction == 0)*/
        //کانتش کردم چون توی خود کنترلر یا میدلور چک میکنیم که اگر کنستراکتور برابر 1 بود وارد اینجا نشه

            if ($led == 'on' ) {
            $params = ([
                'led' => 'off',
                'manual' => '1',
                'user_id' => auth()->id(),
                'construction' => '0'
            ]);
            /*$humidity->alarm()->create($request->all());*/
        } /*elseif ($led == 'off' && $alarms->construction == 0)*/
            elseif ($led == 'off') {
            $params = ([
                'led' => 'on',
                'manual' => '1',
                'user_id' => auth()->id(),
                'construction' => '0'
            ]);
            /*$humidity->alarm()->create($data->all());*/
        }
        return $humidity->alarm()->create($params);
    }
}
