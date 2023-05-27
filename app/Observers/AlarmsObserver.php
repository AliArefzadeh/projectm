<?php

namespace App\Observers;

use App\Models\Alarms;
use App\Models\Humidity;

class AlarmsObserver
{
    /**
     * Handle the Alarms "created" event.
     */
    public function created(Alarms $alarms): void
    {
        /*$prev = $alarms['id'] - 1;
        $prev = Alarms::find($prev);
        if ($prev['construction'] == 'on') {
            $alarms->update([
                'construction' => 'on',
                'manual' => 1,
                'led' => $alarms->led,
            ]);
        }*/
    }

    /**
     * Handle the Alarms "updated" event.
     */
    public function updated(Alarms $alarms): void
    {
        //
    }

    /**
     * Handle the Alarms "deleted" event.
     */
    public function deleted(Alarms $alarms): void
    {
        //
    }

    /**
     * Handle the Alarms "restored" event.
     */
    public function restored(Alarms $alarms): void
    {
        //
    }

    /**
     * Handle the Alarms "force deleted" event.
     */
    public function forceDeleted(Alarms $alarms): void
    {
        //
    }
}
