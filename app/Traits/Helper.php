<?php

namespace App\Traits;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use function is_array;
use function is_object;
use function json_decode;
use function json_encode;
use Mockery\Exception;
use Storage;
/**
 * Created by PhpStorm.
 * User: HunG
 * Date: 2018-07-06
 * Time: 8:40 AM
 */

class Helper extends Collection
{


    /**
     * @param $status
     * @param $data
     * @param $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse|string
     */

    public static function whereForeach($query,$attribute,$method,$data,$where = 'and') {
        foreach ($data as $key => $value) {
            $_value = $method == 'LIKE'?"%".$value."%":$value; 
            $query = $where == 'and'?$query->where($attribute,$method,$_value):$query->orWhere($attribute,$method,$_value);
        }
        return $query;
    }

    public static function saveData($query,$data) {
        foreach ($data as $key => $value) {
            $query->$key = $value;
        }
        return $query;
    }

    public static function vali_require($request, $fillable){
        foreach ($fillable as $key => $value) {
            if(!isset($request->$value) || 
                $request->$value == null || 
                $request->$value == '')
                return Helper::sendResponse(false,'Validator error' ,400,"the ".$value." field is required");                 
        }    
    }

    public static function json_object_request($request){
        return json_decode(json_encode($request->json()->all()));
    }
    
    public static function sendResponse($status, $data, $code , $message = 'None message'){
        if($status === true)
        return response()->json([
            'status'=> $status,
            'message'=> $message,
            'data'=>$data] ,$code);
        elseif($status === false) return response()->json([
            'status'=> $status,
            'error'=>$data,
            'message'=>$message] ,$code);
        else return Exception::class;
    }

    /**
     * @param $status
     * @param string $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse|string
     */
    public static function sendResponseWithoutData($status, $message = 'None message',$code  ){
        if($status === true)
            return response()->json([
                'status'=> $status,
                'message'=> $message,
                ] ,$code);
        elseif($status === false) return response()->json([
            'status'=> $status,
            'error'=>$message] ,$code);
        else return Exception::class;
    }

    public static function sendSuccess($data){
            return response()->json([
                'status'=> true,
                'message'=> 'success',
                'data'=>$data] ,200);
    }
    /**
     * @param bool $status
     * @param $message
     * @param $data
     * should be the paginator instance
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function sendResponsePaginating($status = true,$message, $data, $code ){
        $data = json_decode($data->toJson());

        $payload = $data->data;
        $temp = [];
        if (is_object( $payload)){
            foreach ($payload as $p){
                $temp[] = $p;
            }
            $payload = $temp;
        }

        $pagination = array([
            "current_page" =>  $data->current_page,
            "from_record" =>  $data->from,
            "to_record" =>  $data->to,
            "total_record" =>  $data->total,
            "record_per_page" =>  (int)$data->per_page,
            "total_page" =>  $data->last_page,
//            "first_page_url" =>  $data->first_page_url,
//            "prev_page_url" =>  $data->prev_page_url,
//            "next_page_url" =>  $data->next_page_url,
        ])[0];
        return response()->json([
            'status'=> $status,
            'message'=> $message,
            'pagination'=>$pagination,
            'data'=>$payload,
            ]
            ,$code);
    }
    /**
     * @param Carbon $string
     * @return int
     */
    public static function carbon_to_int(Carbon $string){
        return $string->timestamp;
    }

    /**
     * @param $string
     * @return int
     */
    public  static  function  str_to_int($string){
        return time($string);
    }

    public static function request_only($request,$fillable){
        $array = [];
        foreach ($fillable as $key => $value) {
            $array[$value] = $request[$value];
        }
        return $array;
    }

    public static  function array_to_object($data){
       return json_decode(json_encode($data));
    }

    public static  function write_log_error($exception,$device,$url){
        $message = "\n ------------".date('H:i:s')."-".$device."-------------\n";
        $message .= "url: ".$url;
        $message .= "\nMessage: ".$exception->getMessage();
        $message .= "\nFile: ".$exception->getFile();
        $message .= "\nLine: ".$exception->getLine();
        $message .= "\n ------------end------------\n";
        Storage::prepend('logErrors/'.date('Y-m-d').'.log',$message);
    }
    public static function delTree($dir) {
        if(file_exists($dir)){
            $files = array_diff(scandir($dir), array('.','..')); 
            foreach ($files as $file) { 
              (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
            } 
            return rmdir($dir);
        }
        return false; 
    }

    /**
 * @param array $columnNames
 * @param array $rows
 * @param string $fileName
 * @return \Symfony\Component\HttpFoundation\StreamedResponse
 */
public static function getCsv($columnNames, $rows, $fileName = 'file.csv') {
    $headers = [
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=" . $fileName,
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    ];
    $callback = function() use ($columnNames, $rows ) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columnNames);
        foreach ($rows as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
}