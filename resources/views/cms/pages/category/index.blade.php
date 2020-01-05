@extends('cms.pages.layouts.layout')
@section('content')
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
              <a href="{{route('category.create')}}" class="btn btn-secondary">+ Add category</a>
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
                    <h3 class="mb-0">Category Table</h3>
                  </div>
                  <!-- Light table -->
                  <div class="table-responsive" >
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th>NAME</th>
                          <th>Parent Category</th>
                          <th>Sequence</th>
                          <th>Is Active</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @foreach($categories as $category)
                          @if(!$category->_id->parent_id == "null")
                            @foreach($category->children as $cat)
                            <tr>
                            <td>
                              <b>{{$cat->name}}</b>
                            </td>
                            <td>
                              No
                            </td>
                            <td>
                              {{$cat->sequence}}
                            </td>
                            <td>
                                @if($cat->is_active)
                                    <span class="badge badge-default" style="background-color:#27AE60">TRUE</span>
                                @else 
                                    <span class="badge badge-default" style="background-color:#f68d20">FALSE</span>
                                @endif 
                            </td>
                            <td>
                            <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('category.edit',$cat->_id)}}">Edit</a>
                                            <form style="display:contents" method="POST" action="{{route('category.destroy',$cat->_id)}}">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                        </form>
                                        </div>
                                    </div>
                            </td>
                          </tr>
                          
                            @foreach($categories as $cati)
                              @if($cati->_id->parent_id != null && $cati->_id->parent_id == $cat->_id)
                                @foreach($cati->children as $catic)
                                  <tr>
                                    <td>
                                       - {{$catic->name}}
                                    </td>
                                    <td>
                                     {{$cat->name}}
                                    </td>
                                    <td>
                                      {{$catic->sequence}}
                                    </td>
                                    <td>
                                        @if($catic->is_active)
                                            <span class="badge badge-default" style="background-color:#27AE60">TRUE</span>
                                        @else 
                                            <span class="badge badge-default" style="background-color:#f68d20">FALSE</span>
                                        @endif 
                                    </td>
                                    <td>
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('category.edit',$cat->_id)}}">Edit</a>
                                            <form style="display:contents" method="POST" action="{{route('category.destroy',$cat->_id)}}">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                            </form>
                                            </div>
                                    </div>
                                    </td>
                                  </tr>
                                @endforeach
                                @break
                              @endif
                            @endforeach
                            @endforeach
                          @endif
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
</script>
@endsection