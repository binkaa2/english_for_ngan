@extends('cms.pages.layouts.layout')
@section('content')
<!-- Page content -->
<form method="post" enctype="multipart/form-data"  action="{{route('banners.destroy',$banner->_id)}}">
@method('DELETE')
@csrf
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Banners</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Banners</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
                <button type="submit" class="btn btn-danger">Delete</button>
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
                    <h3 class="mb-0">Banner information</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="pl-lg-4">
                    <div class="row justify-content-center">
                      <div class="col-md-6">
                        <div class="form-group">
                            <p class="text-detail-header">Name</p>
                            <p class="text-detail">{{$banner->name}}</p>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-6">
                        <div class="form-group">
                            <p class="text-detail-header">Link</p>
                            <p class="text-detail">{{$banner->link}}</p>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                                <div class="form-group">
                                        <p class="text-detail-header">Image</p>
                                        <img style="max-width:100%" src="{{$banner->image_url}}" />
                                </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="text-detail-header">Sequence</p>
                                <span class="badge badge-default" style="background-color:#f68d20">{{$banner->sequence}}</span>
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
</form>
@endsection
@section('script')
<script src="cms-admin/js/jquery.stringtoslug.min.js"></script>
<script src="cms-admin/js/speakingurl.min.js"></script>
<script>
    @if (session('success'))
    swal("Success!", "{{session('success')}}", "success");
    @endif
    @if (session('error'))
    swal("Error!", "{{session('error')}}", "error");
    @endif

    $(document).ready( function() {
        $(".basic-usage").stringToSlug();
    });

</script>
@endsection
