@extends('cms.pages.layouts.layout')
@section('content')
<form style="display:contents" method="post" action="{{route('unit1.reading.text3_post')}}">
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
                        It is a common belief that adults are responsible for ‘big issues’ such as environmental protection and conservation, and youths can do nothing but focus on their studies or have fun. However, the stories of the young people in the Young Voices for the Planet show that even at a young age, people are able to do something for their communities and can really contribute to the care and preservation of the environment. Kids can also do things to make a difference, given the chance. And though their skills and talents may vary, they can use their unique gifts to help to preserve the environment and save the world. One of the children in the stories, Olivia, says:
                        <br>
                        <br>
                        ‘Every one of us has a great gift we can use to help the earth. Everyone, at any age, can do something, whether it is picking up rubbish along the side of the road, ﬁlling a bird feeder, or bringing reusable bags to the grocery store. For me, I used my artwork. Find your cause and use your talents. The quality of our world is counting on you.’
<br>
<br>
It is remarkable that someone as young as Olivia can understand so well the connection between society, the environment, and the problems we are facing today. It has been proved that every small act of kindness we show can make a great impact on the world around us.
<br>
<br>
For some people, environmental protection and conservation means stopping the growth and development of technology and society. But this is a popular belief that is not true. Protecting the environment isn’t about stopping progress. It’s about changing our consumption habits and taking care of the environment. Just by doing simple things, every one of us including the youths can do their share in making this world a better place to live.
<br>
<br>

                        </div>
                        <div class="pt-5" style="margin-bottom: 0;
                                            padding-bottom: 1.25rem;
                                            border-bottom: 1px solid rgba(0,0,0,.05);
                                            background-color: #fff;">
                            <h1>STEP 2 - Write down these answers :</h1>
                        </div>
                        <div class="pt-2">
                            <h4>1. What do most people believe?</h4>
                            <br>
                            <textarea class="form-control" name="cau1" id="cau1" rows="3" resize="none">{{session('cau1')}}</textarea>
                        </div>

                        <div class="pt-2">
                            <h4>2. What do the stories of the young people in the Young Voices for the Planet show?</h4>
                            <textarea class="form-control" name="cau2" id="cau2" rows="3" resize="none">{{session('cau2')}}</textarea>
                        </div>

                        <div class="pt-2">
                            <h4>3. According to Olivia, what are the things that people can do to help the earth?</h4>
                            <textarea class="form-control" name="cau3" id="cau3" rows="3" resize="none">{{session('cau3')}}</textarea>
                        </div>

                        <div class="pt-2">
                            <h4>4. What talent did Olivia use to help the environment?</h4>
                            <textarea class="form-control" name="cau4" id="cau4" rows="3" resize="none">{{session('cau4')}}</textarea>
                        </div>

                        <div class="pt-2">
                            <h4>5. What does the writer find extraordinary and unusual about Olivia?</h4>
                            <textarea class="form-control" name="cau5" id="cau5" rows="3" resize="none">{{session('cau5')}}</textarea>
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
                                <div class="d-flex" style="justify-content: space-around;">
                                <a class="btn btn-icon btn-primary" href="{{route('unit1.reading.text2')}}" type="button">
                                    <span class="btn-inner--icon"><i style="color:white;" class="ni ni-bold-left"></i></span>
                                    <span style="color:white;" class="btn-inner--text">Previous</span>
                                </a>
                                <a class="btn btn-icon btn-primary"  href="{{route('unit1.vocabulary.vocab1')}}" type="button">
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
    'Cảm ơn đã nhập câu trả lời,xin vui lòng chờ để chúng tôi có thể xem xét câu trả lời của bạn!',
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
    $('#cau1').val('Most people believe that adults are responsible for ‘big issues’ such as environmental protection and conservation.');
    $('#cau2').val('Even at a young age, people can do something for their communities and can really contribute to the care and preservation of the environment.');
    $('#cau3').val('Picking up rubbish along the side of the road, filling a bird feeder, or bringing reusable bags to the grocery store.')
    $('#cau4').val('Her artistic talent / her talent for artwork.')
    $('#cau5').val('Her understanding of the connection between society, the environment, and the problems we are facing today.')
  }
})
</script>
@endif
@endsection