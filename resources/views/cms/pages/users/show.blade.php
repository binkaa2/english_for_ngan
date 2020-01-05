@extends('cms.pages.layouts.layout')
@section('content')
<!-- Page content -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Users</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
          @if(Session::get('role') == "admin")
              @if($user->is_active)
                <form style="display:contents" method="post" action="{{route('users.deactivate')}}">
                  @csrf
                  <input hidden name="user_id" value="{{$user->_id}}"/>
                  <button type="submit" class="btn btn-deactivate-3km">Deactivate User</button>
                </form>
              @else 
                <form style="display:contents" method="post" action="{{route('users.active')}}">
                  @csrf
                  <input hidden name="user_id" value="{{$user->_id}}"/>
                  <button type="submit" class="btn btn-secondary">Activate User</button>
                </form>
              @endif
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid  mt--6">
    <div class="row" >
      <div class="col-xl-12 order-xl-4">
          <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">User Information</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <p class="text-detail-header">User Id</p>
                            <p class="text-detail">
                            {{$user->_id}}</p>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                                <p class="text-detail-header">Display Name</p>
                          <p class="text-detail">
                          {{$user->display_name}}</p>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                                <p class="text-detail-header">First Name</p>
                          <p class="text-detail">
                          {{$user->first_name}}</p>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                                <p class="text-detail-header">Last Name</p>
                          <p class="text-detail">
                          {{$user->last_name}}</p>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                                <p class="text-detail-header">Email</p>
                          <p class="text-detail">
                          {!!$user->email ? $user->email :  "NONE"!!}</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <p class="text-detail-header">Phone</p>
                            <p class="text-detail">
                            @if(isset($user->phone))
                                 {{$user->phone ? $user->phone :  "NONE"}}   </p>
                            @else 
                                NONE
                            @endif
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <p class="text-detail-header">Is Active</p>
                                <p class="text-detail">
                                    @if($user->is_active)
                                <span class="badge badge-default" style="background-color:#27AE60">TRUE</span>
                              @else 
                                <span class="badge badge-default" style="background-color:#f68d20">FALSE</span>
                              @endif     </p>
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <p class="text-detail-header">Email Verified</p>
                                <p class="text-detail">
                                    @if($user->is_email_verified)
                                <span class="badge badge-default" style="background-color:#27AE60">TRUE</span>
                              @else 
                                <span class="badge badge-default" style="background-color:#f68d20">FALSE</span>
                              @endif     </p>
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <p class="text-detail-header">Facebook Verified</p>
                                <p class="text-detail">
                                    @if($user->is_facebook_verified)
                                <span class="badge badge-default" style="background-color:#27AE60">TRUE</span>
                              @else 
                                <span class="badge badge-default" style="background-color:#f68d20">FALSE</span>
                              @endif     </p>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <p class="text-detail-header">Total Reviews</p>
                            <p class="text-detail">
                                {{$user->total_reviewed_by_count}}    </p>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <p class="text-detail-header">Average Response Time</p>
                                <p class="text-detail">
                                  {{$user->average_response_time}}      </p>
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <p class="text-detail-header">Total Posted Items</p>
                                <p class="text-detail">
                                   {{$user->total_posted_items}}     </p>
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <p class="text-detail-header">Total Sold Items</p>
                                <p class="text-detail">
                                  {{$user->total_sold_items}}      </p>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <p class="text-detail-header">Total Followings</p>
                            <p class="text-detail">
                                {{$user->total_following_count}}   </p>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <p class="text-detail-header">Total Followers</p>
                                <p class="text-detail">
                                  {{$user->total_follower_count}}      </p>
                              </div>
                        </div>
      
                    </div>
                  </div>
                  
               
                </div>

            
              </div>
            </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
    @if (session('success'))
    swal("Success!", "{{session('success')}}", "success");
    @endif
    @if (session('error'))
    swal("Error!", "{{session('error')}}", "error");
    @endif
</script>
@endsection
