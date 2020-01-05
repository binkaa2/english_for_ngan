@extends('cms.pages.layouts.layout')
@section('content')
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">User Report</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Report</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">

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
                    <h3 class="mb-0">User Report Table</h3>
                  </div>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th>UserID</th>
                          <th>Reported By</th>
                          <th>message</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @foreach($users_report as $user)
                        <tr>
                            <td>
                              @isset($user->user_id)
                                <a href="{{route('users.show',$user->user_id->_id)}}">{{$user->user_id->_id}}</a>
                              @else 
                                <span class="badge badge-default" style="background-color:#f5365c">No data</span>
                              @endif
                            </td>
                            <td>
                                @if(isset($user->reported_by->_id))
                                <a href="{{route('users.show',$user->reported_by->_id)}}">{{$user->reported_by->_id}}</a>
                                @endif
                            </td>
                            <td class="text-break">
                               @isset($user->message)
                                 {{$user->message}}
                                @else 
                                <span class="badge badge-default" style="background-color:#f5365c">No data</span>
                               @endif
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
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script>

</script>
@endsection