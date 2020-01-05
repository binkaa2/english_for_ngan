@extends('cms.pages.layouts.layout')
@section('content')
<!-- Page content -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Products</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
              @if($product->is_active)
              <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-danger">
                  Takedown product
              </button>
              @else 
              <form style="display:contents" method="get" action="{{route('products.activate',$product->_id)}}">
                  @csrf
                  <button type="submit" class="btn btn-secondary">Activate product</button>
                </form>
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
                    <h3 class="mb-0">Product Information</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <p class="text-detail-header">Name</p>
                            <p class="text-detail">
                            {{$product->name}}</p>
                        </div>
                      </div>
                        <!-- Condition -->
                        <div class="col-lg-3">
                        <p class="text-detail-header">Status</p>
                        <span class="badge badge-default" style="background-color:#f5365c">{{$product->status}}</span>
                                </div>
                                <!-- is active -->
                                <div class="col-lg-3">
                                <p class="text-detail-header">Is Active</p>
                            <p class="text-detail">
                            @if($product->is_active)
                                    <span class="badge badge-default" style="background-color:#27AE60">TRUE</span>
                                @else
                                    <span class="badge badge-default" style="background-color:#f68d20">FALSE</span>
                                @endif</p>
                                </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                                <p class="text-detail-header">Category</p>
                          <p class="text-detail">
                          {{$product->category->name}}</p>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                                <p class="text-detail-header">Price</p>
                          <p class="text-detail">
                          {{$product->price}}</p>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                                <p class="text-detail-header">User</p>
                          <p class="text-detail">
                           @if(isset($product->posted_by)) {{$product->posted_by->display_name}} @endif</p>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                                <p class="text-detail-header">Location</p>
                          <p class="text-detail">
                            {{$product->district->name}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <p class="text-detail-header">Description</p>
                            <p class="text-detail">
                                {{$product->description}}    </p>
                          </div>
                        </div>
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <p class="text-detail-header">Date</p>
                                <p class="text-detail">
                                    {{date('d-m-Y H:i:s', strtotime($product->created_at))}}  </p>
                              </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-auto">
                            <p class="text-detail-header">
                                Image(s)</p>
                            <div>
                                @foreach($product->images as $image)
                                    <a target="_blank" href="{{$image->medium->image_url}}"><img style="height:200px;" src="{{$image->medium->image_url}}"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row pt-2 float-right">
                        <div class="col-md-12">
                            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-default">Takedown Product</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="form-control-label" for="exampleFormControlTextarea1">Lý do bạn muốn gỡ bõ</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="GET" action="{{route('products.takedown',$product->_id)}}">
                                                <button type="submit" class="btn btn-danger">Takedown</button>
                                            </form>
                                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
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