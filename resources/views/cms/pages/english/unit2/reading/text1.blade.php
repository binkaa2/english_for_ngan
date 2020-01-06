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
                        The World Wildlife Fund (WWF) has issued a stark warning about the future of the world's natural World Heritage sites. It says half of the sites are at risk from different industries. The WWF warned that harmful industrial activities such as mining, dredging or drilling for oil are endangering the future of 114 of 229 sites. Other factors adding to the risk include illegal logging and unsustainable water use. All of these are in addition to the damage being done by climate change. The WWF says the sites affected include Australia's Great Barrier Reef, the Grand Canyon National Park in the USA, and China's Sichuan Giant Panda Sanctuaries, which are home to more than 30 percent of the world's endangered pandas.
                        <br><br>
                        The director of the UNESCO World Heritage Centre said it was up to everyone to protect these sites. She said: "World Heritage is humankind's common heritage, and the responsibility for its conservation is shared by everyone." She welcomed government efforts at reducing what they take from the Earth, saying: "The WWF's report comes at a time when governments and the private sector around the world are stepping up their action against harmful extractive uses." However, the WWF said that more than 11 million people worldwide rely on World Heritage sites for food, water, shelter, jobs and medicine, and that non-stop development could harm livelihoods as well as the environment.


                        </div>
                        <div class="pt-5">
                            <h3>STEP 2 - Answer these questions (choose the best answer):</h3>
                        </div>

                        <div class="pt-2">
                            <h4>1. What kind of warning did the WWF issue?</h4>
                            <input type="radio" name="cau1" @if(session('cau1') == "a") checked="" @endif value="a">  <strong>A</strong> <span class="dapan">a stark one</span><br>
                            <input type="radio" name="cau1" @if(session('cau1') == "b") checked="" @endif value="b">  <strong>B</strong> one for storks<br>
                            <input type="radio" name="cau1" @if(session('cau1') == "c") checked="" @endif value="c">  <strong>C</strong> a gentle one<br>
                            <input type="radio" name="cau1" @if(session('cau1') == "d") checked="" @endif value="d">  <strong>D</strong> a long one
                        </div>

                        <div class="pt-2">
                            <h4>2. How many of 229 sites did the WWF say were at risk?</h4>
                            <input type="radio" name="cau2" @if(session('cau2') == "a") checked="" @endif value="a">  <strong>A</strong> 112<br>
                            <input type="radio" name="cau2" @if(session('cau2') == "b") checked="" @endif value="b">  <strong>B</strong> 113<br>
                            <input type="radio" name="cau2" @if(session('cau2') == "c") checked="" @endif value="c">  <strong>C</strong> <span class="dapan">114</span><br>
                            <input type="radio" name="cau2" @if(session('cau3') == "d") checked="" @endif value="d">  <strong>D</strong> 115
                        </div>

                        <div class="pt-2">
                            <h4>3. What illegal activity was mentioned in the article?</h4>
                            <input type="radio" name="cau3" @if(session('cau3') == "a") checked="" @endif value="a">  <strong>A</strong> hunting<br>
                            <input type="radio" name="cau3" @if(session('cau3') == "b") checked="" @endif value="b">  <strong>B</strong> the rhino horn trade<br>
                            <input type="radio" name="cau3" @if(session('cau3') == "c") checked="" @endif value="c">  <strong>C</strong> human trafficking<br>
                            <input type="radio" name="cau3" @if(session('cau3') == "d") checked="" @endif value="d">  <strong>D</strong> <span class="dapan">logging</span>
                        </div>

                        <div class="pt-2">
                            <h4>4. What additional factor is damaging the World Heritage sites?</h4>
                            <input type="radio" @if(session('cau4') == "a") checked="" @endif name="cau4" value="a">  <strong>A</strong> tourism<br>
                            <input type="radio" @if(session('cau4') == "b") checked="" @endif name="cau4" value="b">  <strong>B</strong> <span class="dapan">climate change</span><br>
                            <input type="radio" @if(session('cau4') == "c") checked="" @endif name="cau4" value="c">  <strong>C</strong> money<br>
                            <input type="radio" @if(session('cau1') == "d") checked="" @endif name="cau4" value="d">  <strong>D</strong> a lack of investment
                        </div>

                        <div class="pt-2">
                            <h4>5. What percentage of endangered pandas are in Sichuan?</h4>
                            <input type="radio" @if(session('cau5') == "a") checked="" @endif name="cau5" value="a">  <strong>A</strong> <span class="dapan">more than 30%</span><br>
                            <input type="radio" @if(session('cau5') == "b") checked="" @endif name="cau5" value="b">  <strong>B</strong> exactly 30%<br>
                            <input type="radio" @if(session('cau5') == "c") checked="" @endif name="cau5" value="c">  <strong>C</strong> around 30%<br>
                            <input type="radio" @if(session('cau5') == "d") checked="" @endif name="cau5" value="d">  <strong>D</strong> less than 30%
                        </div>

                        <div class="pt-2">
                            <h4>6. Who did a UNESCO director say had to protect the sites?</h4>
                            <input type="radio" @if(session('cau6') == "a") checked="" @endif name="cau6" value="a">  <strong>A</strong> the WWF<br>
                            <input type="radio" @if(session('cau6') == "b") checked="" @endif name="cau6" value="b">  <strong>B</strong> tourists<br>
                            <input type="radio" @if(session('cau6') == "c") checked="" @endif name="cau6" value="c">  <strong>C</strong> pandas<br>
                            <input type="radio" @if(session('cau6') == "d") checked="" @endif name="cau6" value="d">  <strong>D</strong> <span class="dapan">everyone</span>
                        </div>
                        
                        <div class="pt-2">
                            <h4>7. Whose efforts did a UNESCO welcome?</h4>
                            <input type="radio" @if(session('cau7') == "a") checked="" @endif name="cau7" value="a">  <strong>A</strong> a director's<br>
                            <input type="radio" @if(session('cau7') == "b") checked="" @endif name="cau7" value="b">  <strong>B</strong> pandas<br>
                            <input type="radio" @if(session('cau7') == "c") checked="" @endif name="cau7" value="c">  <strong>C</strong> <span class="dapan">government efforts</span><br>
                            <input type="radio" @if(session('cau7') == "d") checked="" @endif name="cau7" value="d">  <strong>D</strong> the WWF's
                        </div>

                        <div class="pt-2">
                            <h4>8. What are governments stepping up their actions against?</h4>
                            <input type="radio" @if(session('cau8') == "a") checked="" @endif name="cau8" value="a">  <strong>A</strong> human traffickers<br>
                            <input type="radio" @if(session('cau8') == "b") checked="" @endif name="cau8" value="b">  <strong>B</strong> <span class="dapan">harmful extractive uses</span><br>
                            <input type="radio" @if(session('cau8') == "c") checked="" @endif name="cau8" value="c">  <strong>C</strong> pandas<br>
                            <input type="radio" @if(session('cau8') == "d") checked="" @endif name="cau8" value="d">  <strong>D</strong> investment
                        </div>

                        <div class="pt-2">
                            <h4>9. How many people rely on World Heritage sites for food, etc.?</h4>
                            <input type="radio" @if(session('cau9') == "a") checked="" @endif name="cau9" value="a">  <strong>A</strong> about 11 million<br>
                            <input type="radio" @if(session('cau9') == "b") checked="" @endif name="cau9" value="b">  <strong>B</strong> less than 11 million<br>
                            <input type="radio" @if(session('cau9') == "c") checked="" @endif name="cau9" value="c">  <strong>C</strong> <span class="dapan">over 11 million</span><br>
                            <input type="radio" @if(session('cau9') == "d") checked="" @endif name="cau9" value="d">  <strong>D</strong> exactly 11 million
                        </div>

                        <div class="pt-2">
                            <h4>10. What could harm the livelihoods of people living on or near the sites?</h4>
                            <input type="radio" @if(session('cau10') == "a") checked="" @endif name="cau10" value="a">  <strong>A</strong> the weather<br>
                            <input type="radio" @if(session('cau11') == "b") checked="" @endif name="cau10" value="b">  <strong>B</strong> <span class="dapan">non-stop development</span><br>
                            <input type="radio" @if(session('cau12') == "c") checked="" @endif name="cau10" value="c">  <strong>C</strong> cars<br>
                            <input type="radio" @if(session('cau13') == "d") checked="" @endif name="cau10" value="d">  <strong>D</strong> pandas
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
                                <a class="btn btn-icon btn-primary" href="{{route('unit1.vocabulary.vocab1')}}" type="button">
                                    <span class="btn-inner--icon"><i style="color:white;" class="ni ni-bold-left"></i></span>
                                    <span style="color:white;" class="btn-inner--text">Previous</span>
                                </a>
                                <a class="btn btn-icon btn-primary" href="{{route('unit2.reading.text2')}}" type="button">
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