<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Session;
class UsersImport implements ToCollection
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
                'email' => $row[2],
                'first_name' => $row[0] ? $row[0] : "",
                'last_name' => $row[1] ? $row[1] : "",
                'phone' => $row[3] ? $row[3] : "",
                'district_id' => $row[4]
            );	
            array_push($data_arr,$data);
           }
           $i++;

        }
        $data_arr = array("users"=>$data_arr,"password"=>"kaka");
        
        //dd($data_arr);
        $http = new \GuzzleHttp\Client;
            $url_products = env('API_URL').'admin/createUsers';
            try{
                //call api get detail product
                $response = $http->request('POST', $url_products, [
                    'headers' => [
                        'Authorization' => "Bearer ".Session::get('token'),
                        'Content-Type' => "application/json",
                        'Accept' => "application/json"
                    ],
                    'json' =>$data_arr,
                    'timeout' => 5, // Response timeout
                    'connect_timeout' => 5, // Connection timeout
                ]);
                            
            }catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    dd($e->getResponse()->getBody()->getContents());
                   //return false;
                   //dd("false");
                  
                }
    }
}
