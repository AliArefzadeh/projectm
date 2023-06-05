<?php

namespace App\Observers;

use App\Models\Alarms;
use App\Models\Humidity;
use Illuminate\Http\Request;
class HumidityObserver
{
    /**
     * Handle the Humidity "created" event.
     */
    public function created(Humidity $humidity): void
    {
        $alarms = Alarms::latest()->first();
        /*$prev = $alarms['id'] - 1;
        $prev = Alarms::find($prev);*/
        if ($alarms['construction'] == '1') {
            if ($alarms['led'] == 'on'){
                Alarms::create([
                    'user_id' => auth()->id(),
                    'humidity_id' => $humidity['id'],
                    'construction' => 1,
                    'manual' => 1,
                    'led' => 'on',
                ]);
            }
            elseif ($alarms['led'] == 'off'){
                Alarms::create([
                    'user_id' => auth()->id(),
                    'humidity_id' => $humidity['id'],
                    'construction' => 1,
                    'manual' => 1,
                    'led' => 'off',
                ]);
            }

        }

        else if ($humidity['humidity'] > 43) {
            Alarms::create([
                'user_id' => auth()->id(),
                'humidity_id' => $humidity['id'],
                'construction' => 0,
                'manual' => 0,
                'led' => 'on',
            ]);
        }
    }

    /**
     * Handle the Humidity "updated" event.
     */
    public function updated(Humidity $humidity): void
    {
        //
    }

    /**
     * Handle the Humidity "deleted" event.
     */
    public function deleted(Humidity $humidity): void
    {
        //
    }

    /**
     * Handle the Humidity "restored" event.
     */
    public function restored(Humidity $humidity): void
    {
        //
    }

    /**
     * Handle the Humidity "force deleted" event.
     */
    public function forceDeleted(Humidity $humidity): void
    {
        //
    }
}
