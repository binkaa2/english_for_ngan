<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class DashboardController extends Controller
{
    /**
     * Index page
     * @param $_REQUEST
     * @return 
     */
    public function index(Request $request){
        $http = new \GuzzleHttp\Client;
        
        $url_categories = env('API_URL').'admin/categories';
        $url_users = env('API_URL').'admin/users';
        $url_products = env('API_URL').'admin/products?total_count=true';
        $url_products_report = env('API_URL').'admin/productreports?total_count=true';
        $url_users_report = env('API_URL').'admin/userreports?total_count=true';

        try{
            //call api categories
            $response = $http->request('GET', $url_categories, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $categories = json_decode($response->getBody()->getContents())->data;
            $total_categories = 0;
            foreach($categories as $category){
                $total_categories++;
                foreach($category->children as $cat){
                    $total_categories++;
                }
            }
            //call api user
            $response = $http->request('GET', $url_users, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $total_users = json_decode($response->getBody()->getContents())->data->total_count;
            //call api products
            $response = $http->request('GET', $url_products, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $total_products = json_decode($response->getBody()->getContents())->data->total_count;
            //call api products report
            $response = $http->request('GET', $url_products_report, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $total_products_report = json_decode($response->getBody()->getContents())->data->total_count;
            //call api user report
            $response = $http->request('GET', $url_users_report, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $total_users_report = json_decode($response->getBody()->getContents())->data->total_count;
            
            return view('cms.index',compact(
                'total_categories',
                'total_users',
                'total_products',
                'total_products_report',
                'total_users_report'
            ));

            // dd($request->session()->get('token'));
            // $request->session()->put('user_id',$data->data);
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }
    }
}
