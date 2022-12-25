<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        if (auth()->user()->clinic){
            $clinics = auth()->user()->clinic->ofStats()->first();
        }else{
            $clinics = Clinic::ofStats()->get();
        }
        return view('dashboard.index',compact('clinics'));
    }
}
