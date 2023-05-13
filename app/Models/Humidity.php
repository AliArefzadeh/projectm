<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Humidity extends Model
{
    use HasFactory;

    public function getPersianTimeAttribute($humidity)
    {
        /*$time = $humidity->where('created_at','<',)*/
        return new Verta($humidity);
    }

}
