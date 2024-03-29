<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationssRequest;
use App\Models\Clinic;
use App\Models\Patient;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            if (auth()->user()->clinic){
                $data = optional(optional(auth()->user())->clinic)->reservations()
                    ->ofPatient(\request()->get('patient_name'))
                    ->ofType(\request()->get('type'))
                    ->get()
                    ->load(['patient','clinic']);
            }else{
                $data = Reservation::orderBy('id','desc')
                    ->ofPatient(\request()->get('patient_name'))
                    ->ofType(\request()->get('type'))
                    ->with(['patient','clinic'])
                    ->get();
            }
            return Datatables::of($data)->make(true);
        }
        return view('dashboard.reservations.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->clinic){
            $patients = auth()->user()->clinic->patients;
            $clinics = auth()->user()->clinic;
        }else{
            $patients = Patient::all();
            $clinics = Clinic::ofUnBlocked(Clinic::UN_BLOCKED)->get();
        }
        return view('dashboard.reservations.add',compact('clinics','patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationssRequest $request)
    {
        $clinic = Clinic::find($request->clinic_id);
        if (!$clinic)
            return redirect()->route('admin.reservations.index')->with(['danger' =>__('dashboard.there is no such this data')]);

        $todayCapacity = $clinic->reservations()->ofGetReservationsToday($request->date)->ofStatus([0,1])->count();

        if ($todayCapacity >= $clinic->today_capacity)
            return redirect()->route('admin.reservations.index')->with(['danger' =>__('dashboard.number of reservations exceeded')]);


        if ($clinic->holidays()->count() > 0){
            $date_day_name = lcfirst(Carbon::parse($request->date)->format('l'));
            $holidays = $clinic->holidays->pluck('day')->toArray();
            if (in_array($date_day_name,$holidays)){
                return redirect()->route('admin.reservations.index')->with(['danger' =>__('dashboard.clinic_holiday')]);
            }
        }
        Reservation::create($request->validated());
        return redirect()->route('admin.reservations.index')->with(['success' => __('dashboard.item added successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::where('id',$id)->first();
        if (auth()->user()->clinic){
            $patients = auth()->user()->clinic->patients;
            $clinics = auth()->user()->clinic;
        }else{
            $patients = Patient::all();
            $clinics = Clinic::ofUnBlocked(Clinic::UN_BLOCKED)->get();
        }
        return view('dashboard.reservations.edit',compact('clinics','patients','reservation'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationssRequest $request, $id)
    {
        $reservation = Reservation::where('id',$id)->first();
        if ($reservation){
            $reservation->update($request->validated());
        }
        return redirect()->route('admin.reservations.index')->with(['success' => __('dashboard.item updated successfully')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::where('id',$id)->first();
        if ($reservation){
            $reservation->delete();
        }
        return redirect()->back()->with(['success' => __('dashboard.item deleted successfully')]);
    }


    public function today_reservations(Request $request){
        $today = Carbon::today()->format('Y-m-d');
        if (auth()->user()->clinic){
            $todayReservations = optional(optional(auth()->user())->clinic)
                ->reservations()
                ->ofGetReservationsToday($request->get('date') ?? $today)
                ->with(['patient','clinic'])->get();
        }else{
            $todayReservations = Reservation::ofGetReservationsToday($request->get('date') ?? $today)->with(['patient','clinic'])->get();
        }
        if (\request()->ajax()) {
            return Datatables::of($todayReservations)->make(true);
        }
        return view('dashboard.reservations.today_reservations');
    }

    public function get_clinic_specializations(Request $request){
        $clinic = Clinic::where('id',$request->id)->first();
        $data['patients'] = $clinic->patients;
        $data['specializations'] = optional($clinic->doctor)->specilizations;
        return response()->json(['data' => $data,200]);
    }

    public function change_status(Request $request){
        $reservation = Reservation::where('id',$request->id)->first();
        if ($reservation){
            $reservation->update(['status' => $request->status]);
        }
        return response()->json(['data' => 'status changed',200]);
    }

    public function update_note(Request $request){
        $reservation = Reservation::where('id',$request->id)->first();
        if ($reservation){
            $reservation->update(['note' => $request->note]);
        }
        return response()->json(['data' => 'note changed',200]);
    }


    public function mark_all_read(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back()->with(['success' => __('dashboard.item deleted successfully')]);
    }

}
