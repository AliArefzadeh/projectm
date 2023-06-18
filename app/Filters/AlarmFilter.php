<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class AlarmFilter
{
    public $lastDate;
    public $firstDate;

    public function __construct(public Builder $builder,$data)
    {
        if (isset($data['fyear']) && isset($data['fmon']) && isset($data['fday'])) {
            $fyear = $data['fyear'];
            $fmon = $data['fmon'];
            $fday = $data['fday'];
            $this->firstDate = "$fyear" . '-' . "$fmon" . '-' . "$fday";

        }
        if (isset($data['lyear']) && isset($data['lmon']) && isset($data['lday'])) {
            $lyear = $data['lyear'];
            $lmon = $data['lmon'];
            $lday = $data['lday'];
            $this->lastDate = "$lyear" . '-' . "$lmon" . '-' . "$lday";
        }
    }

    public function apply($data)
    {
        $x=$this->SortByTime($this->firstDate,$this->lastDate);
        if (is_object($x) && isset($data['sortBy'])) {
            $this->SortByManual($data,$this->firstDate,$this->lastDate);
            $this->SortByConstruction($data,$this->firstDate,$this->lastDate);
        }
    }

    public function SortByTime($firstDate,$lastDate)
    {


        if (isset($firstDate) && isset($lastDate)) {
           return  DB::table('alarms')->whereBetween('alarms.created_at', [$firstDate, $lastDate])->orderByDesc('created_at');
        } elseif (1) {
           return  'Waiting for your selection...';
        }
    }

    public function SortByManual($data,$firstDate,$lastDate)
    {

            if (  $data['sortBy']=='forced') {
                DB::table('alarms')->whereBetween('alarms.created_at',[$firstDate,$lastDate])->where('alarms.manual','=','1')->orderByDesc('created_at')->get();
            }


    }

    public function SortByConstruction($data,$firstDate,$lastDate)
    {
        if (  $data['sortBy']=='construction') {
             DB::table('alarms')->whereBetween('alarms.created_at',[$firstDate,$lastDate])->where('alarms.construction','=','1')->orderByDesc('created_at')->get();
        }
    }
}
