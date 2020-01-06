@extends('cms.pages.layouts.layout')
@section('content')
<form style="display:contents" method="post" action="{{route('unit3.reading.text1_post')}}">
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
                        Rwanda will soon become the first country (1) ____ the world where female
politicians (2) ____  male politicians. The small central African country has
made huge progress since its (3) ____ genocide in the 1990s. It can now
proudly call itself a beacon of sexual equality. The ruling party coalition won
78% of seats in the election. Women took at (4) ____ 44 out of a total of the
80 seats. Women may still win another three undecided seats. The head of the
country’s election commission stated: “It&#39;s clear women representatives will be
more than 50 per cent.&quot; Since the genocide, the government (5) ____
encouraged women into politics. Many in Rwanda say the election results show
that people are fed (6) ____ with male-dominated politics. They say women
will bring freshness and change to the nation.
                        <br><br>
                        Women’s groups were (7) ____ to praise the government of President Paul
Kagame for promoting such a strong gender equality programme. A female
voter told the BBC’s Focus on Africa show that the new political (8) ____
would help strengthen her country. She explained: &quot;Men, especially in our
culture, used to think that women are there to (9) ____ in the house, cook
food, look after the children... but the real problems of a family are known by
a woman and when they do it, they help a country to get much better.&quot; A local
newspaper editor told the Voice of America website of his new (10) ____ in his
country: “We have really been the first…where the women have broken the
glass ceiling…now it&#39;s like we are enlightened. We are no longer in this
backward sort of thinking,” he said.


                        </div>
                        <div class="pt-5">
                            <h3>STEP 2 - Answer these questions (choose the best answer):</h3>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">1. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau1" @if(session('cau1') == "a") checked="" @endif value="a">  <strong>(a)</strong>  with<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau1" @if(session('cau1') == "b") checked="" @endif value="b">  <strong>(b)</strong>  at<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau1" @if(session('cau1') == "c") checked="" @endif value="c">  <strong>(c)</strong>  on<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau1" @if(session('cau1') == "d") checked="" @endif value="d">  <span class="dapan"><strong>(d)</strong>  in</span><br>
                            </div>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">2. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau2" @if(session('cau2') == "a") checked="" @endif value="a">  <strong>(a)</strong>  numeric<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau2" @if(session('cau2') == "b") checked="" @endif value="b">  <strong>(b)</strong>  numeral<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau2" @if(session('cau2') == "c") checked="" @endif value="c">  <span class="dapan"><strong>(c)</strong>  outnumber</span><br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau2" @if(session('cau2') == "d") checked="" @endif value="d">  <strong>(d)</strong>  numb<br>
                            </div>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">3. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau3" @if(session('cau3') == "a") checked="" @endif  value="a">  <strong>(a)</strong>  tragedy<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau3" @if(session('cau3') == "b") checked="" @endif value="b">  <span class="dapan"><strong>(b)</strong>  tragic</span><br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau3" @if(session('cau3') == "c") checked="" @endif value="c">  <strong>(c)</strong>  tragically<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau3" @if(session('cau3') == "d") checked="" @endif value="d">  <strong>(d)</strong>  tragedies<br>
                            </div>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">4. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau4" @if(session('cau4') == "a") checked="" @endif value="a">  <span class="dapan"><strong>(a)</strong>  least</span><br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau4" @if(session('cau4') == "b") checked="" @endif value="b">  <strong>(b)</strong>  lost<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau4" @if(session('cau4') == "c") checked="" @endif value="c">  <strong>(c)</strong>  last<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau4" @if(session('cau4') == "d") checked="" @endif value="d">  <strong>(d)</strong>  lest<br>
                            </div>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">5. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau5" @if(session('cau5') == "a") checked="" @endif value="a">  <strong>(a)</strong>  did<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau5" @if(session('cau5') == "b") checked="" @endif value="b">  <strong>(b)</strong>  was<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau5" @if(session('cau5') == "c") checked="" @endif value="c">  <span class="dapan"><strong>(c)</strong>  has</span><br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau5" @if(session('cau5') == "d") checked="" @endif value="d">  <strong>(d)</strong>  would<br>
                            </div>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">6. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau6" @if(session('cau6') == "a") checked="" @endif value="a">  <strong>(a)</strong>  out<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau6" @if(session('cau6') == "b") checked="" @endif value="b">  <strong>(b)</strong>  in<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau6" @if(session('cau6') == "c") checked="" @endif value="c">  <strong>(c)</strong>  down<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau6" @if(session('cau6') == "d") checked="" @endif value="d">  <span class="dapan"><strong>(d)</strong>  up</span><br>
                            </div>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">7. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau7" @if(session('cau7') == "a") checked="" @endif value="a">  <strong>(a)</strong>  quicken<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau7" @if(session('cau7') == "b") checked="" @endif value="b">  <span class="dapan"><strong>(b)</strong>  quick</span><br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau7" @if(session('cau7') == "c") checked="" @endif value="c">  <strong>(c)</strong>  quickly<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau7" @if(session('cau7') == "d") checked="" @endif value="d">  <strong>(d)</strong>  quickness<br>
                            </div>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">8. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau8" @if(session('cau8') == "a") checked="" @endif value="a">  <span class="dapan"><strong>(a)</strong>  landscape</span><br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau8" @if(session('cau8') == "b") checked="" @endif value="b">  <strong>(b)</strong>  seascape<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau8" @if(session('cau8') == "c") checked="" @endif value="c">  <strong>(c)</strong>  cityscape<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau8" @if(session('cau8') == "d") checked="" @endif value="d">  <strong>(d)</strong>  moonscape<br>
                            </div>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">9. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau9" @if(session('cau9') == "a") checked="" @endif value="a">  <strong>(a)</strong>  do<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau9" @if(session('cau9') == "b") checked="" @endif value="b">  <span class="dapan"><strong>(b)</strong>  be</span><br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau9" @if(session('cau9') == "c") checked="" @endif value="c">  <strong>(c)</strong>  have<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau9" @if(session('cau9') == "d") checked="" @endif value="d">  <strong>(d)</strong>  been<br>
                            </div>
                        </div>

                        <div class="pt-2 row">
                            <h4 class="col-2" style="max-width:8%">10. </h4>
                            <div class="col-2">
                            <input type="radio" name="cau10" @if(session('cau10') == "a") checked="" @endif value="a">  <strong>(a)</strong>  proudly<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau10" @if(session('cau10') == "b") checked="" @endif value="b">  <strong>(b)</strong>  proud<br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau10" @if(session('cau10') == "c") checked="" @endif value="c">  <span class="dapan"><strong>(c)</strong>  pride</span><br>
                            </div>
                            <div class="col-2">
                            <input type="radio" name="cau10" @if(session('cau10') == "d") checked="" @endif value="d">  <strong>(d)</strong>  praise<br>
                            </div>
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
                                <a class="btn btn-icon btn-primary" href="{{route('unit2.vocabulary.vocab1')}}" type="button">
                                    <span class="btn-inner--icon"><i style="color:white;" class="ni ni-bold-left"></i></span>
                                    <span style="color:white;" class="btn-inner--text">Previous</span>
                                </a>
                                <a class="btn btn-icon btn-primary" href="{{route('unit3.reading.text2')}}" type="button">
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
@endsection
@section('script')
@if(session('success'))
@php $temp = session('success');$temp--; @endphp
<script>
Swal.fire({
  title: '<strong>Thông tin</strong>',
  icon: 'info',
  html:
    'Bạn đã trả lời đúng <b>{{$temp}}</b>/<b>10</b>',
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