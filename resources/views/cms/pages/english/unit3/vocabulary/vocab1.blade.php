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
                                            equal
                                        </td>
                                        <td>
                                            /´i:kwəl/
                                        </td>
                                        <td>
                                        Ngang bằng, bình đẳng
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        gender
                                        </td>
                                        <td>
                                        /'dӡendә/
                                        </td>
                                        <td>
                                        giới tính
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        eliminate 
                                        </td>
                                        <td>
                                        /ɪˈlɪməˌneɪt/
                                        </td>
                                        <td>
                                        loại bỏ, loại trừ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        discrimination
                                        </td>
                                        <td>
                                        /diskrimi´neiʃən/
                                        </td>
                                        <td>
                                        sự phân biệt, đối xử không công bằng
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        male
                                        </td>
                                        <td>
                                        /meɪl/
                                        </td>
                                        <td>
                                        giống đực
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        female
                                        </td>
                                        <td>
                                        /ˈfiːmeɪl/
                                        </td>
                                        <td>
                                        giống cái
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        breadwinner 
                                        </td>
                                        <td>
                                        /ˈbredwɪnə(r)/
                                        </td>
                                        <td>
                                        người trụ cột trong gia đình
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        domestic violence
                                        </td>
                                        <td>
                                        /dəˈmestɪk ˈvaɪələns/
                                        </td>
                                        <td>
                                        bạo lực gia đình
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        male-dominated
                                        </td>
                                        <td>
                                        /meɪl ˈdɒmɪneɪtid/
                                        </td>
                                        <td>
                                        nam giới nắm quyền, sự kiểm soát nhiều hơn phụ nữ.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        decision-maker
                                        </td>
                                        <td>
                                        /dɪˈsɪʒn meɪkə(r)/
                                        </td>
                                        <td>
                                        người quyết định (các vấn đề quan trọng)
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
                                <strong>1.</strong> breadwinner<br>
                                <strong>2.</strong> equal<br>
                                <strong>3.</strong> eliminate<br>
                                <strong>4.</strong> female<br>
                                <strong>5.</strong> decision-maker<br>
                                <strong>6.</strong> discrimination<br>
                                <strong>7.</strong> male-dominated<br>
                                <strong>8.</strong> gender<br>
                                <strong>9.</strong> male<br>
                                <strong>10.</strong> domestic violence
                    </div>

                    <div class="pt-3">
                        <strong>A.</strong> a person who makes important decisions<br>
                        <strong>B.</strong> the fact of being male or female, especially when considered with reference to social and cultural differences, not differences in biology<br>
                        <strong>C.</strong> the practice of treating somebody or a particular group in society less fairly than others<br>
                        <strong>D.</strong> belonging to the sex that does not give birth to babies<br>
                        <strong>E.</strong> of the sex that can lay eggs or give birth to babies<br>
                        <strong>F.</strong> having the same rights or being treated the same as other people, without differences such as race, religion or sex being considered<br>
                        <strong>G.</strong> to remove or get rid of something/somebody<br>
                        <strong>H.</strong> a person who supports their family with the money they earn<br>
                        <strong>I.</strong> the situation in which someone you live with attacks you and tries to hurt you<br>
                        <strong>J.</strong> involving mostly men or controlled mostly by men<br>
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
                    </div>
                    <div class="pt-3 d-flex" style="    justify-content: space-between;">
                        <div class="d-flex">
                            <span><strong>6</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>7</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>8</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>9</strong> -  </span>
                            <input width="30px"  style="width:30px;margin-left:0.5rem;" type="text">
                        </div>
                        <div class="d-flex">
                            <span><strong>10</strong> -  </span>
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
