<?php

namespace App\Http\Controllers\API;

use function bcrypt;
use function config;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mockery\Exception;
use App\Traits\Helper;
use App\Traits\Notify;
use Socialite;
use App\Jobs\SendNotifyCreateDevice;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    // serve 
    private $serve = null;
    public function __construct()
    {
       $this->serve = env('MY_APP_URL','http://localhost/dreesu/public');
    }
    public function login(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return Helper::sendResponse(false, 'Validator error', 400, $validator->errors()->first());
        }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            $token_field = $user->createToken('Login Token')->accessToken;
            return Helper::sendResponse(true, $token_field, 200, 'success');
        }
        return Helper::sendResponse(false, 'Grant token error', 200,"grant error");


    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return Helper::sendResponse(true, 'Logout successfully', 200, "Logout successfully");
    }
        /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return Helper::sendResponse(false, 'Validator error', 400, $validator->errors()->first());
        }
        $input = $request->all();
        $password = $input['password'];
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        $token_field = $user->createToken('register default Token')->accessToken;
        return Helper::sendResponse(true, $token_field, 200, 'success');

    }

    public function register_via_social(Request $request){
         $validator = Validator::make($request->all(), [
             'social_token' => 'required',
             'email' => 'email',
             'birth_day'=>'integer',
             'social_id'=>'required',
             'type_social'=>'required',
         ]);

         if ($validator->fails()) {
             return Helper::sendResponse(false, 'Validator error', 400, $validator->errors()->first());
         }
          DB::beginTransaction();
         $input = $request->only(['social_token','email','birth_day','social_id','avatar','name','type_social']);
         $user = User::where('social_id', $request->social_id)->first();
         if($user) {
             $user->update($input);
         }
         else {
            $user = User::create($input);
         }
        //  SendNotifyCreateDevice::dispatch($user->id,$request->identifier,$request->device_type);
         $token_field = $user->createToken('Social Token')->accessToken;
         DB::commit();
         return Helper::sendResponse(true, $token_field, 200, 'success');

    }


    public function getUserViaToken(Request $request)
    {
        $user = $request->user();
        if (!$user) return Helper::sendResponse(false, 'Not found',404,'User not found');
        return Helper::sendResponse(true, $user, 200, 'success');
    }


}

