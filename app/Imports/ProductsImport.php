<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Session;
class ProductsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $i = 0;
        $data_arr = array();
        foreach ($rows as $row){
           if($i!= 0){
            $data = array(
                "name" => $row[1],
                "price" => $row[6],
                "description" => $row[2],
                "category_id" => $row[3],
                "user_id" => $row[7],
                "min_offer" => $row[10],
                "condition" => $row[9],
                "longitude" => $row[5],
                "latitude" => $row[4],
                "district_id" => $row[11],
                "image_urls"=> $row[0],
                "attributes" => "forsale"
            );	
            array_push($data_arr,$data);
           }
           $i++;

        }
        $data_arr = array("products"=>$data_arr);
        //dd($data_arr);
              $http = new \GuzzleHttp\Client;
            $url_products = env('API_URL').'admin/createProducts';
            // dd($data_arr);
            try{
                //call api get detail product
                $response = $http->request('POST', $url_products, [
                    'headers' => [
                        'Authorization' => "Bearer ".Session::get('token'),
                        'Content-Type' => "application/json",
                        'Accept' => "application/json"
                    ],
                    'json' => $data_arr,
                    'timeout' => 10, // Response timeout
                    'connect_timeout' => 10, // Connection timeout
                ]);
                // dd($response->getBody()->getContents());
            }catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    dd($e->getResponse()->getBody()->getContents());
                   //return false;
                   //dd("false");
                }
    }
}
