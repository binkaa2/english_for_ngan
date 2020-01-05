<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Imports\ProductsImport;
use File;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Traits\Helper;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        $url_products = env('API_URL').'admin/products/search';
        $ltn = 50 * ($request->page ? (int)$request->page : 1);
        $query = "";
        if(isset($request->page) && $request->page != "1")
            $query .= "&skip=".$ltn;
        if($request->search){
            $query .= "&q=".$request->search;
        }
        if($request->date_from){
            $query .= "&from=".$request->date_from;
        }
        if($request->date_to){
            $query .= "&to=".$request->date_to;
        }
        if($request->sort){
            $query .= "&sort=".$request->sort;
        }else {
            $query .= "&sort=updated_at_desc";
        }
        if($query != ""){
            $query[0] = "?";
            $url_products = $url_products.$query;
        }
        
        try{
            //call api user
            $response = $http->request('GET', $url_products, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ],
                'timeout' => 6, // Response timeout
                'connect_timeout' => 6, // Connection timeout
            ]);
            $response_data = json_decode($response->getBody()->getContents())->data;
            $total_count = $response_data->total_count;
            $total_page = round((int) $total_count / 50) ;
            $products = $response_data->products;

            return view('cms.pages.products.index',compact(
                'products','total_page'
            ));
           
        }catch (\GuzzleHttp\Exception\ConnectException $e) {
            return redirect()->back()->with('error','Get products time out');
        }

        return view('cms.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $url_products = env('API_URL').'admin/products/detail?product_id='.$id;

        try{
            //call api get detail product
            $response = $http->request('GET', $url_products, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $product = json_decode($response->getBody()->getContents())->data;
            if(isset($product))
                return view('cms.pages.products.show',compact(
                    'product'
                ));
            else 
                return view('cms.pages.index');
            
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
        $url_products = env('API_URL').'admin/products/detail?product_id='.$id;
        $url_categories = env('API_URL').'admin/categories';
        $url_district = env('API_URL').'/districts/cities';

        try{
            //call api get detail product
            $response = $http->request('GET', $url_products, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);

            $product = json_decode($response->getBody()->getContents())->data;

            $response = $http->request('GET', $url_categories, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);

            $categories = json_decode($response->getBody()->getContents())->data;
            
            $response = $http->request('GET', $url_district, [
            ]);
            $districts = json_decode($response->getBody()->getContents())->data;

            if(isset($product) && isset($categories))
                return view('cms.pages.products.edit',compact(
                    'product',
                    'categories',
                    'districts'
                ));
            else 
                return view('cms.pages.index');
            
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
        $url_products = env('API_URL').'admin/products/update?product_id='.$id;

        try{
            //call api get detail product
            $response = $http->request('PUT', $url_products, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token'),
                    'Content-Type' => "application/x-www-form-urlencoded"
                ],
                'form_params' => [
                    'category_id' => $request->category_id,
                    'product_name' => $request->name,
                    'product_price' => $request->price,
                    'product_description' => $request->des,
                    'status' => $request->status,
                    'is_active' => $request->is_active,
                    'district' => $request->district
                ]
            ]);

            $product = json_decode($response->getBody()->getContents())->data;

            if(isset($product))
                return redirect()->route('products.show',$id)->with('success','Update product successfully!');
            else 
                return redirect()->back()->with('error','Something wrong when updating product!');
            
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            //dd($e->getResponse()->getBody()->getContents());
            return redirect()->back()->with('error','Something wrong when updating product!');
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
        //
    }

    /**
     * Product report
     */
    public function productReportIndex(Request $request){
        $http = new \GuzzleHttp\Client;

        $ltn = 50 * ($request->page ? (int)$request->page : 1);
        $query = "";
        if(isset($request->page) && $request->page != "1")
            $query .= "?skip=".$ltn;
        if($query != "")
            $url_products_report = env('API_URL').'admin/productreports'.$query;
        else 
            $url_products_report = env('API_URL').'admin/productreports';
        try{
            //call api product report
            $response = $http->request('GET', $url_products_report, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $response_data = json_decode($response->getBody()->getContents())->data;
            $products_report = $response_data->reports;
            $total_count = $response_data->total_count;
            $total_page = round((int) $total_count / 50) ;
            return view('cms.pages.products.report',compact(
                'products_report','total_page'
            ));
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }
    }

    /**
     * Takedown a product
     */
    public function productTakedown(Request $request,$id){
        $http = new \GuzzleHttp\Client;
        $url_products_takedown = env('API_URL').'admin/products/takedown?product_id='.$id;

        try{
            //call api product report
            $response = $http->request('POST', $url_products_takedown, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $products_report = json_decode($response->getBody()->getContents())->data;
            if(isset($products_report))
                return redirect()->back()->with('success','Takedown product successfully');
            else 
                return redirect()->back()->with('error',"There's a problem when trying to takedown product");
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            //dd($e->getResponse()->getBody()->getContents());
            return redirect()->back()->with('error',"There's a problem when trying to takedown product");
        }
    }


    /**
     * Activate a product
     */
    public function productActivate(Request $request,$id){
        $http = new \GuzzleHttp\Client;
        $url_products_activate = env('API_URL').'admin/products/activate?product_id='.$id;

        try{
            //call api product report
            $response = $http->request('POST', $url_products_activate, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            $products_activate = json_decode($response->getBody()->getContents())->data;
            if(isset($products_activate))
                return redirect()->back()->with('success','Activate product successfully');
            else 
                return redirect()->back()->with('error',"There's a problem when trying to activate product");
           
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            //dd($e->getResponse()->getBody()->getContents());
            return redirect()->back()->with('error',"There's a problem when trying to activate product");
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
                    if(sizeof($headings[0][0]) == 12){
                        if($headings[0][0][0] == "image_urls" && 
                        $headings[0][0][1] == "name" && 
                        $headings[0][0][2] == "description" && 
                        $headings[0][0][3] == "category_id" && 
                        $headings[0][0][4] == "latitude" && 
                        $headings[0][0][5] == "longitude" && 
                        $headings[0][0][6] == "price" && 
                        $headings[0][0][7] == "user_id" && 
                        $headings[0][0][8] == "attributes" && 
                        $headings[0][0][9] == "condition" && 
                        $headings[0][0][10] == "min_price" && 
                        $headings[0][0][11] == "district_id")
                            Excel::import(new ProductsImport, request()->file('file'));
                        else
                            return redirect()->back()->with('error','Please correct your header name in csv!');
                    } else {
                        return redirect()->back()->with('error','Please correct your header name in csv!');
                    }
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    return redirect()->back()->with('error','');
                }
                return redirect()->back()->with('success','Import product successfully!');
            }else {
                return redirect()->back()->with('error','Please upload a valid xls/csv file!');
            }
        }
    }

    public function export(Request $request) {

        $http = new \GuzzleHttp\Client;
        $url_products = env('API_URL').'admin/products';

        $query = "?limit=1000000";
        
        if($request->search)
            $query .= "&q=".$request->search;
        if($request->date_from)
            $query .= "&from=".$request->date_from;
        if($request->date_to)
            $query .= "&to=".$request->date_to;
        if($query != ""){
            $query[0] = "?";
            $url_products = $url_products.'/search'.$query;
        }
        
        try{
            //call api user
            $response = $http->request('GET', $url_products, [
                'headers' => [
                    'Authorization' => "Bearer ".$request->session()->get('token')
                ]
            ]);
            
            if($query != ""){
                $products = json_decode($response->getBody()->getContents())->data->products;
            } else {
                $products = json_decode($response->getBody()->getContents())->data;
            }
            
            $rows = array();

            foreach($products as $product){
                $row = [
                    !empty($product->images) ? $product->images[0]->medium->image_url : "",$product->name,
                    $product->description,isset($product->category->_id) ? $product->category->_id : "",
                    $product->location->coordinates[1],$product->location->coordinates[0],
                    $product->price,isset($product->posted_by->_id) ? $product->posted_by->_id : "",
                    $product->attributes[0],$product->condition,
                    isset($product->min_offer) ?  $product->min_offer : "",$product->district->_id
                ];
                array_push($rows,$row);
            }
           $columnNames = ['image_urls', 'name', 'description' , 'category_id' , 'latitude' , 'longitude' , 'price' , 'user_id' , 'attributes' , 'condition' , 'min_price' , 'district_id'];
           return Helper::getCsv($columnNames, $rows , "product_export_".date('Y-m-d H:i:s').".csv");
        }catch (\GuzzleHttp\Exception\BadResponseException $e) {
            dd($e->getResponse()->getBody()->getContents());
            // return redirect()->back()->with('error','');
        }
    }



    /**
     * Bulk takedown
     */
    public function bulkAction(Request $request){
     
        if(!$request->product_cb){
            return redirect()->back()->with('error','Please choose at least one product!');
        }
        $http = new \GuzzleHttp\Client;
        
        if($request->is_button == "bulk_delete"){
            foreach($request->product_cb as $key => $product){
                $url_products_takedown = env('API_URL').'admin/products/takedown?product_id='.$product;
                try{
                    //call api
                    $response = $http->request('POST', $url_products_takedown, [
                        'headers' => [
                            'Authorization' => "Bearer ".$request->session()->get('token')
                        ],
                    ]);
                }catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    //dd($e->getResponse()->getBody()->getContents());
                    return redirect()->back()->with('error','Something wrong when deactivating product!');
                }
            }
            return redirect()->back()->with('success','Bulk Deactive product successfully!');
        }else if($request->is_button == "bulk_active"){
            foreach($request->product_cb as $key => $product){
                $url_products_active = env('API_URL').'admin/products/activate?product_id='.$product;
                try{
                    //call api
                    $response = $http->request('POST', $url_products_active, [
                        'headers' => [
                            'Authorization' => "Bearer ".$request->session()->get('token')
                        ],
                    ]);
                }catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    //dd($e->getResponse()->getBody()->getContents());
                    return redirect()->back()->with('error','Something wrong when activating product!');
                }
            }
            return redirect()->back()->with('success','Bulk active product successfully!');
        }
    }

}
