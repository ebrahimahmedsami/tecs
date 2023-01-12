<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $clinic = new Clinic();
        if (auth()->user()->clinic){
            $clinic = auth()->user()->clinic;
        }
        return view('dashboard.index',compact('clinic'));
    }
}
