@extends('cms.pages.layouts.layout')
@section('content')
<!-- Page content -->
<div class="container-fluid" style="padding-top:5%">
    <div class="row" >
      <div class="col-xl-5 order-xl-2">
        <div class="card card-profile">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="{{$user->avatar}}" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">

                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="h3">
                {{$user->first_name}} {{$user->last_name}}<span class="font-weight-light"></span>
              </h5>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>Type : 
                @if($user->type_social == 'facebook')
                  <span class="badge" style="background:rgb(42,65,130)!important;color:white;">{{$value->type_social}}</span>
                @elseif($user->type_social == 'gmail')
                  <span class="badge" style="background:rgb(238,43,42)!important;color:white;">{{$value->type_social}}</span>
                @else
                  <span class="badge" style="background:rgb(100,100,100)!important;color:white;">normal</span>
                @endif
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>
                @if($user->gender == 0 || $user->gender == "Male")
                  <img src="{{asset('cms-admin/images/male.png')}}" style="height:30px;"/>
                @else
                  <img src="{{asset('cms-admin/images/female.png')}}" style="height:30px;"/>
                @endif
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>{{$user->phone}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5 order-xl-4">
          <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Edit profile </h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="post" action="{{route('users.update',$user->id)}}" >
                  @method('PATCH') 
                  @csrf
                  <h6 class="heading-small text-muted mb-4">User information</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Email address</label>
                            <input type="email" id="input-email" name="email" class="form-control" value="{{$user->email}}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">First name</label>
                          <input type="text" id="input-first-name" name="first_name" class="form-control" placeholder="First name" value="{{$user->first_name}}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Last name</label>
                          <input type="text" id="input-last-name" name="last_name" class="form-control" placeholder="Last name" value="{{$user->last_name}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label" for="input-address">Gender</label>
                            <div class="form-group">
                                <input type="radio" name="gender" value="0" id="male" class="with-gap">
                                <label for="male" style="padding-right:4%;">Male</label>

                                <input type="radio" name="gender" value="1" id="female" class="with-gap">
                                <label for="female" class="m-l-20">Female</label>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  <hr class="my-4" />
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">Contact information</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Phone number</label>
                          <input id="input-address" name="phone" class="form-control" placeholder="Phone number" value="{{$user->phone}}" type="text">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4" />
                  <!-- Description -->
                  <div class="pl-lg-4">
                      <button class="btn btn-primary" type="submit">Save</button>
                  </div>
                  @if(session('success'))
                  <div class="swal2-container swal2-center swal2-fade swal2-shown" id="showoff" style="overflow-y: auto;">
                      <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                        <ul class="swal2-progresssteps" style="display: none;">
                        </ul>
                        <div class="swal2-icon swal2-error" style="display: none;">
                          <span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span>
                          <span class="swal2-x-mark-line-right"></span></span>
                        </div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div>
                        <div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" style="display: block;">{{session('success')}}</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div></div><div class="swal2-actions" style="display: flex;"><button type="button" class="swal2-confirm btn btn-success" onClick="turnOffSuccessNotification();" aria-label="">OK</button><button type="button" class="swal2-cancel" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div></div>
                    </div>
                  @endif
                </form>
              </div>
            </div>
      </div>
    </div>
</div>
@endsection
<script>
  function turnOffSuccessNotification(){
    $('#showoff').css({
        'display': 'none'
    });
  }
</script>