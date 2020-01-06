@extends('cms.pages.layouts.layout')
@section('content')
<form style="display:contents" method="post" action="{{route('unit1.vocabulary.vocab1_post')}}">
@csrf
<div class="container">
    <div class="row" style="padding: 10px">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>WORD LIST</h1>
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Vocabulary</th>
                                        <th>Pronounce</th>
                                        <th>Definitions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            catastrophic
                                        </td>
                                        <td>
                                            /ˌkætəˈstrɒfɪk/
                                        </td>
                                        <td>
                                            Thảm họa, thê thảm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            diversity
                                        </td>
                                        <td>
                                            /daɪˈvɜːsəti/
                                        </td>
                                        <td>
                                            đa dạng
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            absorb
                                        </td>
                                        <td>
                                            /əbˈzɔːb/
                                        </td>
                                        <td>
                                            hấp thụ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            emission
                                        </td>
                                        <td>
                                            /ɪˈmɪʃn/
                                        </td>
                                        <td>
                                            sự thải ra
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            capture
                                        </td>
                                        <td>
                                            /ˈkæptʃə(r)/
                                        </td>
                                        <td>
                                            bắt giữ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            famine
                                        </td>
                                        <td>
                                            /ˈkæptʃə(r)/
                                        </td>
                                        <td>
                                            nạn đói kém
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="pt-5" style="margin-bottom: 0;
                                            padding-bottom: 1.25rem;
                                            border-bottom: 1px solid rgba(0,0,0,.05);
                                            background-color: #fff;">
                        <h1>Exercise 1: Use the words / phrases from the box to complete the sentences:</h1>
                    </div>

                    <div class="row pt-3">
                        <div class="col-4">
                            <h4>greenhouse gases</h4>
                        </div>
                        <div class="col-4">
                            <h4> heat-related </h4>
                        </div>
                        <div class="col-4">
                            <h4> catastrophic </h4>
                        </div>
                        <div class="col-4">
                            <h4> capture </h4>
                        </div>
                        <div class="col-4">
                            <h4> diversity</h4>
                        </div>
                        <div class="col-4">
                            <h4> ecological balance</h4>
                        </div>
                        <div class="col-12">
                            <h4> vehicle emissions</h4>
                        </div>
                    </div>

                    <div class="pt-2">
                        <strong>Example</strong>: The government must take measures to cut <strong
                            style="text-decoration: underline;">vehicle emissions</strong>.
                    </div>

                    <div class="pt-3">
                        <strong>1.</strong> The effects of climate change on humans and nature are <input type="text" id="cau1" name="cau1" value="{{session('cau1')}}" />
                        . <br>
                        <strong>2.</strong> We need to preserve the <input name="cau2" value="{{session('cau2')}}" id="cau2" type="text" /> of wildlife because each
                        species has an important role to play. <br>
                        <strong>3.</strong> The increase in the earth’s temperature can cause <input name="cau3" id="cau3" value="{{session('cau3')}}" type="text" />
                        illnesses which can be dangerous to people. <br>
                        <strong>4.</strong> Carbon dioxide is one of the primary <input name="cau4" value="{{session('cau4')}}"  id="cau4" type="text" /> that cause global
                        warming. <br>
                        <strong>5.</strong> Planting trees can contribute to reducing global warming as trees <input
                            type="text" name="cau5" id="cau5" value="{{session('cau5')}}" /> and absorb CO2 in the air. <br>
                        <strong>6.</strong> Climate change may lead to the extinction of many species and upset the
                        <input type="text" name="cau6" id="cau6" value="{{session('cau6')}}" /> . <br>
                    </div>

                    <div class="pt-5" style="margin-bottom: 0;
                                            padding-bottom: 1.25rem;
                                            border-bottom: 1px solid rgba(0,0,0,.05);
                                            background-color: #fff;">
                        <h1>Exercise 2: Match a verb in column A with a word or phrase in column B</h1>
                    </div>

                    <div class="pt-3">
                        <div class="row">
                            <div class="col-md-12"
                                style="display: flex;justify-content: space-between;padding-left:5rem;padding-right:5rem;">
                                <p><strong>1.</strong> raise</p>
                                <p><strong>a.</strong> famine</p>
                            </div>
                            <div class="col-md-12"
                                style="display: flex;justify-content: space-between;padding-left:5rem;padding-right:5rem;">
                                <p><strong>2.</strong> start</p>
                                <p><strong>b.</strong> awareness</p>
                            </div>
                            <div class="col-md-12"
                                style="display: flex;justify-content: space-between;padding-left:5rem;padding-right:5rem;">
                                <p><strong>3.</strong> upset</p>
                                <p><strong>c.</strong> carbon dioxide</p>
                            </div>
                            <div class="col-md-12"
                                style="display: flex;justify-content: space-between;padding-left:5rem;padding-right:5rem;">
                                <p><strong>4.</strong> reduce</p>
                                <p><strong>d.</strong> a clean-up campaign</p>
                            </div>
                            <div class="col-md-12"
                                style="display: flex;justify-content: space-between;padding-left:5rem;padding-right:5rem;">
                                <p><strong>5.</strong> absorb</p>
                                <p><strong>e.</strong> carbon footprint</p>
                            </div>
                            <div class="col-md-12"
                                style="display: flex;justify-content: space-between;padding-left:5rem;padding-right:5rem;">
                                <p><strong>6.</strong> lead to</p>
                                <p><strong>e.</strong> ecological balance</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3 d-flex" style="    justify-content: space-between;">
                        <div class="d-flex">
                            <span><strong>1</strong> -  </span>
                            <input width="30px" name="cau1e2" id="cau1e2" value="{{session('cau1e2')}}"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>2</strong> -  </span>
                            <input width="30px" name="cau2e2" id="cau2e2" value="{{session('cau2e2')}}"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>3</strong> -  </span>
                            <input width="30px" name="cau3e2" id="cau3e2" value="{{session('cau3e2')}}" style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>4</strong> -  </span>
                            <input width="30px" name="cau4e2" id="cau4e2" value="{{session('cau4e2')}}"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>5</strong> -  </span>
                            <input width="30px" name="cau5e2" id="cau5e2" value="{{session('cau5e2')}}"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>6</strong> -  </span>
                            <input width="30px" name="cau6e2" id="cau6e2" value="{{session('cau6e2')}}"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                    </div>
                    <div class="pb-5"></div>
                        <div class="row pt-4 pb-4">
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
                                <a class="btn btn-icon btn-primary" type="button">
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
    'Bạn đã trả lời đúng <b>{{$temp}}</b>/<b>12</b>',
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
    $('#cau1').val('catastrophic');
    $('#cau2').val('diversity');
    $('#cau3').val('heat-related')
    $('#cau4').val('greenhouse gases');
    $('#cau5').val('capture');
    $('#cau6').val('ecological balance')
    $('#cau1e2').val('e');
    $('#cau2e2').val('c');
    $('#cau3e2').val('f')
    $('#cau4e2').val('b');
    $('#cau5e2').val('d');
    $('#cau6e2').val('a')
  }
})
</script>
@endif
@endsection