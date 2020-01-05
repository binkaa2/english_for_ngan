<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Imports\UsersImport;
use File;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Traits\Helper;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $http = new \GuzzleHttp\Client;
        $url_users = env('API_URL').'/admin/users';
        $ltn = 50 * ($request->page ? (int)$request->page : 1);
        $query = "";
        if(isset($request->page) && $request->page != "1")
            $query .= "&skip=".$ltn;
        if($request->search)
            $query .= "&q=".$request->search;
        if(isset($request->is_seller) && $request->is_seller != ""){
            $query .= "&is_seller=".$request->is_seller;
        }
        if(isset($request->is_active) && $request->is_active != ""){
            $query .= "&is_active=".$request->is_active;
        }
        if(isset($request->display_name) && $request->display_name != ""){
            $query .= "&display_name=".$request->display_name;
        }
        if(isset($request->email) && $request->email != ""){
            $query .= "&email=".$request->email;
        }
        if(isset($request->phone) && $request->phone != ""){
            $query .= "&phone=".$request->phone;
        }
        if($request->date_from)
            $query .= "&from=".$request->date_from;
        if($request->date_to)
            $query .= "&to=".$request->date_to;
        if($request->sort){
            $query .= "&sort=".$request->sort;
        }else {
            $query .= "&sort=updated_at_desc";
        }
        if($query != ""){
            $query[0] = "?";
            $url_users = $url_users.$query;
        }

        try{
            //call api user
            $response = $http->request('GET', $url_users, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $response_data = json_decode($response->getBody()->getContents())->data;
            $users = $response_data->users;
            $total_count = $response_data->total_count;
            $total_page = round((int) $total_count / 50) ;
            return view('cms.pages.users.index',compact(
                'users','total_page'
            ));
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $http = new \GuzzleHttp\Client;
        $url = env('API_URL').'/districts/cities';

        try{
            //call api user
            $response = $http->request('GET', $url, [
                // 'headers' => [
                //     'Authorization' => "Bearer ".$request->session()->get('token')
                // ]
            ]);
            $districts = json_decode($response->getBody()->getContents())->data;
            
            return view('cms.pages.users.add',compact('districts'));
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $http = new \GuzzleHttp\Client;
          $url = env('API_URL').'/users';
          try{
            $response = $http->request('POST', $url, [
                'headers' => [
                    //'Authorization' => "Bearer ".Session::get('token'),
                    'Content-Type' => "application/x-www-form-urlencoded"
                ],
                'form_params' => [
                    'email' => $request->email,
                    'first_name' => $request->first_name ? $request->first_name : "firstname",
                    'last_name' => $request->last_name ? $request->last_name : "lastname",
                    'phone' => $request->phone ? $request->phone : "0123456789",
                    'district_id' => $request->district_id,
                    'password' => $request->password
                ]
            ]);
              return redirect()->route('users.show',json_decode($response->getBody()->getContents())->data->_id)->with('success','Create user successfully!');
             
          }catch (\GuzzleHttp\Exception\BadResponseException $e) {
              dd($e->getResponse()->getBody()->getContents());
              // return redirect()->back()->with('error','');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $http = new \GuzzleHttp\Client;
        $url_users = env('API_URL').'admin/users/'.$id;

        try{
            //call api user
            $response = $http->request('GET', $url_users, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $user = json_decode($response->getBody()->getContents())->data;
            
            return view('cms.pages.users.show',compact(
                'user'
            ));
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }
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

     /**
     * User report
     */
    public function userReportIndex(Request $request){
        $http = new \GuzzleHttp\Client;
        $ltn = 50 * ($request->page ? (int)$request->page : 1);
        $query = "";
        if(isset($request->page) && $request->page != "1")
            $query .= "?skip=".$ltn;
        if($query != "")
            $url_users_report = env('API_URL').'admin/userreports'.$query;
        else 
        $url_users_report = env('API_URL').'admin/userreports';
        try{
            //call api product report
            $response = $http->request('GET', $url_users_report, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $response_data = json_decode($response->getBody()->getContents())->data;
            $users_report = $response_data->reports;
            $total_count = $response_data->total_count;
            $total_page = round((int) $total_count / 50) ;
            return view('cms.pages.users.report',compact(
                'users_report','total_page'
            ));
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }
    }

    /**
     * Deactivate user 
     */
    public function deactivateUser(Request $request){
        if(!isset($request->user_id)){
            return redirect()->route('cms.index');
        }
        $http = new \GuzzleHttp\Client;
        $url_users_deactivate = env('API_URL').'users/deactivate';

        try{
            //call api
            $response = $http->request('POST', $url_users_deactivate, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ],
                'form_params' => [
                    'user_id' => $request->user_id,
                ]
            ]);
            $user_deactivate = json_decode($response->getBody()->getContents())->data;
            if(isset($user_deactivate))
                return redirect()->route('users.show',$request->user_id)->with('success','Deactivate user successfully!');
            else 
                return redirect()->back()->with('error','Something wrong when deactivating user!');
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            //dd($e->getResponse()->getBody()->getContents());
            return redirect()->back()->with('error','Something wrong when deactivating user!');
        }
    }

     /**
     * Active user 
     */
    public function activeUser(Request $request){
        if(!isset($request->user_id)){
            return redirect()->route('cms.index');
        }
        $http = new \GuzzleHttp\Client;
        $url_users_active = env('API_URL').'users/activate';

        try{
            //call api
            $response = $http->request('POST', $url_users_active, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ],
                'form_params' => [
                    'user_id' => $request->user_id,
                ]
            ]);
            $user_active = json_decode($response->getBody()->getContents())->data;
            
            if(isset($user_active))
                return redirect()->route('users.show',$request->user_id)->with('success','Activate user successfully!');
            else 
                return redirect()->route('users.show',$request->user_id)->with('error','Something wrong when activating user!');
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            
            dd($e->getResponse()->getBody()->getContents());
            return redirect()->route('users.show',$request->user_id)->with('error','Something wrong when activating user!');
        }
    }

    public function import(Request $request) 
    {
        if($request->hasFile('file'))
        {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "csv") {
                try {
                    $headings = (new HeadingRowImport)->toArray(request()->file('file'));
                    if(sizeof($headings[0][0]) == 5){
                        if($headings[0][0][0] == "firstname" && 
                        $headings[0][0][1] == "lastname" && 
                        $headings[0][0][2] == "email" && 
                        $headings[0][0][3] == "phone" && 
                        $headings[0][0][4] == "location")
                            Excel::import(new UsersImport, request()->file('file'));
                        else
                            return redirect()->back()->with('error','Please correct your header name in csv!');
                    } else {
                        return redirect()->back()->with('error','Please correct your header name in csv!');
                    }
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    return redirect()->back()->with('error','');
                }
                return redirect()->back()->with('success','Import user successfully!');
            }else {
                return redirect()->back()->with('error','Please upload a valid xls/csv file!');
            }
        }
    }

    public function export(Request $request) {
        $http = new \GuzzleHttp\Client;
        $url_users = env('API_URL').'/admin/users';
        $query = "?limit=5000";
        
        if($request->search)
            $query .= "&q=".$request->search;
        if($request->date_from)
            $query .= "&from=".$request->date_from;
        if($request->date_to)
            $query .= "&to=".$request->date_to;
        if($query != ""){
            $query[0] = "?";
            $url_users = $url_users.$query;
        }

        try{
            //call api user
            $response = $http->request('GET', $url_users, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $users = json_decode($response->getBody()->getContents())->data->users;
            $rows = array();
            foreach($users as $user){
                $row = [
                    $user->_id,
                    isset($user->display_name) ? $user->display_name : "",
                    isset($user->first_name) ? $user->first_name : "",
                    isset($user->last_name) ? $user->last_name : "",
                    isset($user->avatar_url) ? $user->avatar_url : "",
                    $user->email,
                    isset($user->phone) ? $user->phone : "",
                    $user->is_active ? "true" : "false",
                    $user->is_seller ? "true" : "false",
                    $user->is_email_verified ? "true" : "false",
                    $user->is_facebook_verified ? "true" : "false",
                    $user->is_zalo_verified ? "true" : "false",
                    
                    isset($user->district) ? $user->district->_id : "",
                    isset($user->district) ? $user->district->name : "",
                    date('d-m-Y H:i:s', strtotime($user->created_at)),
                    date('d-m-Y H:i:s', strtotime($user->updated_at))
                ];
                array_push($rows,$row);
            }
           $columnNames = ['ID','DisplayName','FirstName', 'LastName', 'AvatarUrl','Email' , 'Phone' , 'IsActive',
                'IsSeller','IsEmailVerified','IsFacebookVerified','IsZaloVerified',
                'DistrictId','DistrictName','CreatedAt','UpdatedAt'];
           return Helper::getCsv($columnNames, $rows , "users_export_".date('Y-m-d H:i:s').".csv");
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }
    }


    /**
     * Bulk delete users 
     */
    public function bulkDelete(Request $request){
        if(!isset($request->user_cb)){
            return redirect()->back()->with('error','Please choose at least one user!');
        }
        $http = new \GuzzleHttp\Client;
        foreach($request->user_cb as $key => $user){
            $url_users_deactivate = env('API_URL').'users/deactivate';
            try{
                //call api
                $response = $http->request('POST', $url_users_deactivate, [
                    'headers' => [
                        'Authorization' => "Bearer ".$request->session()->get('token')
                    ],
                    'form_params' => [
                        'user_id' => $user,
                    ]
                ]);
            }catch (\GuzzleHttp\Exception\BadResponseException $e) {
                //dd($e->getResponse()->getBody()->getContents());
                return redirect()->back()->with('error','Something wrong when deactivating user!');
            }
        }
        return redirect()->back()->with('success','Bulk Deactive user successfully!');
    }
}

