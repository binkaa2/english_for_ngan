@extends('cms.pages.layouts.layout')
@section('content')
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
                                            heritage
                                        </td>
                                        <td>
                                            /ˈherɪtɪdʒ/ 
                                        </td>
                                        <td>
                                            Di sản
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            sustainable
                                        </td>
                                        <td>
                                            /səˈsteɪnəbl/
                                        </td>
                                        <td>
                                            Bền vững
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            endanger 
                                        </td>
                                        <td>
                                            /ɪnˈdeɪndʒə(r)/
                                        </td>
                                        <td>
                                            Gây nguy hiểm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        committee
                                        </td>
                                        <td>
                                            /kəˈmɪti/ 
                                        </td>
                                        <td>
                                        Ủy ban
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        lagoon
                                        </td>
                                        <td>
                                        /ləˈɡuːn/ 
                                        </td>
                                        <td>
                                            Đầm phá
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        livelihood 
                                        </td>
                                        <td>
                                        /ˈlaɪvlihʊd/ 
                                        </td>
                                        <td>
                                            Kế sinh nhai 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        warning 
                                        </td>
                                        <td>
                                        /ˈwɔːnɪŋ/ 
                                        </td>
                                        <td>
                                        Cảnh báo 
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
                        <h1>MATCHING</h1>
                        <h3>Introduction: Match the words with the appropriate definitions</h3>
                    </div>

                    <div class="pt-3">
                                <strong>1.</strong> telling or showing somebody that something bad or unpleasant may happen in the future so that they can try to avoid it<br>
                                <strong>2.</strong> the history, traditions and qualities that a country or society has had for many years and that are considered an important part of its character<br>
                                <strong>3.</strong> a group of people who are chosen, usually by a larger group, to make decisions or to deal with a particular subject<br>
                                <strong>4.</strong> a means of earning money in order to live<br>
                                <strong>5.</strong> involving the use of natural products and energy in a way that does not harm the environment<br>
                                <strong>6.</strong> a lake of salt water that is separated from the sea by a reef or an area of rock or sand<br>
                                <strong>7.</strong> to put somebody/something in a situation in which they could be harmed or damaged
                    </div>

                    <div class="pt-3">
                        <strong>a.</strong> heritage<br>
                        <strong>b.</strong> sustainable<br>
                        <strong>c.</strong> endanger<br>
                        <strong>d.</strong> committee<br>
                        <strong>e.</strong> lagoon<br>
                        <strong>f.</strong> livelihood<br>
                        <strong>g.</strong> warning<br>
                    </div>

                    <div class="pt-5 d-flex" style="    justify-content: space-between;">
                        <div class="d-flex">
                            <span><strong>1</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>2</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>3</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>4</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>5</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>6</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>7</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                    </div>
                    <div class="pb-5"></div>
                        <div class="row pt-4 pb-4">
                            <div class="col-4">
                            <button class="btn btn-icon btn-secondary" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                <span class="btn-inner--text">Check done</span>
                            </button>
                            </div>
                            <div class="col-4 text-center"></div>
                            <div class="col-4">
                                <div class="d-flex" style="justify-content: space-around;">
                                <a class="btn btn-icon btn-primary" href="{{route('unit2.reading.text2')}}" type="button">
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
    @endsection
