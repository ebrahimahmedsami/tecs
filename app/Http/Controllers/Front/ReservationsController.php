<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function store(Request $request){

    }

    public function checkPatientExistence(Request $request){
        $patient = Patient::where('national_id',$request->national_id)->first();
        if(!$patient){
            return response()->json([
               'data' => __('home.there is no such this data') ,
                'flag' => false
            ],200);
        }
        return response()->json([
            'data' => $patient,
            'flag' => true
        ],200);
    }
}
