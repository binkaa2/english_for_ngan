@extends('cms.pages.layouts.layout')
@section('content')
<!-- Page content -->
<form action="{{route('products.update',$product->_id)}}" method="POST">
    @method("PUT")
    @csrf
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
                        <button type="submit" class="btn btn-save-3km">Save change</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid  mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit Product</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="text-detail-header">Name</p>
                                        <input id="name" class="form-control input-3km" name="name"
                                            value="{{$product->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <p class="text-detail-header">Category</p>
                                            <select class="form-control" name="category_id">
                                                @foreach($categories as $category)
                                                @foreach($category->children as $cat)
                                                @if($cat->is_active)
                                                <option @if($cat->_id == $product->category->_id) selected @endif
                                                    value="{{$cat->_id}}">{{$cat->name}}</option>
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <p class="text-detail-header">Price</p>
                                        <input id="name" class="form-control input-3km" name="price"
                                            value="{{$product->price}}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <p class="text-detail-header">User</p>
                                        <p class="text-detail">
                                            {{$product->posted_by->display_name}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <p class="text-detail-header">Location</p>
                                        <select class="form-control" name="district">
                                            @foreach($districts as $key => $district)
                                            <optgroup label="{{$district->_id}}">
                                                @foreach($district->districts as $key => $city)
                                                <option @if($product->district->_id == $city->_id) selected @endif
                                                    value="{{$city->_id}}">{{$city->name}}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <p class="text-detail-header">Date</p>
                                        <p class="text-detail">
                                            {{date('d-m-Y H:i:s', strtotime($product->created_at))}} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <!-- Description -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="text-detail-header">Description</p>
                                        <textarea id="des" name="des" class="form-control textarea-3km" rows="5"
                                            resize="none">{{$product->description}}</textarea>
                                    </div>
                                </div>
                                <!-- Condition -->
                                <div class="col-md-3">
                                      <p class="text-detail-header">Tình trạng</p>
                                        <select class="form-control" name="status">
                                          <option @if($product->status === "unavailable") selected @endif  value="unavailable">Không tồn tại</option>
                                          <option @if($product->status === "new") selected @endif value="new">Mới</option>
                                          <option @if($product->status === "sold") selected @endif value="sold">Đã bán</option>
                                        </select>
                                </div>
                                <!-- is active -->
                                <div class="col-md-3">
                                      <p class="text-detail-header">Tình trạng kiểm duyệt</p>
                                        <select class="form-control" name="is_active">
                                          <option @if($product->is_active) selected @endif value="true">Active</option>
                                          <option @if(!$product->is_active) selected @endif value="false">Deactive</option>
                                        </select>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-auto">
                                    <p class="text-detail-header">
                                        Image(s)</p>
                                    <div>
                                        @foreach($product->images as $image)
                                        <a target="_blank" href="{{$image->medium->image_url}}"><img
                                                style="height:200px;"
                                                src="{{$image->medium->image_url}}"></a>
                                        @endforeach
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
<script>
    @if(session('success'))
    swal("Success!", "{{session('success')}}", "success");
    @endif
    @if(session('error'))
    swal("Error!", "{{session('error')}}", "error");
    @endif

</script>
@endsection
