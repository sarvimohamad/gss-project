@extends('master')
@section('title','لیست درخواست ها')
@section('css')
    <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/plugins/JalaliDatePicker-main/dist/jalalidatepicker.min.css">
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست درخواست های ثبت شده</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a style="text-decoration: none ; padding-left: 5px" href="dashboard">خانه</a></li>
                            <li class="breadcrumb-item">مدیریت افتتاح حساب</li>
                            <li class="breadcrumb-item active">لیست درخواست ها</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست درخواست ها</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="all-request-table">
                            <form class="form-horizontal m-t-20" action="search-request" method="post"
                                  enctype="multipart/form-data">
                                <div class="row mb-3 mt-2">
                                    <div class="col-3">
                                        <input class="col-12" placeholder="نام خانوادگی،نام بانک"
                                               value=""
                                               type="search" id="search"
                                               name="searchText">
                                    </div>

                                    <div class="col-2">
                                        <input type="text" name="fromDate" placeholder="از تاریخ" id="fromDate"
                                               autocomplete="off" style="width:90%" data-jdp>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" name="toDate" placeholder="تا تاریخ" id="toDate"
                                               autocomplete="off" style="width:90%" data-jdp>
                                    </div>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button type="submit" class="request-btn" style="cursor:pointer">جستجو</button>
                                </div>
                            </form>

                            <table id="example1" class="table table-bordered open-account-table">
                                <thead>
                                <tr>
                                    <td>نوع درخواست</td>
                                    <td>شناسه درخواست</td>
                                    <td>نام شعبه</td>
                                    <td>کد شعبه</td>
                                    <td>ثبت کننده</td>
                                    <td>تاریخ ثبت</td>
                                    <td class="pr-5">وضعیت</td>
                                    <td class="pr-5">عملیات</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    @if(print_r($item->status->id == 1 ,true))
                                        <tr>
                                            <td>{{$item->typeRequest}}</td>
                                            <td>{{$item->typeRequest}}</td>
                                            <td>{{$item->bankName}}</td>
                                            <td>{{$item->code}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->mobile}}</td>
                                            <td class="td-state">
                                                <button disabled @if(print_r($item->status->id == 1 ,true)) class="btn btn-dark rounded button-status"
                                                        @elseif(print_r($item->status->id == 2 ,true)) class="btn btn-warning btn-sm rounded button-status"
                                                        @elseif(print_r($item->status->id == 3 ,true)) class="btn btn-success btn-sm rounded button-status"
                                                        @elseif(print_r($item->status->id == 2 ,true)) class="btn btn-danger btn-sm rounded button-status"
                                                    @endif()>{{$item->status->name}}</button>
                                            </td>

                                            <td>
                                                <div class="d-flex flex-row bd-highlight">
                                                    <div class=" pr-5">
                                                        <div>
                                                            <a href="{{route('show' , $item->id)}}"  class="btn btn-outline-info btn-sm">جزئیات</a>
                                                        </div>

                                                    </div>
                                                    @if(print_r($item->status->id == 1 ,true) && auth()->user()->role == 'bank')
                                                        <div class="">
                                                            <a href="{{route('edit' ,$item->id)}}" class="btn btn-outline-primary btn-sm">ویرایش</a>
                                                        </div>
                                                    @endif()
                                                </div>

                                            </td>
                                        </tr>
                                    @endif()
                                @endforeach()
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
                        <div class="btn-group mr-auto">
                            <button type="button" id="prevBtn" class="btn btn-primary" onclick="history.go(-1)">
                                <i class="fa fa-caret-right pl-1"></i> قبلی
                            </button>
                            {{--                            @if($searchStatus == 0)--}}
                            {{--                                <a href="requests?lastId={{$lastId}}" class="btn btn-primary" id="nextBtn">--}}
                            {{--                                    بعدی--}}
                            {{--                                    <i class="fa fa-caret-left pr-2"></i>--}}
                            {{--                                </a>--}}
                            {{--                            @else--}}
                            {{--                                <a href="search-request?lastId={{$lastId}}&searchText={{$searchText}}"--}}
                            {{--                                   class="btn btn-primary" id="nextBtn">--}}
                            {{--                                    بعدی<i class="fa fa-caret-left pr-2"></i>--}}
                            {{--                                </a>--}}
                            {{--                            @endif--}}
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <!-- DataTables -->
    <script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('/plugins/JalaliDatePicker-main/dist/jalalidatepicker.min.js')}}"></script>
    <script src="{{asset('/js/jdate.min.js')}}"></script>
    <script>
        {{--jalaliDatepicker.startWatch();--}}
        {{--var requests = {!! json_encode($queryResponse) !!};--}}

        {{--if (window.location.href.indexOf("?lastId") > -1) {--}}
        {{--    document.getElementById("prevBtn").disabled = false;--}}
        {{--} else {--}}
        {{--    document.getElementById("prevBtn").disabled = true;--}}
        {{--}--}}
        {{--if (requests.length < 11) {--}}
        {{--    document.getElementById("prevBtn").style.display = 'none';--}}
        {{--    document.getElementById("nextBtn").style.display = 'none';--}}
        {{--    document.getElementById("nextBtn").style.pointerEvents = 'none';--}}
        {{--    document.getElementById("nextBtn").style.cursor = 'default';--}}
        {{--}--}}

        // $(function () {
        //     $("#example1").DataTable({
        //         "language": {
        //             "paginate": {
        //                 "next": "بعدی",
        //                 "previous": "قبلی"
        //             }
        //         },
        //         "info": false,
        //         "paging": true,
        //         "lengthChange": true,
        //         "searching": true,
        //         "ordering": true,
        //         "autoWidth": true,
        //     });
        // });

    </script>
@endsection
