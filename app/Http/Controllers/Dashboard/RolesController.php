<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:roles',['only'=>['index']]);
        $this->middleware('permission:add role',['only'=>['create','store']]);
        $this->middleware('permission:edit role',['only'=>['edit','update']]);
        $this->middleware('permission:delete role',['only'=>['destroy']]);
        $this->middleware('permission:add-permission',['only'=>['add_permission']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            $data =Role::withCount('users')->get();
            return Datatables::of($data)->make(true);
        }
        return view('dashboard.roles.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.roles.add',['permissions'=>Permission::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required','string',Rule::unique('roles','name')],
            'permission.*' => ['numeric',Rule::exists('permissions','id')]
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $role =Role::create(['name'=>$validator->validated()['name']]);
        $role->syncPermissions($validator->validated()['permission']);
        return redirect()->route('admin.roles.index')->with(['success' => __('dashboard.item added successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('dashboard.roles.edit',[
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $rules = [
            'name' => ['required','string',Rule::unique('roles','name')->ignore($role->id)],
            'permission.*' => ['numeric',Rule::exists('permissions','id')]
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $request->name == $role->name ?:$role->update(['name' => $validator->validated()['name']]);
        $role->syncPermissions($validator->validated()['permission']);
        return redirect()->route('admin.roles.index')->with(['success' => __('dashboard.item updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with(['success' => __('dashboard.item deleted successfully')]);
    }

    public function add_permission(Request $request){
        $rules = [
            'name.*' => ['required','string',Rule::unique('permissions','name')],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $super_admin = Role::findOrCreate('super_admin');
        foreach ($request->name as $name){
            $permission[] = Permission::create(['name' =>$name,'guard_name' => 'web']);
        }
        $super_admin->syncPermissions($permission);
        return back()->with(['success'=>__('dashboard.item added successfully')]);
    }
}
