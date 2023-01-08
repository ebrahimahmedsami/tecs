<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicsRequest;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
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
        $roles = Role::where('name','!=','super_admin')->where('name','!=','supervisor')->get();
        return view('dashboard.clinics.add',compact('doctors','roles'));
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
            $role = Role::where('id',$request->role_id)->first();
                $clinic = Clinic::create([
                   'doctor_id' => $request->doctor,
                   'name_en' => $request->name_en,
                   'name_ar' => $request->name_ar,
                   'phone' => $request->phone,
                   'address' => $request->address,
                   'email' => $request->email,
                   'disclosure_price' => $request->disclosure_price,
                   'rediscovery_price' => $request->rediscovery_price,
                   'today_capacity' => $request->today_capacity,
                   'time_form' => $request->time_form,
                   'time_to' => $request->time_to,
                   'is_blocked' => isset($request->is_blocked) && $request->is_blocked == "on" ? '1' : '0',
                ]);

                if ($clinic){
                    $user = User::create([
                        'name' => $clinic->name_en,
                        'email' => $clinic->email,
                        'password' => bcrypt($request->password),
                        'type_type' => 'App\\Models\\Clinic',
                        'type_id' => $clinic->id
                    ]);
                    $user->assignRole($role);
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
        $clinic = Clinic::where('id',$id)->with('user')->first();
        $doctors = Doctor::all();
        $roles = Role::where('name','!=','super_admin')->where('name','!=','supervisor')->get();
        return view('dashboard.clinics.edit',compact('clinic','doctors','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicsRequest $request, $id)
    {
        $exception = DB::transaction(function() use ($request,$id) {
            $clinic = Clinic::find($id);
            $clinic->update([
                'doctor_id' => $request->doctor,
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'disclosure_price' => $request->disclosure_price,
                'rediscovery_price' => $request->rediscovery_price,
                'today_capacity' => $request->today_capacity,
                'time_form' => $request->time_form,
                'time_to' => $request->time_to,
                'is_blocked' => isset($request->is_blocked) && $request->is_blocked == "on" ? '1' : '0',
            ]);

            if ($clinic){
                $clinic->user->update([
                    'name' => $clinic->name_en,
                    'email' => $clinic->email,
                ]);
                if ($request->has('password') && !empty($request->password)){
                    $clinic->user->update([
                        'password' => bcrypt($request->password),
                    ]);
                }
                if ($request->has('role_id') && !empty($request->role_id)){
                    $role = Role::where('id',$request->role_id)->first();
                    $clinic->user->assignRole($role);
                }
            }

        });
        return redirect()->route('admin.clinics.index')->with(['success' => __('dashboard.item updated successfully')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinic = Clinic::where('id',$id)->with('reservations')->first();
        if ($clinic->reservations()->count() > 0){
            return back()->with(['danger' => __('dashboard.error_delete_clinic')]);
        }
        $clinic->user()->delete();
        $clinic->delete();
        return back()->with(['success' => __('dashboard.item deleted successfully')]);
    }
}
