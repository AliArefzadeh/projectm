<?php

namespace App\Http\Controllers;

use App\Models\Humidity;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }


}
