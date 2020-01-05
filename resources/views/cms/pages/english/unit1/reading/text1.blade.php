@extends('cms.pages.layouts.layout')
@section('content')
<form style="display:contents" method="post" action="{{route('unit1.reading.text1_post')}}">
@csrf 
<div class="container">
        <div class="row" style="padding: 10px">
           <div class="col-12">
            <div class="card">
                    <div class="card-header">
                        <h1>STEP 1 - Read the following article:</h1>
                    </div>
                    <div class="card-body">
                        <div>
                        The world's oceans have warmed 50 percent faster over the last 40 years than previously thought due to climate change, Australian and US climate researchers reported Wednesday. Higher ocean temperatures expand the volume of water, contributing to a rise in sea levels that is submerging small island nations and threatening to wreak havoc in low-lying, densely-populated delta regions around the globe.

The study, published in the British journal Nature, adds to a growing scientific chorus of warnings about the pace and consequences rising oceans. It also serves as a corrective to a massive report issued last year by the Nobel-winning UN Intergovernmental Panel on Climate Change (IPCC), according to the authors.

Rising sea levels are driven by two things: the thermal expansion of sea water, and additional water from melting sources of ice. Both processes are caused by global warming. The ice sheet that sits atop Greenland, for example, contains enough water to raise world ocean levels by seven metres (23 feet), which would bury sea-level cities from Dhaka to Shanghai.

Trying to figure out how much each of these factors contributes to rising sea levels is critically important to understanding climate change, and forecasting future temperature rises, scientists say. But up to now, there has been a perplexing gap between the projections of computer-based climate models, and the observations of scientists gathering data from the oceans.

The new study, led by Catia Domingues of the Centre for Australian Weather and Climate Research, is the first to reconcile the models with observed data. Using new techniques to assess ocean temperatures to a depth of 700 metres (2,300 feet) from 1961 to 2003, it shows that thermal warming contributed to a 0.53 millimetre-per-year rise in sea levels rather than the 0.32 mm rise reported by the IPCC.

                        </div>
                        <div class="pt-5">
                            <h3>STEP 2 - Answer these questions (choose the best answer):</h3>
                        </div>

                        <div class="pt-2">
                            <h4>1. What happens when the ocean's temperature rises?</h4>
                            <input type="radio" name="cau1" @if(session('cau1') == "a") checked="" @endif value="a">  <span class="dapan">It causes sea levels to rise.</span><br>
                            <input type="radio" name="cau1" @if(session('cau1') == "b") checked="" @endif  value="b">  It causes sea levels to remain constant<br>
                            <input type="radio" name="cau1" @if(session('cau1') == "c") checked="" @endif  value="c">  It causes sea levels to decrease.
                        </div>

                        <div class="pt-2">
                            <h4>2. The rise in water levels is especially dangerous for small island nations and:</h4>
                            <input type="radio" name="cau2" @if(session('cau2') == "a") checked="" @endif  value="a">   <span class="dapan">Low-lying urban areas.</span><br>
                            <input type="radio" name="cau2" @if(session('cau2') == "b") checked="" @endif  value="b">  All coastal cities.<br>
                            <input type="radio" name="cau2" @if(session('cau2') == "c") checked="" @endif  value="c">  People who live on the beach.
                        </div>

                        <div class="pt-2">
                            <h4>3. The new study:</h4>
                            <input type="radio" name="cau3" @if(session('cau3') == "a") checked="" @endif  value="a">   Shows that thermal warming contributed to a 0.32 millimeter-per-year rise in sea levels.<br>
                            <input type="radio" name="cau3" @if(session('cau3') == "b") checked="" @endif  value="b">  Did not reveal anything that scientists didn't already know.<br>
                            <input type="radio" name="cau3" @if(session('cau3') == "c") checked="" @endif  value="c">  <span class="dapan">Used new techniques to assess ocean temperatures.</span>
                        </div>

                        <div class="pt-2">
                            <h4>4. Ultimately, the new study should help scientists to:</h4>
                            <input type="radio" name="cau4" @if(session('cau4') == "a") checked="" @endif value="a">   Lower water levels.<br>
                            <input type="radio" name="cau4" @if(session('cau4') == "b") checked="" @endif value="b">  <span class="dapan">Better predict climate change.</span><br>
                            <input type="radio" name="cau4" @if(session('cau4') == "c") checked="" @endif value="c">  Bury sea-level cities like Dhaka and Shanghai.
                        </div>

                        <div class="pt-2">
                            <h4>5. What was the main finding of the study?</h4>
                            <input type="radio" name="cau5" @if(session('cau5') == "a") checked="" @endif value="a">   That not enough is being done about global warming.<br>
                            <input type="radio" name="cau5" @if(session('cau5') == "b") checked="" @endif value="b">  <span class="dapan">That ocean waters have warmed faster than scientists had previously thought.</span><br>
                            <input type="radio" name="cau5" @if(session('cau5') == "c") checked="" @endif value="c">  That the warming of the world's oceans is not a threat.
                        </div>
                        <div class="pb-3"></div>
                        <div class="row pt-4 pb-2">
                            <div class="col-4">
                            <button class="btn btn-icon btn-secondary" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                <span class="btn-inner--text">Check done</span>
                            </button>
                            </div>
                            <div class="col-4 text-center"></div>
                            <div class="col-4">
                                <div class="d-flex" style="justify-content: flex-end;">
                                <a class="btn btn-icon btn-primary" href="{{route('unit1.reading.text2')}}" type="button">
                                    <span style="color:white;" class="btn-inner--text">Next</span>
                                    <span class="btn-inner--icon"><i style="color:white;" class="ni ni-bold-right"></i></span>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
            
            <!--row-->
        </div>
</form>
@endsection
@section('script')
@if(session('success'))
@php $temp = session('success');$temp--; @endphp
<script>
Swal.fire({
  title: '<strong>Thông tin</strong>',
  icon: 'info',
  html:
    'Bạn đã trả lời đúng <b>{{$temp}}</b>/<b>5</b>',
  showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  confirmButtonText:
    'Xem đáp án !',
  confirmButtonAriaLabel: 'Thumbs up, great!',
  cancelButtonText:
    'Trả lời lại !',
  cancelButtonAriaLabel: 'Thumbs down'
}).then((result) => {
  if (result.value) {
    $('.dapan').css("color","red");
  }
})
</script>
@endif
@endsection