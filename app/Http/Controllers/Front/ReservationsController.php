<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Patient;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReservationsController extends Controller
{
    public function storeReservation(Request $request){
        $data=  array();
        parse_str($request->get('data'), $data);
        $patient = Patient::where('national_id',$data['modal_national_id'])->first();
        $validator = Validator::make($data, [
            'modal_national_id' => 'required',
            'modal_date' => 'required',
            'modal_type' => 'required',
            'modal_clinic_id' => 'required',
            'modal_specialization_id' => 'required',
            'name_ar' => [Rule::requiredIf(function () use($patient){return !$patient;}),'max:255'],
            'name_en' => [Rule::requiredIf(function () use($patient){return !$patient;}),'max:255'],
            'phone' => [Rule::requiredIf(function () use($patient){return !$patient;}),'numeric'],
            'address' => [Rule::requiredIf(function () use($patient){return !$patient;}),'max:255'],
            'age' => [Rule::requiredIf(function () use($patient){return !$patient;}),'numeric'],
            'gender' => [Rule::requiredIf(function () use($patient){return !$patient;}),'in:0,1'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()],422);
        }

        $clinic = Clinic::find($data['modal_clinic_id']);
        # Check Clinic Capacity
        $todayCapacity = $clinic->reservations()->ofGetReservationsToday($data['modal_date'])->ofStatus([0,1])->count();
        if ($todayCapacity >= $clinic->today_capacity){
            return response()->json(['error_capacity'=>__('dashboard.number of reservations exceeded')],422);
        }


        # If New Patient
        if (empty($patient)){
            $patient = Patient::create([
                'name_ar' => $data['name_ar'],
                'name_en' => $data['name_en'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'age' => $data['age'],
                'national_id' => $data['modal_national_id'],
                'gender' => $data['gender'],
            ]);
            $patient->clinics()->sync([$clinic->id]);
        }

        Reservation::create([
           'patient_id' => $patient->id,
           'clinic_id' => $clinic->id,
           'date' => $data['modal_date'],
           'type' => $data['modal_type'],
           'specialization_id' => $data['modal_specialization_id'],
        ]);
        return response()->json(['success'=>__('home.success_reservation')],200);

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
            'data' => get_patient_data_table($patient),
            'flag' => true
        ],200);
    }
}
