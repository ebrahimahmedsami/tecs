<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicsRequest;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ClinicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            $data =Clinic::orderBy('id','desc')->get();
            return Datatables::of($data)->make(true);
        }
        return view('dashboard.clinics.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('dashboard.clinics.add',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function store(ClinicsRequest $request)
    {
        $exception = DB::transaction(function() use ($request) {

            $user = User::create([
                'name' => $request->name_en,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            if ($user){
                $clinic = Clinic::create([
                   'user_id' => $user->id,
                   'doctor_id' => $request->doctor,
                   'name_en' => $request->name_en,
                   'name_ar' => $request->name_ar,
                   'phone' => $request->phone,
                   'address' => $request->address,
                   'email' => $user->email,
                   'disclosure_price' => $request->disclosure_price,
                   'rediscovery_price' => $request->rediscovery_price,
                   'today_capacity' => $request->today_capacity,
                   'time_form' => $request->time_form,
                   'time_to' => $request->time_to,
                   'is_blocked' => isset($request->is_blocked) && $request->is_blocked == "on" ? '1' : '0',
                ]);
            }


        });
        return redirect()->route('admin.clinics.index')->with(['success' => __('dashboard.item added successfully')]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
