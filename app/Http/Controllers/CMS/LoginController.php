<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /**
     * Login cms page
     * @return login index
     */
    public function index(Request $request){
        return view('cms.pages.login.index');
    }

    /**
     * Check if user is admin or not
     * @return login index if user is not admin
     * @return cms index if user is admin
     */
    public function checkAdmin(Request $request){
        if($request->email == "admin@3km.vn" || $request->email == "mod1@3km.vn" || $request->email == "thangle.hd@gmail.com"){
            
        }else{
            return redirect()->back()->with('error','Tên đăng nhập hoặc mật khẩu sai!');
        }
        $http = new \GuzzleHttp\Client;
        $payload = [
            'form_params' => [
                'username' => $request->email,
                'password' => $request->password
            ]
        ];
        $url = env('API_URL').'auth/login';

        try{
            $response = $http->request('POST', $url, [
                'form_params' => [
                    'username' => $request->email,
                    'password' => $request->password
                ]
            ]);
            $data = json_decode($response->getBody()->getContents());
            if($data->data == null){
                return redirect()->back()->with('error','Tên đăng nhập hoặc mật khẩu sai!');
            }
            $request->session()->put('token',$data->data->token);
            if($request->email == "mod1@3km.vn")
                $request->session()->put("role","mod");
            else 
                $request->session()->put("role","admin");
            return redirect()->route('cms.index');
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            return redirect()->back()->with('error','Tên đăng nhập hoặc mật khẩu sai!');
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request){
        $request->session()->forget('token');
        return redirect()->route('cms.index');
    }
}
