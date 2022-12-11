<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function verifyMobile(Request $request){
        $rules = [
            'phone' => ['required','digits:9']
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json([
               'success' => false,
               'message' => $validator->errors(),
            ]);
        }
        $user = User::firstOrCreate(['phone' => $request->phone]);
        $otp =rand(1111,9999);
        $user->update(['otp' => $otp]);
        return response()->json([
            'success' => true,
            'message' => __('api.otp sent successfully'),
            'data' => $user
        ],Response::HTTP_OK);
    }

    public function verifyOTP(Request $request){
        $rules =[
            'otp' =>['required','digits:4',Rule::exists('users','otp')],
            'phone' =>['required','digits:9',Rule::exists('users','phone')]
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user = User::where(['phone'=>$request->phone,'otp'=>$request->otp])->first();
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => __('api.wrong otp'),
            ],Response::HTTP_UNAUTHORIZED);
        }
        if(isset($user->name) && isset($user->email)){
            // user exist before
            $token = $user->createToken('api_token')->plainTextToken;
            $user->update(['otp'=>null]);

            $data['flag'] = 'old';
            $data['token'] = $token;
            $data['user'] = $user;
            return response()->json([
                'success' => true,
                'message' => __('api.you are logged in successfully'),
                'data' => $data
            ],Response::HTTP_OK);
        }

        $data['flag'] = 'new';
        $data['user'] = $user;
        return response()->json([
            'success' => true,
            'message' => __('api.continue to complete the registration process'),
            'data' => $data
        ],Response::HTTP_OK);

    }

    public function register(Request $request){
        $rules =[
            'otp' =>['required','digits:4',Rule::exists('users','otp')],
            'phone' =>['required','digits:9',Rule::exists('users','phone')],
            'name' =>['required','min:5'],
            'email' =>['required','email',Rule::unique('users','email')],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user = User::where(['phone'=>$request->phone,'otp'=>$request->otp])->first();
        $user->update([
           'otp' => null,
           'name' => $request->name,
           'email' => $request->email
        ]);
        $data['token'] = $user->createToken('api_token')->plainTextToken;;
        $data['user']= $user;
        return response()->json([
            'success' => true,
            'message' => __('api.you are logged in successfully'),
            'data' => $data
        ],Response::HTTP_OK);

    }

    public function logout(){
        auth('api')->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => __('api.you are logged out successfully'),
        ],Response::HTTP_OK);
    }
}
