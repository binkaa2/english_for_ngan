@extends('cms.pages.layouts.layout')
@section('content')
<form style="display:contents" method="post" action="{{route('unit2.reading.text2_post')}}">
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
                        UNESCO to the Rescue
                        <br><br>
                        <strong>Without someone protecting the world's interesting and ancient sites, they could easily be swept away by the changing world.</strong>
                        <br><br>
                        In 1959, the government of Egypt was working on a plan to build a dam on the River Nile. It was called the Aswan Dam, and it was intended to generate electricity and allow the river water to be used for agriculture. There was one big problem with the plan, though. The dam would flood a nearby valley that contained ancient Egyptian treasures, including two enormous stone temples.
                        <br><br>
                        It can be difficult for governments to choose culture and history over economics. However, if countries always made decisions like this, the majority of the world's ancient sites would end up being destroyed. Luckily, UNESCO stepped in. They formed a committee that tried to convince Egypt to protect its ancient treasures. With support from many countries, they were finally successful. The huge temples were carefully removed from their original site and moved to a safe location so that the dam could be built.
                        <br><br>
                        UNESCO is an agency of the United Nations. The United Nations is a partnership between countries from all over the world. They are joined to help promote world peace, enforce human rights, and help countries develop. UNESCO is a part of the United Nations that is concerned with science and culture.
                        <br><br>
                        After their success in saving the temples in Egypt, UNESCO went on to save more sites around the world. They protected lagoons in Venice, ruins in Pakistan, and temples in Indonesia. With industrialization changing the world rapidly, there were many sites that needed to be saved. Eventually, UNESCO formed the World Heritage Organization to protect important natural and historic sites wherever it was necessary.
                        <br><br>
                        By now, the World Heritage Organization has protected hundreds of sites ranging from beautiful natural islands to buildings in large cities to ancient ruins. If you're able to visit any of the many protected sites, you'll agree it was worth it.
                        
                        </div>
                        <div class="pt-5">
                            <h3>STEP 2 - Answer these questions (choose the best answer):</h3>
                        </div>

                        <div class="pt-2">
                            <h4>1. Why did UNESCO get involved in Egypt?</h4>
                            <input type="radio" name="cau1" @if(session('cau1') == "a") checked="" @endif value="a">  <strong>A</strong> <span class="dapan">Egypt was planning to build a dam that would harm ancient temples.</span><br>
                            <input type="radio" name="cau1" @if(session('cau1') == "b") checked="" @endif value="b">  <strong>B</strong> Egypt was planning to build a valley for agriculture and electricity.<br>
                            <input type="radio" name="cau1" @if(session('cau1') == "c") checked="" @endif value="c">  <strong>C</strong> Egypt was planning to create a dam right on top of an ancient temple.<br>
                            <input type="radio" name="cau1" @if(session('cau1') == "d") checked="" @endif value="d">  <strong>D</strong> When the dam flooded a valley, several treasures were discovered.
                        </div>

                        <div class="pt-2">
                            <h4>2. What is meant by the first sentence of the second paragraph?</h4>
                            <input type="radio" name="cau2" @if(session('cau2') == "a") checked="" @endif value="a">  <strong>A</strong> Most governments prefer to sell their treasures.<br>
                            <input type="radio" name="cau2" @if(session('cau2') == "b") checked="" @endif value="b">  <strong>B</strong> <span class="dapan">Money sometimes seems more important than all other things.</span><br>
                            <input type="radio" name="cau2" @if(session('cau2') == "c") checked="" @endif value="c">  <strong>C</strong> Governments are never able to consider two things at once.<br>
                            <input type="radio" name="cau2" @if(session('cau2') == "d") checked="" @endif value="d">  <strong>D</strong> Governments usually don't know anything about their culture.
                        </div>

                        <div class="pt-2">
                            <h4>3. The United Nations would probably not be involved in <strong>_____</strong></h4>
                            <input type="radio" name="cau3" @if(session('cau3') == "a") checked="" @endif  value="a">  <strong>A</strong> helping a poor country improve its agriculture.<br>
                            <input type="radio" name="cau3" @if(session('cau3') == "b") checked="" @endif  value="b">  <strong>B</strong> trying to solve a violent conflict between two nations.<br>
                            <input type="radio" name="cau3" @if(session('cau3') == "c") checked="" @endif  value="c">  <strong>C</strong> <span class="dapan">developing a new spacecraft for travel to the moon.</span><br>
                            <input type="radio" name="cau3" @if(session('cau3') == "d") checked="" @endif  value="d">  <strong>D</strong> protesting against the killing of the tribes people of a country.
                        </div>

                        <div class="pt-2">
                            <h4>4. Why is the World Heritage Organization more important now than it would have been 200 years ago?</h4>
                            <input type="radio" name="cau4" @if(session('cau4') == "a") checked="" @endif  value="a">  <strong>A</strong> Countries didn't cooperate in the past.<br>
                            <input type="radio" name="cau4" @if(session('cau4') == "b") checked="" @endif  value="b">  <strong>B</strong> Cities were smaller back then.<br>
                            <input type="radio" name="cau4" @if(session('cau4') == "c") checked="" @endif  value="c">  <strong>C</strong> There were not as many interesting sites 200 years ago.<br>
                            <input type="radio" name="cau4" @if(session('cau4') == "d") checked="" @endif  value="d">  <strong>D</strong> <span class="dapan">Modern business and production are changing the world.</span>
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
                                <a class="btn btn-icon btn-primary" href="{{route('unit2.reading.text1')}}" type="button">
                                    <span class="btn-inner--icon"><i style="color:white;" class="ni ni-bold-left"></i></span>
                                    <span style="color:white;" class="btn-inner--text">Previous</span>
                                </a>
                                <a class="btn btn-icon btn-primary" href="{{route('unit2.vocabulary.vocab1')}}" type="button">
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
    'Bạn đã trả lời đúng <b>{{$temp}}</b>/<b>4</b>',
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