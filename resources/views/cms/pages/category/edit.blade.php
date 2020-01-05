@extends('cms.pages.layouts.layout')
@section('content')
<!-- Page content -->
<form method="post" action="{{route('category.update',$category->_id)}}">
@method('PUT')
@csrf
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Category</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
                <button type="submit" class="btn btn-save-3km">Save change</button>
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
                    <h3 class="mb-0">Edit category</h3>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="pl-lg-4">
                    <div class="row justify-content-center">
                      <div class="col-md-6">
                        <div class="form-group">
                            <p class="text-detail-header">Parent</p>
                            <select class="form-control" name="parent_id" id="exampleFormControlSelect1">
                                    <optgroup label="Custom">
                                    <option value="">None</option>
                                    </optgroup>
                                    <optgroup label="Relationship">
                                        @foreach($categories as $cat)
                                        @if($cat->_id->parent_id == null)
                                          @foreach($cat->children as $catt)
                                              @if($catt->is_active)
                                                  <option  value="{{$catt->_id}}">{{$catt->name}}</option>
                                              @endif
                                          @endforeach
                                          @break
                                        @endif
                                        @endforeach
                                    </optgroup>
                            </select>
                        </div>
                      </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                                <div class="form-group">
                                        <p class="text-detail-header">Name</p>
                                        <input type="text" class="basic-usage form-control input-3km" name="name" value="{{$category->name}}"/>
                                </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class=" col-md-6">
                                <div class="form-group">
                                        <p class="text-detail-header">Slug</p>
                                        <input type="text" id="permalink" class="form-control input-3km" name="slug" value="{{$category->slug}}"/>
                                </div>
                        </div>
                    </div>
                    <!-- <div class="row justify-content-center">
                        <div class=" col-md-6">
                                <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="is_active" checked id="customCheck1" type="checkbox">
                                            <label class="custom-control-label" for="customCheck1">Is Active</label>
                                </div>
                        </div>
                    </div> -->
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
