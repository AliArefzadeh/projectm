<?php

namespace App\Filters;


use App\Models\Alarms;
use App\Models\Humidity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class HumidityFilter
{
    public function __construct(public Builder $builder)
    {

    }

    public function apply($data)
    {

        $this->SortByTime($data);

    }


    private function SortByTime($data)
    {
        if (isset($data['fyear']) && isset($data['fmon']) && isset($data['fday'])) {
            $fyear = $data['fyear'];
            $fmon = $data['fmon'];
            $fday = $data['fday'];
            $firstDate = "$fyear" . '-' . "$fmon" . '-' . "$fday";

        }
        if (isset($data['lyear']) && isset($data['lmon']) && isset($data['lday'])) {
            $lyear = $data['lyear'];
            $lmon = $data['lmon'];
            $lday = $data['lday'];
            $lastDate = "$lyear" . '-' . "$lmon" . '-' . "$lday";
        }

        if (isset($firstDate) && isset($lastDate)) {
            $humidities = DB::table('humidities')->leftjoin('alarms', 'humidities.id', '=', 'alarms.humidity_id')
                ->select('humidities.*', 'alarms.led', 'alarms.humidity_id')->whereBetween('humidities.created_at', [$firstDate, $lastDate])->get();

            $this->deleteDuplicates($humidities);
        }
        if (!isset($humidities)) {
          return $humidities = 'Waiting for your selection...';
        }

        /*is_object($humidities) == 1 ? $this->deleteDuplicates($humidities) : '';*/
    }

    public function deleteDuplicates($humidities)
    {

        $x = array();
        $i = 0;

        foreach ($humidities as $humidity) {
            $y = $humidity->humidity_id;
            $x[] = $y;
            if ($i !== 0 && $x[$i] == $x[$i - 1] && $x[$i] !== null) {
                unset($humidities[$i - 1]);
            }
            $i++;
        }

    }
}
