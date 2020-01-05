@extends('cms.pages.layouts.layout')
@section('content')
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
                <a href="{{route('banners.create')}}" class="btn btn-secondary">+ Add banner</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
            <!-- Table -->
            <div class="row">
              <div class="col">
                <div class="card">
                  <!-- Card header -->
                  <div class="card-header border-0">
                    <h3 class="mb-0">Banner Table</h3>
                  </div>
                  <!-- Light table -->
                  <div class="table-responsive" id="dvData">
                    <table id="tableData" class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Sequence</th>
                          <th>Created At</th>
                          <th>Updated at</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @foreach($banners as $banner)
                        <tr>
                            <td>
                              {{$banner->name}}
                            </td>
                            <td>
                                <a target="_blank" href="{{$banner->image_url}}" data-lightbox="image-1" data-title="My caption"> <img style="max-width:300px" height=100 src="{{$banner->image_url}}"/></a>
                            </td>
                            <td>
                                <span class="badge badge-default" style="background-color:#f68d20">{{$banner->sequence}}</span>
                            </td>
                            <td>
                              <span style="color:white;" class="badge bg-primary">
                                {{$banner->created_at}} </span>
                            </td>
                            <td>
                              <span style="color:white;" class="badge bg-primary">
                                {{$banner->updated_at}} </span>
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{route('banners.show',$banner->_id)}}">View</a>
                                        <a class="dropdown-item" href="{{route('banners.edit',$banner->_id)}}">Edit</a>
                                        <form style="display:contents" method="POST" action="{{route('banners.destroy',$banner->_id)}}">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- Card footer -->
                  <div class="card-footer py-4">
                      
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
    // reset button click
    $("#btnReset").click(function(){
      $(location). attr('href',"{{route('users.index')}}");
    });
    
    
</script>
@endsection