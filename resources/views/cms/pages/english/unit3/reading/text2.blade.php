@extends('cms.pages.layouts.layout')
@section('content')
<form style="display:contents" method="post" action="{{route('unit3.reading.text2_post')}}">
@csrf
<div class="container">
        <div class="row" style="padding: 10px">
           <div class="col-12">
            <div class="card">
                    <div class="card-header">
                        <h1>STEP 1 - Read the text about Education and Gender Equality. Fill the blank with an appropriate word from the box:</h1>
                    </div>
                    <div class="card-body">
                        <div>
                            <strong>a.</strong> Equality<br>
                            <strong>b.</strong> Well-paid<br>
                            <strong>c.</strong> Knowledge<br>
                            <strong>d.</strong> Decisions<br>
                            <strong>e.</strong> Women<br>
                        </div>

                        <div class="pt-3">
                            <div>
                                Education helps <input type="text" name="cau1" id="cau1" value="{{session('cau1')}}" /> win equality.
                            </div>
                            <div class="pt-1">
                                First, education gives women knowledge necessary for their lives. It is impossible for a women to be a doctor, a teacher or a
                                laywer without adequate <input type="text" name="cau2" id="cau2" value="{{session('cau2')}}" /> Education realises women’s dreams of having jobs with the same pay as men.
                            </div>
                            <div class="pt-1">
                                Second, education shapes women’s character. It teaches them about life and develops their abilities to think, analyses and
                                judge. Women with strong characters often make <input name="cau3" id="cau3" value="{{session('cau3')}}" type="text" /> about their own lives without being dependent on their
                                husbands.
                            </div>
                            <div class="pt-1">
                                Finally, education improves women’s position both at home and in society. Educated women are more likely to get <input name="cau4" id="cau4" value="{{session('cau4')}}" style="width:120px;" type="text"/>
                                jobs, earn more money and become more important at home. They can join political activities and gain important positions as
                            leaders, policy makers or politicians.
                            </div>
                            <div class="pt-1">
                            So we can clearly see, education enables women to achieve <input type="text" name="cau5" id="cau5" value="{{session('cau5')}}" />
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
                                <a class="btn btn-icon btn-primary" href="{{route('unit3.reading.text1')}}" type="button">
                                    <span class="btn-inner--icon"><i style="color:white;" class="ni ni-bold-left"></i></span>
                                    <span style="color:white;" class="btn-inner--text">Previous</span>
                                </a>
                                <a class="btn btn-icon btn-primary" href="{{route('unit3.vocabulary.vocab1')}}" type="button">
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
    $('#cau1').val("women")
    $('#cau2').val("knowledge")
    $('#cau3').val("decisions")
    $('#cau4').val("well-paid")
    $('#cau5').val("equality")
  }
})
</script>
@endif
@endsection