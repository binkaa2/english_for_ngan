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

    public function unit1_text2(Request $request){
        $correct_answer = 1;
        if($request->cau1 == "d")
            $correct_answer++;
        if($request->cau2 == "b")
            $correct_answer++;
        if($request->cau3 == "a")
            $correct_answer++;
        if($request->cau4 == "c")
        $correct_answer++;
        if($request->cau5 == "a")
            $correct_answer++;
            if($request->cau6 == "a")
            $correct_answer++;
            if($request->cau7 == "high tides")
            $correct_answer++;
            if($request->cau8 == "agricultural production")
            $correct_answer++;
            if($request->cau9 == "coastal boundaries")
            $correct_answer++;
            if($request->cau10 == "not_given")
            $correct_answer++;
            if($request->cau11 == "not_given")
            $correct_answer++;
            if($request->cau12 == "no")
            $correct_answer++;
            if($request->cau13 == "yes")
            $correct_answer++;
            if($request->cau14 == "no")
            $correct_answer++;
        return redirect()->back()->with('success',$correct_answer)
                                ->with('cau1',$request->cau1)
                                ->with('cau2',$request->cau2)
                                ->with('cau3',$request->cau3)
                                ->with('cau4',$request->cau4)
                                ->with('cau5',$request->cau5)
                                ->with('cau6',$request->cau6)
                                ->with('cau7',$request->cau7)
                                ->with('cau8',$request->cau8)
                                ->with('cau9',$request->cau9)
                                ->with('cau10',$request->cau10)
                                ->with('cau11',$request->cau11)
                                ->with('cau12',$request->cau12)
                                ->with('cau13',$request->cau13)
                                ->with('cau14',$request->cau14)
                                ;
    }

    public function unit1_vocab1(Request $request){
        $correct_answer = 1;
        if($request->cau1 == "catastrophic")
            $correct_answer++;
        if($request->cau2 == "diversity")
            $correct_answer++;
        if($request->cau3 == "heat-related")
            $correct_answer++;
        if($request->cau4 == "greenhouse gases")
        $correct_answer++;
        if($request->cau5 == "capture")
            $correct_answer++;
        if($request->cau6 == "ecological balance")
            $correct_answer++;
            if($request->cau1e2 == "e")
            $correct_answer++;
        if($request->cau2e2 == "c")
            $correct_answer++;
        if($request->cau3e2 == "f")
            $correct_answer++;
        if($request->cau4e2 == "b")
        $correct_answer++;
        if($request->cau5e2 == "d")
            $correct_answer++;
        if($request->cau6e2 == "a")
            $correct_answer++;
        return redirect()->back()->with('success',$correct_answer)
                                ->with('cau1',$request->cau1)
                                ->with('cau2',$request->cau2)
                                ->with('cau3',$request->cau3)
                                ->with('cau4',$request->cau4)
                                ->with('cau5',$request->cau5)
                                ->with('cau6',$request->cau6)
                                ->with('cau1e2',$request->cau1e2)
                                ->with('cau2e2',$request->cau2e2)
                                ->with('cau3e2',$request->cau3e2)
                                ->with('cau4e2',$request->cau4e2)
                                ->with('cau5e2',$request->cau5e2)
                                ->with('cau6e2',$request->cau6e2);
    }

    /**
    * 
     */
    public function unit2_text1(Request $request){
        $correct_answer = 1;
        if($request->cau1 == "a")
            $correct_answer++;
        if($request->cau2 == "c")
            $correct_answer++;
        if($request->cau3 == "d")
            $correct_answer++;
        if($request->cau4 == "b")
        $correct_answer++;
        if($request->cau5 == "a")
            $correct_answer++;
            if($request->cau6 == "d")
            $correct_answer++;
            if($request->cau7 == "c")
            $correct_answer++;
            if($request->cau8 == "b")
            $correct_answer++;
            if($request->cau9 == "c")
            $correct_answer++;
            if($request->cau10 == "b")
            $correct_answer++;
        return redirect()->back()->with('success',$correct_answer)
                                ->with('cau1',$request->cau1)
                                ->with('cau2',$request->cau2)
                                ->with('cau3',$request->cau3)
                                ->with('cau4',$request->cau4)
                                ->with('cau5',$request->cau5)
                                ->with('cau6',$request->cau6)
                                ->with('cau7',$request->cau7)
                                ->with('cau8',$request->cau8)
                                ->with('cau9',$request->cau9)
                                ->with('cau10',$request->cau10);
    }

    /**
    * 
     */
    public function unit2_text2(Request $request){
        $correct_answer = 1;
        if($request->cau1 == "a")
            $correct_answer++;
        if($request->cau2 == "b")
            $correct_answer++;
        if($request->cau3 == "c")
            $correct_answer++;
        if($request->cau4 == "d")
        $correct_answer++;
        return redirect()->back()->with('success',$correct_answer)
                                ->with('cau1',$request->cau1)
                                ->with('cau2',$request->cau2)
                                ->with('cau3',$request->cau3)
                                ->with('cau4',$request->cau4);
    }

    public function unit2_vocab1(Request $request){
        $correct_answer = 1;
        if($request->cau1 == "g")
            $correct_answer++;
        if($request->cau2 == "a")
            $correct_answer++;
        if($request->cau3 == "d")
            $correct_answer++;
        if($request->cau4 == "f")
        $correct_answer++;
        if($request->cau5 == "b")
            $correct_answer++;
        if($request->cau6 == "e")
            $correct_answer++;
        if($request->cau7 == "c")
            $correct_answer++;
        return redirect()->back()->with('success',$correct_answer)
                                ->with('cau1',$request->cau1)
                                ->with('cau2',$request->cau2)
                                ->with('cau3',$request->cau3)
                                ->with('cau4',$request->cau4)
                                ->with('cau5',$request->cau5)
                                ->with('cau6',$request->cau6)
                                ->with('cau7',$request->cau7);
    }

    /**
    * 
     */
    public function unit3_text1(Request $request){
        $correct_answer = 1;
        if($request->cau1 == "d")
            $correct_answer++;
        if($request->cau2 == "c")
            $correct_answer++;
        if($request->cau3 == "b")
            $correct_answer++;
        if($request->cau4 == "a")
            $correct_answer++;
            if($request->cau5 == "c")
            $correct_answer++;
            if($request->cau6 == "d")
            $correct_answer++;
            if($request->cau7 == "b")
            $correct_answer++;
            if($request->cau8 == "a")
            $correct_answer++;
            if($request->cau9 == "b")
            $correct_answer++;
            if($request->cau10 == "c")
            $correct_answer++;

        return redirect()->back()->with('success',$correct_answer)
                                ->with('cau1',$request->cau1)
                                ->with('cau2',$request->cau2)
                                ->with('cau3',$request->cau3)
                                ->with('cau4',$request->cau4)
                                ->with('cau5',$request->cau5)
                                ->with('cau6',$request->cau6)
                                ->with('cau7',$request->cau7)
                                ->with('cau8',$request->cau8)
                                ->with('cau9',$request->cau9)
                                ->with('cau10',$request->cau10);
    }

    /**
    * 
     */
    public function unit3_text2(Request $request){
        $correct_answer = 1;
        if($request->cau1 == "women" || $request->cau1 == "Women")
            $correct_answer++;
        if($request->cau2 == "knowledge" || $request->cau2 == "Knowledge")
            $correct_answer++;
        if($request->cau3 == "decisions" || $request->cau3 == "Decisions")
            $correct_answer++;
        if($request->cau4 == "Well-paid" || $request->cau4 == "well-paid")
            $correct_answer++;
        if($request->cau5 == "equality" || $request->cau5 == "Equality")
            $correct_answer++;
            

        return redirect()->back()->with('success',$correct_answer)
                                ->with('cau1',$request->cau1)
                                ->with('cau2',$request->cau2)
                                ->with('cau3',$request->cau3)
                                ->with('cau4',$request->cau4)
                                ->with('cau5',$request->cau5);
    }

    
    public function unit3_vocab1(Request $request){
        $correct_answer = 1;
        if($request->cau1 == "H")
            $correct_answer++;
        if($request->cau2 == "F")
            $correct_answer++;
        if($request->cau3 == "G")
            $correct_answer++;
        if($request->cau4 == "E")
        $correct_answer++;
        if($request->cau5 == "A")
            $correct_answer++;
        if($request->cau6 == "C")
            $correct_answer++;
        if($request->cau7 == "J")
            $correct_answer++;
        return redirect()->back()->with('success',$correct_answer)
                                ->with('cau1',$request->cau1)
                                ->with('cau2',$request->cau2)
                                ->with('cau3',$request->cau3)
                                ->with('cau4',$request->cau4)
                                ->with('cau5',$request->cau5)
                                ->with('cau6',$request->cau6)
                                ->with('cau7',$request->cau7);
    }
}
