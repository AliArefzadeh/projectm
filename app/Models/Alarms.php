<?php

namespace App\Models;

use App\Filters\AlarmFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alarms extends Model
{
    use HasFactory;

    protected $fillable=['user_id', 'humidity_id', 'construction', 'manual', 'led'];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function humidity()
    {
       return $this->belongsTo(Humidity::class);
    }

    public function scopeFilters(Builder $builder,array $data)
    {
       return (new AlarmFilter($builder,$data))->apply($data);

    }
}
