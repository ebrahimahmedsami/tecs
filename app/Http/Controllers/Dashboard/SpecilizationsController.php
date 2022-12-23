<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecializationsRequest;
use App\Models\Doctor;
use App\Models\Specializaition;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SpecilizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            $data =Specializaition::orderBy('id','desc')->get();
            return Datatables::of($data)->make(true);
        }
        return view('dashboard.specializations.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.specializations.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecializationsRequest $request)
    {
        Specializaition::create($request->validated());
        return redirect()->route('admin.specializations.index')->with(['success' => __('dashboard.item added successfully')]);
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
        $specialization = Specializaition::findOrFail($id);
        return view('dashboard.specializations.edit',compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecializationsRequest $request, $id)
    {
        $specialization = Specializaition::find($id);
        $specialization->update($request->validated());
        return redirect()->route('admin.specializations.index')->with(['success' => __('dashboard.item updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Specializaition::find($id)->delete();
        return back()->with(['success' => __('dashboard.item deleted successfully')]);
    }
}
