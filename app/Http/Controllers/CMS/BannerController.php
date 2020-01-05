<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        $url_banners = env('API_URL').'/banners';

        try{
            //call api user
            $response = $http->request('GET', $url_banners, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $banners = json_decode($response->getBody()->getContents())->data;
            
            return view('cms.pages.banners.index',compact(
                'banners'
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
        //
        return view('cms.pages.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //upload image
        $http = new \GuzzleHttp\Client;
        $url_image_upload = env('API_URL').'/images/upload';
        $url_banner = env('API_URL').'/banners';
        try{
            //call api user
            $response = $http->request('POST', $url_image_upload, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token'),
                    'Content-Type' => "application/x-www-form-urlencoded"
                ],
                'form_params' => [
                    "name" => $request->name,
                    "data" => $request->base64
                ]
            ]);
            $image_url = json_decode($response->getBody()->getContents())->image_url;
            //create a banner
            $response = $http->request('POST', $url_banner, [
                'headers' => [
                    //'Authorization' => "Bearer ".$request->session()->get('token'),
                    'Content-Type' => "application/x-www-form-urlencoded"
                ],
                'form_params' => [
                    "name" => $request->name,
                    "link" => $request->url,
                    "image_url" => $image_url
                ]
            ]);
            return redirect()->route('banners.index')->with('success','Create banner successfully!');
           
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
        $url_banners = env('API_URL').'/banners/'.$id;

        try{
            //call api user
            $response = $http->request('GET', $url_banners, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $banner = json_decode($response->getBody()->getContents())->data;
            
            return view('cms.pages.banners.show',compact(
                'banner'
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
    public function edit($id,Request $request)
    {
        $http = new \GuzzleHttp\Client;
        $url_banners = env('API_URL').'/banners/'.$id;

        try{
            //call api user
            $response = $http->request('GET', $url_banners, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $banner = json_decode($response->getBody()->getContents())->data;
            
            return view('cms.pages.banners.edit',compact(
                'banner'
            ));
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }
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
        //upload image
        $http = new \GuzzleHttp\Client;
        $url_image_upload = env('API_URL').'/images/upload';
        $url_banner = env('API_URL').'banners/'.$id;
        try{
            if(isset($request->image)){
                //call api upload image
                $response = $http->request('POST', $url_image_upload, [
                    'headers' => [
                        'Authorization' => "Bearer ".$request->session()->get('token'),
                        'Content-Type' => "application/x-www-form-urlencoded"
                    ],
                    'form_params' => [
                        "name" => $request->name,
                        "data" => $request->base64
                    ]
                ]);
                $image_url = json_decode($response->getBody()->getContents())->image_url;
            } else {
                $image_url = $request->base64;
            }
            //update a banner
            $response = $http->request('PUT', $url_banner, [
                'headers' => [
                    // 'Authorization' => "Bearer ".$request->session()->get('token'),
                    'Content-Type' => "application/json",
                    'timeout' => 5, // Response timeout
                    'connect_timeout' => 5, // Connection timeout
                ],
                'json' => [
                    "name" => $request->name,
                    "image_url" => $image_url,
                    "link" => $request->url,
                    "sequence" => $request->sequence
                ]
            ]);
            return redirect()->route('banners.show',$id)->with('success','Update banner successfully!');
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //upload image
         $http = new \GuzzleHttp\Client;
         $url_banner = env('API_URL').'banners/'.$id;
         try{
             //delete a banner
             $response = $http->request('DELETE', $url_banner, [
                 'headers' => [
                     // 'Authorization' => "Bearer ".$request->session()->get('token'),
                     'Content-Type' => "application/x-www-form-urlencoded"
                 ]
             ]);
             return redirect()->route('banners.index')->with('success','Delete banner successfully!');
         }catch (\GuzzleHttp\Exception\BadResponseException $e) {
             dd($e->getResponse()->getBody()->getContents());
             // return redirect()->back()->with('error','');
         }
    }
}
