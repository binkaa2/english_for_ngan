@extends('cms.pages.layouts.layout')
@section('content')
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
                    <form action="{{route('products.import')}}" method="post" style="display:contents"
                        enctype="multipart/form-data">
                        @csrf
                        <input required="" type="file" class="form-control" style="margin-bottom:10px;" accept=".csv"
                            name="file">
                        <button type="submit" class="btn btn-secondary">+ Import</button>
                    </form>
                    <a href="{{route('products.export')}}?search={{Request::get('search')}}&date_from={{Request::get('date_from')}}&date_to={{Request::get('date_to')}}"
                        class="btn btn-secondary">Export</a>
                </div>
            </div>
            <div class="row pb-4">
                <form action="{{route('products.index')}}" method="GET" style="display:contents">
                    <div class="col-lg-3">
                        <div class=" form-inline">
                            <div class="form-group mb-0" style="width:100% !important;">
                                <div style="width:100% !important;"
                                    class="input-group input-group-alternative input-group-merge">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text"><i class="fas fa-search"
                                                style="color:#6170DF"></i></button>
                                    </div>
                                    <input
                                        value="@if(Request::get('search')) {{Request::get('search')}} @else "" @endif"
                                        class="form-control" name="search" id="search" placeholder="Search Listing"
                                        type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span style="background: #F8F8F8;" class="input-group-text"><img
                                            src="cms-admin/images/icons/calendar_icon.svg" /></span>
                                </div>
                                <input
                                    value="@if(Request::get('date_from')) {{Request::get('date_from')}} @else {{date('Y-m-d',strtotime('-1 day'))}} @endif"
                                    id="date-from" id="date_from" name="date_from"
                                    class="form-control datepicker input-3km" data-date-format="yyyy-mm-dd" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span style="background: #F8F8F8;" class="input-group-text"><img
                                            src="cms-admin/images/icons/calendar_icon.svg" /></span>
                                </div>
                                <input
                                    value="@if(Request::get('date_to')) {{Request::get('date_to')}} @else {{date('Y-m-d',time())}} @endif"
                                    id="date_to" name="date_to" class="form-control datepicker input-3km"
                                    data-date-format="yyyy-mm-dd" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" style="height:100%;" type="button" class="btn btn-default btn-icon">
                            <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                            <span class="btn-inner--text">Search</span>
                        </button>
                        <button type="button" id="btnReset" style="height:100%;" type="button"
                            class="btn btn-warning btn-icon">
                            <span class="btn-inner--icon"><i class="fas fa-file"></i></span>
                            <span class="btn-inner--text">Reset</span>
                        </button>
                    </div>
                </form>
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
                <div class="card-header border-0" style="display:flex;justify-content:space-between;">
                    <h3 class="mb-0">Product Table</h3>
                    <div style="display:flex;">
                        <button id="hideColumnBtn" data-toggle="modal" data-target="#modal-default"
                            class="btn btn-primary">
                            HIDE / VISIBLE COLUMN
                        </button>
                        <button id="bulk_active_btn" name="bulkActiveBtn" value="true" class="btn btn-primary">
                            BULK ACTIVE
                        </button>
                        <button id="bulk_delete_btn" name="bulkDeleteBtn" value="true" class="btn btn-danger">BULK
                            DEACTIVE</button>

                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>
                                    <div class="custom-control custom-checkbox">
                                        <input name="product_cb_all" value="true" class="custom-control-input"
                                            id="product_cb_all" type="checkbox">
                                        <label class="custom-control-label" for="product_cb_all"></label>
                                    </div>
                                </th>
                                <th class="is_hidden_user">
                                    <a href="">User</a>
                                </th>
                                <th class="sort is_hidden_user_id">User ID</th>
                                <th class="sort is_hidden_tieu_de" sort>
                                    <a href="
                                        @if(str_contains(request()->fullUrl(), 'name_asc'))
                                            {{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}
                                        @else
                                            {{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}
                                        @endif
                                    ">
                                        Tiêu đề tin rao
                                    </a></th>
                                <th class="sort is_hidden_anh">Ảnh tin rao</th>
                                <th class="sort is_hidden_mo_ta">Mô tả</th>
                                <th class="sort is_hidden_danh_muc">Danh mục</th>
                                <th class="sort is_hidden_gia" sort>
                                    <a href="
                                        @if(str_contains(request()->fullUrl(), 'price_acs'))
                                            {{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}
                                        @else
                                            {{ request()->fullUrlWithQuery(['sort' => 'price_acs']) }}
                                        @endif
                                    ">
                                        Giá</a></th>
                                <th class="sort is_hidden_tinh_trang" sort>
                                    <a href="
                                        @if(str_contains(request()->fullUrl(), 'status_acs'))
                                            {{ request()->fullUrlWithQuery(['sort' => 'status_desc']) }}
                                        @else
                                            {{ request()->fullUrlWithQuery(['sort' => 'status_acs']) }}
                                        @endif
                                    ">
                                        Tình trạng
                                    </a>
                                </th>
                                <th class="sort is_hidden_active" sort>
                                    <a href="
                                        @if(str_contains(request()->fullUrl(), 'is_active_acs'))
                                            {{ request()->fullUrlWithQuery(['sort' => 'is_active_desc']) }}
                                        @else
                                            {{ request()->fullUrlWithQuery(['sort' => 'is_active_acs']) }}
                                        @endif
                                    ">

                                        Tình trạng kiểm duyệt</a></th>
                                <th class="sort is_hidden_khu_vuc">Khu vực</th>
                                <th class="sort is_hidden_ngay_dang" sort><a href="
                                    @if(str_contains(request()->fullUrl(), 'newest'))
                                        {{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}
                                    @else
                                        {{ request()->fullUrlWithQuery(['sort' => 'newest']) }}
                                    @endif
                                ">Ngày đăng</a></th>
                                <th class="sort is_hidden_ngay_chinh_sua" sort><a href="
                                    @if(str_contains(request()->fullUrl(), 'updated_at_asc'))
                                        {{ request()->fullUrlWithQuery(['sort' => 'updated_at_desc']) }}
                                    @else
                                        {{ request()->fullUrlWithQuery(['sort' => 'updated_at_asc']) }}
                                    @endif
                                ">
                                        Ngày chỉnh sửa</a></th>
                                <th class="sort text-center" sort>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <form style="display:contents" id="frm_product_bulk_delete" method="POST"
                                action="{{route('products.bulk_action')}}">
                                @method('DELETE')
                                @csrf
                                <input hidden name="is_button" id="is_button" />
                                @foreach($products as $key => $product)
                                <tr>
                                    <td>
                                        @if(isset($product->_id))
                                        <div class="custom-control custom-checkbox">
                                            <input name="product_cb[]" value="{{$product->_id}}"
                                                class="custom-control-input checkbox-class" id="product_cb{{$key}}"
                                                type="checkbox">
                                            <label class="custom-control-label" for="product_cb{{$key}}"></label>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="is_hidden_user">
                                        @if(isset($product->posted_by))
                                        <a href="{{route('users.show',$product->posted_by->_id)}}">
                                            {{$product->posted_by->display_name}}</a>
                                        @endif
                                    </td>
                                    <td class="is_hidden_user_id">
                                        @if(isset($product->posted_by))
                                        <a href="{{route('users.show',$product->posted_by->_id)}}">
                                            {{$product->posted_by->_id}}</a>
                                        @endif
                                    </td>
                                    <td class="is_hidden_tieu_de" style="white-space: initial !important;max-width: 150px; width:150px;">
                                        @if(isset($product->name))
                                        {{$product->name}}
                                        @endif
                                    </td>
                                    <td class="is_hidden_anh">
                                        @if(isset($product->images[0]->small))
                                        <img style="max-width:100px;max-height:100px;"
                                            src="{{$product->images[0]->small->image_url}}" />
                                        @endif
                                    </td>
                                    <td class="is_hidden_mo_ta max-lines" style="max-width: 600px; width:600px;">
                                        @if(isset($product->description))
                                        {{$product->description}}
                                        @endif
                                    </td>
                                    <td class="is_hidden_danh_muc">
                                        @if(isset($product->category))
                                        {{$product->category->name}}
                                        @endif
                                    </td>
                                    <td class="budget is_hidden_gia">
                                        @if(isset($product->price))
                                        {{$product->price}} ₫
                                        @endif
                                    </td>
                                    <td class="text-center is_hidden_tinh_trang">
                                        <span class="badge badge-default" style="background-color:#f5365c">
                                            @if(isset($product->status))
                                            {{$product->status}}
                                            @endif
                                        </span>
                                    </td>
                                    <td class="text-center is_hidden_active">
                                        @if(isset($product->is_active))
                                        @if($product->is_active)
                                        <span class="badge badge-default" style="background-color:#27AE60">TRUE</span>
                                        @else
                                        <span class="badge badge-default" style="background-color:#f68d20">FALSE</span>
                                        @endif
                                        @endif
                                    </td>
                                    <td class="is_hidden_khu_vuc">
                                        @if(isset($product->district))
                                        {{$product->district->name}}
                                        @endif
                                    </td>
                                    <td class="is_hidden_ngay_dang">
                                        <span style="color:white;" class="badge bg-primary">
                                            @if(isset($product->created_at))
                                            {{date('d-m-Y H:i:s', strtotime($product->created_at))}} </span>
                                        @endif
                                    </td>
                                    <td class="is_hidden_ngay_chinh_sua">
                                        <span style="color:white;" class="badge bg-primary">
                                            @if(isset($product->updated_at))
                                            {{date('d-m-Y H:i:s', strtotime($product->updated_at))}}
                                            @endif
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                @if(isset($product->_id))
                                                <a class="dropdown-item"
                                                    href="{{route('products.show',$product->_id)}}">View</a>
                                                <a href="{{route('products.takedown',$product->_id)}}"
                                                    onclick="return confirm(&quot;Bạn có chắc muốn gỡ bỏ tin rao?&quot;)"
                                                    class="dropdown-item">Takedown</a>
                                                @if(isset($product->is_active))
                                                @if($product->is_active)
                                                <a href="{{route('products.takedown',$product->_id)}}"
                                                    onclick="return confirm(&quot;Bạn có chắc muốn gỡ bỏ tin rao?&quot;)"
                                                    class="dropdown-item">Deactive</a>
                                                @else
                                                <a class="dropdown-item"
                                                    href="{{route('products.activate',$product->_id)}}">Active</a>
                                                @endif
                                                @endif
                                                <a class="dropdown-item"
                                                    href="{{route('products.edit',$product->_id)}}">Edit</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    @if($total_page > 1)
                    <ul class="pagination row">
                        <li class="paginate_button page-item previous @if(request()->page == 1) disabled @endif"
                            id="datatable-basic_previous"><a
                                href="{{ request()->fullUrlWithQuery(['page' => request()->page -1]) }}"
                                aria-controls="datatable-basic" data-dt-idx="0" tabindex="0" class="page-link"><i
                                    class="fas fa-angle-left"></i></a></li>
                        @for($i = 1 ; $i < $total_page ; $i++) <li
                            class="page-item  @if( request()->page == $i ) active @endif">
                            <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}" class="page-link">
                                {{$i}}
                            </a>
                            </li>
                            @endfor
                            <li class="paginate_button page-item next @if(request()->page == $total_page-1) disabled @endif"
                                id="datatable-basic_next"><a
                                    href="{{ request()->fullUrlWithQuery(['page' => request()->page +1]) }}"
                                    class="page-link"><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<!-- modal hide/visiable cot -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
    aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">HIDE / VISIBLE COLUMN</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h2 style="margin-bottom:0.5rem;">Cột</h2>
                <div class="row" style="margin-left:0px;margin-right:0px;margin-bottom:1rem;">
                    <!-- User -->
                    <div class="custom-control custom-checkbox col-md-3">
                        <input checked class="custom-control-input" id="user_cb" type="checkbox">
                        <label class="custom-control-label" for="user_cb">User</label>
                    </div>
                    <!-- User ID -->
                    <div class="custom-control custom-checkbox col-md-3">
                        <input checked  class="custom-control-input" id="user_id_cb" type="checkbox">
                        <label class="custom-control-label" for="user_id_cb">User Id</label>
                    </div>
                    <!-- Tiêu đề -->
                    <div class="custom-control custom-checkbox col-md-3">
                        <input checked class="custom-control-input" id="tieu_de_cb" type="checkbox">
                        <label class="custom-control-label" for="tieu_de_cb">Tiêu đề </label>
                    </div>
                    <!-- Ảnh -->
                    <div class="custom-control custom-checkbox col-md-3">
                        <input checked class="custom-control-input" id="anh_cb" type="checkbox">
                        <label class="custom-control-label" for="anh_cb">Ảnh</label>
                    </div>
                </div>
                <div class="row" style="margin-left:0px;margin-right:0px;margin-bottom:1rem;">
                     <!-- Mô tả --> 
                     <div class="custom-control custom-checkbox col-md-3">
                        <input checked class="custom-control-input" id="mo_ta_cb" type="checkbox">
                        <label class="custom-control-label" for="mo_ta_cb">Mô tả</label>
                    </div>
                    <!-- Danh mục -->
                    <div class="custom-control custom-checkbox col-md-3">
                        <input checked class="custom-control-input" id="danh_muc_cb" type="checkbox">
                        <label class="custom-control-label" for="danh_muc_cb">Danh mục</label>
                    </div>
                    <!-- Giá -->
                    <div class="custom-control custom-checkbox col-md-3">
                        <input checked class="custom-control-input" id="gia_cb" type="checkbox">
                        <label class="custom-control-label" for="gia_cb">Giá</label>
                    </div>
                    <!-- Tình trạng -->
                    <div class="custom-control custom-checkbox col-md-3">
                        <input checked class="custom-control-input" id="tinh_trang_cb" type="checkbox">
                        <label class="custom-control-label" for="tinh_trang_cb">Tình trạng</label>
                    </div>
                </div>
                <div class="row" style="margin-left:0px;margin-right:0px;margin-bottom:1rem;">
                     <!-- Tình trạng -->
                     <div class="custom-control custom-checkbox col-md-6">
                        <input checked class="custom-control-input" id="tinh_trang_kd_cb" type="checkbox">
                        <label class="custom-control-label" for="tinh_trang_kd_cb">Tình Trạng Kiểm Duyệt</label>
                    </div>
                    <!-- Khu Vực -->
                    <div class="custom-control custom-checkbox col-md-3">
                        <input checked class="custom-control-input" id="khu_vuc_cb" type="checkbox">
                        <label class="custom-control-label" for="khu_vuc_cb">Khu vực</label>
                    </div>
                    <!-- Ngày Đăng -->
                    <div class="custom-control custom-checkbox col-md-3">
                        <input checked  class="custom-control-input" id="ngay_dang_cb" type="checkbox">
                        <label class="custom-control-label" for="ngay_dang_cb">Ngày đăng</label>
                    </div>
                </div>
                <div class="row" style="margin-left:0px;margin-right:0px;margin-bottom:1rem;">
                     <!-- Ngày chỉnh sửa -->
                     <div class="custom-control custom-checkbox col-md-6">
                        <input checked class="custom-control-input" id="ngay_chinh_sua_cb" type="checkbox">
                        <label class="custom-control-label" for="ngay_chinh_sua_cb">Ngày chỉnh sửa</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_save_column" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    @if(session('success'))
    swal("Success!", "{{session('success')}}", "success");
    @endif
    @if(session('error'))
    swal("Error!", "{{session('error')}}", "error");
    @endif

    // reset button click
    $("#btnReset").click(function () {
        $(location).attr('href', "{{route('products.index')}}");
    });

    // all checkbox change
    $("#product_cb_all").click(function () {
        $(".checkbox-class").prop('checked', $(this).prop('checked'));
    });

    $(".checkbox-class").change(function () {
        if (!$(this).prop("checked")) {
            $("#product_cb_all").prop("checked", false);
        }
    });

    $("#bulk_delete_btn").click(function () {
        $("#is_button").val("bulk_delete");
        swal.fire({
            title: 'Are you sure?',
            text: "You wanna bulk delete ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#frm_product_bulk_delete").submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {}
        })

    });

    $(function() {
        if(Cookies.get('user') == "false"){
            $('#user_cb').removeAttr("checked");
            $(".is_hidden_user").css("display", "none");
        }else{
            $('#user_cb').attr("checked");
            $(".is_hidden_user").css("display", "");
        }
        if(Cookies.get('user_id') == "false"){
            $('#user_id_cb').removeAttr("checked");
            $(".is_hidden_user_id").css("display", "none");
        }else{
            $('#user_id_cb').attr("checked");
            $(".is_hidden_user_id").css("display", "");
        }
        if(Cookies.get('tieu_de') == "false"){
            $('#tieu_de_cb').removeAttr("checked");
            $(".is_hidden_tieu_de").css("display", "none");
        }else{
            $('#tieu_de_cb').attr("checked");
            $(".is_hidden_tieu_de").css("display", "");
        }
        if(Cookies.get('anh') == "false"){
            $('#anh_cb').removeAttr("checked");
            $(".is_hidden_anh").css("display", "none");
        }else{
            $('#anh_cb').attr("checked");
            $(".is_hidden_anh").css("display", "");
        }
        if(Cookies.get('mo_ta') == "false"){
            $('#mo_ta_cb').removeAttr("checked");
            $(".is_hidden_mo_ta").css("display", "none");
        }else{
            $('#mo_ta_cb').attr("checked");
            $(".is_hidden_mo_ta").css("display", "");
        }
        if(Cookies.get('danh_muc') == "false"){
            $('#danh_muc_cb').removeAttr("checked");
            $(".is_hidden_danh_muc").css("display", "none");
        }else{
            $('#danh_muc_cb').attr("checked");
            $(".is_hidden_danh_muc").css("display", "");
        }
        if(Cookies.get('gia') == "false"){
            $('#gia_cb').removeAttr("checked");
            $(".is_hidden_gia").css("display", "none");
        }else{
            $('#gia_cb').attr("checked");
            $(".is_hidden_gia").css("display", "");
        }
        if(Cookies.get('tinh_trang') == "false"){
            $('#tinh_trang_cb').removeAttr("checked");
            $(".is_hidden_tinh_trang").css("display", "none");
        }else{
            $('#tinh_trang_cb').attr("checked");
            $(".is_hidden_tinh_trang").css("display", "");
        }
        if(Cookies.get('tinh_trang_kd') == "false"){
            $('#tinh_trang_kd_cb').removeAttr("checked");
            $(".is_hidden_active").css("display", "none");
        }else{
            $('#tinh_trang_kd_cb').attr("checked");
            $(".is_hidden_active").css("display", "");
        }
        if(Cookies.get('khu_vuc') == "false"){
            $('#khu_vuc_cb').removeAttr("checked");
            $(".is_hidden_khu_vuc").css("display", "none");
        }else{
            $('#khu_vuc_cb').attr("checked");
            $(".is_hidden_khu_vuc").css("display", "");
        }
        if(Cookies.get('ngay_dang') == "false"){
            $('#ngay_dang_cb').removeAttr("checked");
            $(".is_hidden_ngay_dang").css("display", "none");
        }else{
            $('#ngay_dang_cb').attr("checked");
            $(".is_hidden_ngay_dang").css("display", "");
        }
        if(Cookies.get('ngay_chinh_sua') == "false"){
            $('#ngay_chinh_sua_cb').removeAttr("checked");
            $(".is_hidden_ngay_chinh_sua").css("display", "none");
        }else{
            $('#ngay_chinh_sua_cb').attr("checked");
            $(".is_hidden_ngay_chinh_sua").css("display", "");
        }
    });

    $("#btn_save_column").click(function(){
        if ($('#user_cb').is(":checked"))
        {
            $(".is_hidden_user").css("display", "");
            Cookies.set('user', "true");
        }else{
            $(".is_hidden_user").css("display", "none");
            Cookies.set('user', "false");
        }
        if ($('#user_id_cb').is(":checked"))
        {
            $(".is_hidden_user_id").css("display", "");
            Cookies.set('user_id', "true");
        }else{
            $(".is_hidden_user_id").css("display", "none");
            Cookies.set('user_id', "false");
        }
        if ($('#tieu_de_cb').is(":checked"))
        {
            $(".is_hidden_tieu_de").css("display", "");
            Cookies.set('tieu_de', "true");
        }else{
            $(".is_hidden_tieu_de").css("display", "none");
            Cookies.set('tieu_de', "false");
        }
        if ($('#danh_muc_cb').is(":checked"))
        {
            $(".is_hidden_danh_muc").css("display", "");
            Cookies.set('danh_muc', "true");
        }else{
            $(".is_hidden_danh_muc").css("display", "none");
            Cookies.set('danh_muc', "false");
        }
        if ($('#anh_cb').is(":checked"))
        {
            $(".is_hidden_anh").css("display", "");
            Cookies.set('anh', "true");
        }else{
            $(".is_hidden_anh").css("display", "none");
            Cookies.set('anh', "false");
        }
        if ($('#mo_ta_cb').is(":checked"))
        {
            $(".is_hidden_mo_ta").css("display", "");
            Cookies.set('mo_ta', "true");
        }else{
            $(".is_hidden_mo_ta").css("display", "none");
            Cookies.set('mo_ta', "false");
        }
        if ($('#gia_cb').is(":checked"))
        {
            $(".is_hidden_gia").css("display", "");
            Cookies.set('gia', "true");
        }else{
            $(".is_hidden_gia").css("display", "none");
            Cookies.set('gia', "false");
        }
        if ($('#tinh_trang_cb').is(":checked"))
        {
            $(".is_hidden_tinh_trang").css("display", "");
            Cookies.set('tinh_trang', "true");
        }else{
            $(".is_hidden_tinh_trang").css("display", "none");
            Cookies.set('tinh_trang', "false");
        }
        if ($('#tinh_trang_kd_cb').is(":checked"))
        {
            $(".is_hidden_active").css("display", "");
            Cookies.set('tinh_trang_kd', "true");
        }else{
            $(".is_hidden_active").css("display", "none");
            Cookies.set('tinh_trang_kd', "false");
        }
        if ($('#khu_vuc_cb').is(":checked"))
        {
            $(".is_hidden_khu_vuc").css("display", "");
            Cookies.set('khu_vuc', "true");
        }else{
            $(".is_hidden_khu_vuc").css("display", "none");
            Cookies.set('khu_vuc', "false");
        }
        if ($('#ngay_dang_cb').is(":checked"))
        {
            $(".is_hidden_ngay_dang").css("display", "");
            Cookies.set('ngay_dang', "true");
        }else{
            $(".is_hidden_ngay_dang").css("display", "none");
            Cookies.set('ngay_dang', "false");
        }
        if ($('#ngay_chinh_sua_cb').is(":checked"))
        {
            $(".is_hidden_ngay_chinh_sua").css("display", "");
            Cookies.set('ngay_chinh_sua', "true");
        }else{
            $(".is_hidden_ngay_chinh_sua").css("display", "none");
            Cookies.set('ngay_chinh_sua', "false");
        }
        
    });

    $("#bulk_active_btn").click(function () {
        $("#is_button").val("bulk_active");
        swal.fire({
            title: 'Are you sure?',
            text: "You wanna bulk active ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, active it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#frm_product_bulk_delete").submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {}
        })
    });

</script>
@endsection
