<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientsRequest;
use App\Models\Clinic;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PatientsController extends Controller
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
                $data = optional(auth()->user()->clinic)->patients;
            }else{
                $data =Patient::orderBy('id','desc')->get();
            }
            return Datatables::of($data)->make(true);
        }
        return view('dashboard.patients.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->clinic){
            $clinics = auth()->user()->clinic;
        }else{
            $clinics = Clinic::ofUnBlocked(Clinic::UN_BLOCKED)->get();
        }
        return view('dashboard.patients.add',compact('clinics'));
    }

    /**
     * @param PatientsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PatientsRequest $request)
    {
        $patient = Patient::create($request->validated());
        $request->clinic_id = is_array($request->clinic_id) ? $request->clinic_id : [$request->clinic_id];
        $patient->clinics()->sync($request->clinic_id,false);
        return redirect()->route('admin.patients.index')->with(['success' => __('dashboard.item added successfully')]);
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
        if (auth()->user()->clinic){
            $clinics = auth()->user()->clinic;
        }else{
            $clinics = Clinic::ofUnBlocked(Clinic::UN_BLOCKED)->get();
        }
        $patient = Patient::where('id',$id)->first();
        return view('dashboard.patients.edit',compact('patient','clinics'));
    }


    /**
     * @param PatientsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PatientsRequest $request, $id)
    {
        $patient = Patient::where('id',$id)->first();
        if ($patient){
            $patient->update($request->validated());
            $request->clinic_id = is_array($request->clinic_id) ? $request->clinic_id : [$request->clinic_id];
            $patient->clinics()->sync($request->clinic_id);
        }
        return redirect()->route('admin.patients.index')->with(['success' => __('dashboard.item updated successfully')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::where('id',$id)->with('reservations')->first();

        if (auth()->user()->clinic) {
            $reservation_on_clinic = $patient->reservations()->where('clinic_id',optional(auth()->user())->clinic->id)->count();
            if ($reservation_on_clinic > 0){
                return back()->with(['danger' => __('dashboard.error_delete_patient')]);
            }
            DB::table('clinic_patients')->where('clinic_id', optional(auth()->user())->clinic->id)->delete();
        }else{
            if ($patient->reservations()->count() > 0){
                return back()->with(['danger' => __('dashboard.error_delete_patient')]);
            }
            $patient->delete();
            $patient->clinics()->detach();
        }

        return back()->with(['success' => __('dashboard.item deleted successfully')]);

    }
}
