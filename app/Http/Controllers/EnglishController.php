<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnglishController extends Controller
{
   /**
    * 
     */
    public function unit1_text1(Request $request){
        $correct_answer = 1;
        if($request->cau1 == "a")
            $correct_answer++;
        if($request->cau2 == "a")
            $correct_answer++;
        if($request->cau3 == "c")
            $correct_answer++;
        if($request->cau4 == "b")
        $correct_answer++;
        if($request->cau5 == "b")
            $correct_answer++;
        return redirect()->back()->with('success',$correct_answer)
                                ->with('cau1',$request->cau1)
                                ->with('cau2',$request->cau2)
                                ->with('cau3',$request->cau3)
                                ->with('cau4',$request->cau4)
                                ->with('cau5',$request->cau5);
    }
}
