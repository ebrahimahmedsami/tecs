<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Setting;
use App\Models\SettingService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $settings = Setting::first();
        $services = SettingService::all();
        $clinics = Clinic::with(['doctor','holidays'])->ofIsAnnounce(Clinic::ANNOUNCE_YES)->get();
        return view('front.home',compact('settings','services','clinics'));
    }
}
