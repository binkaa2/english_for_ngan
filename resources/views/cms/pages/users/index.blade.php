@extends('cms.pages.layouts.layout')
@section('content')
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
                    <form action="{{route('users.import')}}" method="post" style="display:contents"
                        enctype="multipart/form-data">
                        @csrf
                        <input required="" type="file" class="form-control" style="margin-bottom:10px;" accept=".csv"
                            name="file">
                        <button type="submit" class="btn btn-secondary">+ Import</button>
                    </form>
                    <a style="margin-right:0px!important;"
                        href="{{route('users.export')}}?search={{Request::get('search')}}&date_from={{Request::get('date_from')}}&date_to={{Request::get('date_to')}}"
                        class="btn btn-secondary">Export</a>
                    <a href="{{route('users.create')}}" class="btn btn-secondary">+ Add</a>
                </div>
            </div>
            <div class="row pb-4">
                <form action="{{route('users.index')}}" method="GET" style="display:contents">
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
                                        class="form-control" name="search" placeholder="Search Listing" type="text">
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
                                    id="date_from" name="date_from" class="form-control datepicker input-3km"
                                    data-date-format="yyyy-mm-dd" value="">
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
                    <h3 class="mb-0">User Table</h3>
                    @if(Session::get('role') == "admin")
                    <button type="button" id="btn_bulk_delete" name="bulkDeleteBtn" value="true"
                        class="btn btn-danger">BULK DELETE</button>
                    @endif
                </div>
                <!-- Light table -->
                <div class="table-responsive" id="dvData">
                    <table id="tableData" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th class="sort text-center" sort><a href="
                                    @if(str_contains(request()->fullUrl(), 'display_name_asc'))
                                        {{ request()->fullUrlWithQuery(['sort' => 'display_name_desc']) }}
                                    @else
                                        {{ request()->fullUrlWithQuery(['sort' => 'display_name_asc']) }}
                                    @endif
                                ">
                                        Tên Người Dùng</a></th>
                                <th class="sort text-center" sort><a href="
                                    @if(str_contains(request()->fullUrl(), 'email_asc'))
                                        {{ request()->fullUrlWithQuery(['sort' => 'email_desc']) }}
                                    @else
                                        {{ request()->fullUrlWithQuery(['sort' => 'email_asc']) }}
                                    @endif
                                ">
                                        Email</a></th>
                                        <th class="sort text-center" sort><a href="
                                    @if(str_contains(request()->fullUrl(), 'is_seller_asc'))
                                        {{ request()->fullUrlWithQuery(['sort' => 'is_seller_desc']) }}
                                    @else
                                        {{ request()->fullUrlWithQuery(['sort' => 'is_seller_asc']) }}
                                    @endif
                                ">
                                        Is Seller</a></th>
                                        <th class="sort text-center" sort><a href="
                                    @if(str_contains(request()->fullUrl(), 'is_active_asc'))
                                        {{ request()->fullUrlWithQuery(['sort' => 'is_active_desc']) }}
                                    @else
                                        {{ request()->fullUrlWithQuery(['sort' => 'is_active_asc']) }}
                                    @endif
                                ">
                                        Is Active</a></th>
                                <th class="sort text-center" sort><a href="
                                    @if(str_contains(request()->fullUrl(), 'newest'))
                                        {{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}
                                    @else
                                        {{ request()->fullUrlWithQuery(['sort' => 'newest']) }}
                                    @endif
                                ">Ngày đăng</a></th>
                                <th class="sort text-center" sort><a href="
                                    @if(str_contains(request()->fullUrl(), 'updated_at_asc'))
                                        {{ request()->fullUrlWithQuery(['sort' => 'updated_at_desc']) }}
                                    @else
                                        {{ request()->fullUrlWithQuery(['sort' => 'updated_at_asc']) }}
                                    @endif
                                ">
                                        Ngày chỉnh sửa</a></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <form id="search-form" method="GET" action="{{route('users.index')}}">
                                <tr>
                                    <td></td>
                                    <td class="id">
                                        <input name="display_name" value="" class="form-control" type="text">
                                    </td>
                                    <td class="name">
                                        <input name="email" value="" class="form-control" type="text">
                                    </td>
                                    <td class="is_seller">
                                        <select name="is_seller" class="form-control">
                                            <option value="" selected=""></option>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </select>
                                    </td>
                                    <td class="is_active">
                                        <select name="is_active" class="form-control">
                                            <option value="" selected=""></option>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <button class="btn btn-icon btn-primary" type="submit">
                                            <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                                        </button>
                                    </td>
                                </tr>
                            </form>
                            <form style="display:contents" method="POST" id="frm_bulk_delete"
                                action="{{route('users.bulk_delete')}}">
                                @method('DELETE')
                                @csrf
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input name="user_cb[]" value={{$user->_id}} class="custom-control-input"
                                                id="user_cb{{$key}}" type="checkbox">
                                            <label class="custom-control-label" for="user_cb{{$key}}"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{$user->display_name ? $user->display_name : ""}}
                                    </td>
                                    <td class="text-center">
                                        {{$user->email ? $user->email : ""}}
                                    </td>
                                    <!-- <td>
                              {{ isset($user->phone) ? $user->phone : ""}}
                            </td> -->
                                    <td class="text-center">
                                        @if($user->is_seller)
                                        <span class="badge badge-default" style="background-color:#27AE60">TRUE</span>
                                        @else
                                        <span class="badge badge-default" style="background-color:#f68d20">FALSE</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($user->is_active)
                                        <span class="badge badge-default" style="background-color:#27AE60">TRUE</span>
                                        @else
                                        <span class="badge badge-default" style="background-color:#f68d20">FALSE</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span style="color:white;" class="badge bg-primary">
                                            {{date('d-m-Y H:i:s', strtotime($user->created_at))}} </span> </span>
                                    </td>
                                    <td class="text-center">
                                        <span style="color:white;" class="badge bg-primary">
                                            {{date('d-m-Y H:i:s', strtotime($user->updated_at))}} </span>
                                    </td>
                                    <td>
                                        <a href="{{route('users.show',$user->_id)}}">View</a>
                                    </td>
                                </tr>
                                @endforeach
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
    </form>
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
        $(location).attr('href', "{{route('users.index')}}");
    });
    $("#btn_bulk_delete").click(function () {
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
                $("#frm_bulk_delete").submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {}
        })
    });

</script>
@endsection
