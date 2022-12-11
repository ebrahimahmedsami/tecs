<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function index(){
        return view('dashboard.auth-login');
    }

    public function login(Request $request){

        $rules=[
            'email' => ['required','email',Rule::exists('users','email')],
            'password' => ['required', 'min:6' ,'max:100']
        ];

        $messages_ar = [
            'required' => 'هذا الحقل لا يجب ان يكون فارغ',
            'email' => 'يجب ان يكون الحقل من نوع بريد الكتروني',
            'email.exists' => 'هذا البريد غير موجود',
            'min' => 'لا يجب ان يقل  الرقم السري عن 6 احرف',
            'max' => 'لا يجب ان يزيد  الرقم السري عن 100 حرف'
        ];

        $messages = (app()->getLocale() == 'ar' )? $messages_ar : [];

        $validator = Validator::make($request->all(),$rules, $messages);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        if(auth('web')->attempt($validator->validated())){
            session()->regenerate();
            return redirect()->route('admin.home');
        }
        return back()->with(['error'=>__('dashboard.email or password or both are wrong')]);
    }

    public function logout(){
        Auth::logout();
        return redirect()-> route('admin.login');
    }


}
