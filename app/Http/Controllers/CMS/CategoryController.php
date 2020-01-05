<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        $url_categories = env('API_URL').'admin/categories';

        try{
            //call api user
            $response = $http->request('GET', $url_categories, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $categories = json_decode($response->getBody()->getContents())->data;
            
            return view('cms.pages.category.index',compact(
                'categories'
            ));
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }

        return view('cms.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        $url_categories = env('API_URL').'admin/categories';

        try{
            //call api get detail product
            $response = $http->request('GET', $url_categories, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token'),
                    'Content-Type' => "application/x-www-form-urlencoded"
                ],
                'timeout' => 5, // Response timeout
                'connect_timeout' => 5, // Connection timeout,
            ]);

            $categories = json_decode($response->getBody()->getContents())->data;

            return view("cms.pages.category.create",compact('categories'));
            
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            //return redirect()->back()->with('error','Something wrong when creating category!');
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
        $url_categories = env('API_URL').'categories';
       
        try{
            //call api get detail product
            $response = $http->request('POST', $url_categories, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token'),
                    'Content-Type' => "application/json",
                ],
                'json' => [
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'parent_id' => $request->parent_id ? $request->parent_id : "",
                    //'is_active' => $request->is_active == "on" ? 1 : 0
                ]
            ]);

            return redirect()->route('category.index')->with('success','Add category successfully!');
            
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            //return redirect()->back()->with('error','Something wrong when creating category!');
        }
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
    public function edit(Request $request,$id)
    {
        $http = new \GuzzleHttp\Client;
        $url_categories = env('API_URL').'categories/'.$id;

        try{
            //call api user
            $response = $http->request('GET', $url_categories, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $category = json_decode($response->getBody()->getContents())->data;
            $url_categories = env('API_URL').'admin/categories';
             //call api user
             $response = $http->request('GET', $url_categories, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $categories = json_decode($response->getBody()->getContents())->data;
            return view('cms.pages.category.edit',compact(
                'category','categories'
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
        $http = new \GuzzleHttp\Client;
        $url_categories = env('API_URL').'categories/'.$id;
       
        try{
            //call api get detail product
            $response = $http->request('PUT', $url_categories, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token'),
                    'Content-Type' => "application/json",
                ],
                'json' => [
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'parent_id' => $request->parent_id ? $request->parent_id : "",
                    //'is_active' => $request->is_active == "on" ? 1 : 0
                ]
            ]);
            
            return redirect()->route('category.index')->with('success','Edit category successfully!');
            
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            //dd($e->getResponse()->getBody()->getContents());
            return redirect()->back()->with('error','Something wrong when edit category!');
        }
        return redirect()->route('category.index')->with('success','Edit category successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $http = new \GuzzleHttp\Client;
        $url_categories = env('API_URL').'categories/'.$id;
       
        try{
            //call api get detail product
            $response = $http->request('DELETE', $url_categories, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token'),
                    'Content-Type' => "application/json",
                ],
            ]);
            
            return redirect()->route('category.index')->with('success','Delete category successfully!');
            
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            //dd($e->getResponse()->getBody()->getContents());
            return redirect()->back()->with('error','Something wrong when delete category!');
        }
        return redirect()->route('category.index')->with('success','Delete category successfully!');
    }
}
