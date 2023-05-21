<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeHumidityRequest;
use App\Models\Humidity;
use Illuminate\Http\Request;

class HumidityController extends Controller
{
    public function create()
    {
        $humidity = Humidity::all();
        return view('form.create', compact('humidity'));
    }
    public function store(storeHumidityRequest $request)
    {
        Humidity::create($request->all());

        return redirect()->route('humidity.create')->with('alert',__('messages.success'));
    }

    public function form(storeHumidityRequest $request)
    {
        Humidity::create($request->all());

        return redirect()->route('humidity.create')->with('alert',__('messages.success'));
    }

}
