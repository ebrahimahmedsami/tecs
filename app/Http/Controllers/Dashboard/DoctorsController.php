<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorsRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            $data =Doctor::orderBy('id','desc')->get();
            return Datatables::of($data)->make(true);
        }
        return view('dashboard.doctors.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.doctors.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorsRequest $request)
    {
        Doctor::create($request->validated());
        return redirect()->route('admin.doctors.index')->with(['success' => __('dashboard.item added successfully')]);

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
        $doctor = Doctor::findOrFail($id);
        return view('dashboard.doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorsRequest $request, $id)
    {
       $doctor = Doctor::find($id);
       $doctor->update($request->validated());
        return redirect()->route('admin.doctors.index')->with(['success' => __('dashboard.item updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return back()->with(['success' => __('dashboard.item deleted successfully')]);
    }
}
