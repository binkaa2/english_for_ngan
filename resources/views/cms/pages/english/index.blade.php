@extends('cms.pages.layouts.layout')
@section('content')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
    style="background-image: url('image/ngan.jpg'); background-size: cover; background-position: center center;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center">
                <h1 class="display-2 text-white">
                    Gioi thieu web hoc tieng anh
                </h1>
                <p class="lead text-white">
                    Member : Ngan cagey
                </p>
                <p class="text-white">
                    bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                    bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                    <br> bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                    <br> bla bla bla bla bla bla bla bla bla bla bla bla
                    <br> bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                </p>
                <p class="text-white">
                    bla bla bla bla bla bla bla bla bla bla bla bla
                </p>
                <p class="text-white">
                    bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container mt--5">
    <div class="row" style="padding: 10px">
        <div class="col-12">
            <div class="collapse-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h1 class="mb-0">
                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne">
                                UNIT 1 <strong>GLOBAL WARMING</strong>
                            </a>
                        </h1>
                    </div>
                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOneChild">
                    <div class="card-block">
                            <div class="collapse-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card" style="margin-bottom:0px !important;">
                                    <div class="card-header" role="tab" id="headingOneChild1">
                                        <h1 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOneChild1" aria-expanded="false"
                                                aria-controls="collapseOneChild1">
                                                <strong>A.</strong> VOCABULARY
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseOneChild1" class="collapse" role="tabpanel" aria-labelledby="headingOne1">
                                <div style="padding-left:1.25rem;padding-bottom:1.25rem;padding-top:1.25rem">
                                    <a href="{{route('unit1.vocabulary.vocab1')}}">
                                        <h3><strong style="color:red;">1. </strong>VOCAB 1</h3>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="collapse-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card" style="margin-bottom:0px !important;">
                                    <div class="card-header" role="tab" id="headingOneChild">
                                        <h1 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOneChild" aria-expanded="false"
                                                aria-controls="collapseOneChild">
                                                <strong>B.</strong> READING
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseOneChild" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div style="padding-left:1.25rem;padding-bottom:1.25rem;padding-top:1.25rem">
                                    <a href="{{route('unit1.reading.text1')}}">
                                        <h3><strong style="color:red;">1. </strong>TEXT 1</h3>
                                    </a>
                                    <a href="{{route('unit1.reading.text2')}}">
                                        <h3><strong style="color:red;">2. </strong>TEXT 2</h3>
                                    </a>
                                    <a href="{{route('unit1.reading.text3')}}">
                                        <h3><strong style="color:red;">3. </strong>TEXT 3</h3>
                                    </a>
                                </div>
                            </div>

                        </div>
                        
                    </div>



                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="collapse-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                        <h1 class="mb-0">
                            <a data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                UNIT 2 <strong>OUR WORLD HERITAGE SITES</strong>
                            </a>
                        </h1>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwoChild">
                
                        <div class="card-block">
                            <div class="collapse-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card" style="margin-bottom:0px !important;">
                                    <div class="card-header" role="tab" id="headingTwoChild1">
                                        <h1 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseTwoChild1" aria-expanded="false"
                                                aria-controls="collapseTwoChild1">
                                                <strong>A.</strong> VOCABULARY
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseTwoChild1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1">
                                <div style="padding-left:1.25rem;padding-bottom:1.25rem;padding-top:1.25rem">
                                    <a href="{{route('unit2.vocabulary.vocab1')}}">
                                        <h3><strong style="color:red;">1. </strong>VOCAB 1</h3>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="collapse-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card" style="margin-bottom:0px !important;">
                                    <div class="card-header" role="tab" id="headingTwoChild">
                                        <h1 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseTwoChild" aria-expanded="false"
                                                aria-controls="collapseTwoChild">
                                                <strong>B.</strong> READING
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseTwoChild" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div style="padding-left:1.25rem;padding-bottom:1.25rem;padding-top:1.25rem">
                                    <a href="{{route('unit2.reading.text1')}}">
                                        <h3><strong style="color:red;">1. </strong>TEXT 1</h3>
                                    </a>
                                    <a href="{{route('unit2.reading.text2')}}">
                                        <h3><strong style="color:red;">2. </strong>TEXT 2</h3>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="collapse-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree">
                        <h1 class="mb-0">
                            <a data-toggle="collapse" href="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                UNIT 3 <strong>GENDER EQUALITY</strong>
                            </a>
                        </h1>
                    </div>
                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThreeChild">
                
                        <div class="card-block">
                            <div class="collapse-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card" style="margin-bottom:0px !important;">
                                    <div class="card-header" role="tab" id="headingThreeChild1">
                                        <h1 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseThreeChild1" aria-expanded="false"
                                                aria-controls="collapseThreeChild1">
                                                <strong>A.</strong> VOCABULARY
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseThreeChild1" class="collapse" role="tabpanel" aria-labelledby="headingThree1">
                                <div style="padding-left:1.25rem;padding-bottom:1.25rem;padding-top:1.25rem">
                                    <a href="{{route('unit3.vocabulary.vocab1')}}">
                                        <h3><strong style="color:red;">1. </strong>VOCAB 1</h3>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="collapse-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="card" style="margin-bottom:0px !important;">
                                    <div class="card-header" role="tab" id="headingThreeChild">
                                        <h1 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseThreeChild" aria-expanded="false"
                                                aria-controls="collapseThreeChild">
                                                <strong>B.</strong> READING
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseThreeChild" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div style="padding-left:1.25rem;padding-bottom:1.25rem;padding-top:1.25rem">
                                    <a href="{{route('unit3.reading.text1')}}">
                                        <h3><strong style="color:red;">1. </strong>TEXT 1</h3>
                                    </a>
                                    <a href="{{route('unit3.reading.text2')}}">
                                        <h3><strong style="color:red;">2. </strong>TEXT 2</h3>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!--row-->
    </div>
    @endsection
