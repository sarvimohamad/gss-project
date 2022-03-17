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
                        <h1>لیست درخواست ها</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a style="text-decoration: none ; padding-left: 5px" href="{{route('home')}}">خانه</a></li>
                            <li class="breadcrumb-item "><a style="text-decoration: none ; padding-left: 5px" href="{{route('index')}}">لیست درخواست ها</a></li>
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

                        <!-- /.card-header -->
                        <div class="card-body" id="all-request-table">
                            <form class="form-horizontal m-t-20" action="{{route('index' ,'q =$s' )}}" method="get"
                                  enctype="multipart/form-data">
                                <div class="row mb-3 mt-2">
                                    <div class="col-3">
                                        <input class="col-12" placeholder="  نوع درخواست ، نام ثبت کننده ، نام بانک" name="q"  type="search" id="search" autocomplete="off" >
                                    </div>
                                    <div class="col-2">
                                        <select class="col-12" name="status" id="status">
                                            <option value="">وضعیت</option>
                                        @foreach($status as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <input  class="datepicker_from" placeholder="از تاریخ"
                                                style="width:90%" >
                                        <input type="hidden" name="date_from" class="datepicker_from_alt">
                                    </div>
                                    <div class="col-2">
                                        <input class="datepicker_to" placeholder="تا تاریخ"
                                               autocomplete="off" style="width:90%" >
                                        <input type="hidden" name="date_to" class="datepicker_to_alt">
                                    </div>
                                    <div class="col-2">
                                    <input type="submit" value="جستجو" class="request-btn">
                                    </div>
                                </div>
                            </form>

                            <table id="example1" class="table table-bordered open-account-table">
                                <thead>
                                <tr class="text-center">
                                    <th>نوع درخواست</th>
                                    <th> نام ثبت کننده</th>
                                    <th>نام شعبه</th>
                                    <th>کد شعبه</th>
                                    <th>تاریخ درخواست</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <?php
                                    $time = \Morilog\Jalali\Jalalian::forge($item->created_at)->format('%H:%M:%S  %Y/%m/%d');
                                    ?>
                                    <tr class="text-center">
                                        <td>{{$item->type->name ?? '-'}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->bankName}}</td>
                                        <td>{{$item->code_branch}}</td>
                                        <td>{{$time}}</td>
                                        <td class="text-center">
                                            <button disabled
                                                    @if(print_r($item->status->id == 1 ,true)) class="btn btn-dark btn-sm rounded button-status"
                                                    @elseif(print_r($item->status->id == 2 ,true)) class="btn btn-warning btn-sm rounded button-status"
                                                    @elseif(print_r($item->status->id == 3 ,true)) class="btn btn-primary btn-sm rounded button-status"
                                                    @elseif(print_r($item->status->id == 4 ,true)) class="btn btn-success btn-sm rounded button-status"
                                                    @elseif(print_r($item->status->id == 5 ,true)) class="btn btn-danger btn-sm rounded button-status"
                                                @endif()>{{$item->status->name}}</button>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row bd-highlight ">
                                                <div class="p-1">
                                                    <div>
                                                        <a class="more-info-btn" href="{{route('show' , $item->id)}}">جزئیات<img
                                                                src="/images/SVG/Arrow - Down 4.svg" alt="..."
                                                                class="pr-1">
                                                        </a>
                                                    </div>
                                                </div>
                                                @if(print_r($item->status->id == 1 ,true) && auth()->user()->role == 'bank')
                                                    <div class="p-1">
                                                        <a href="{{route('edit' ,$item->id)}}"
                                                           class="more-info-btn">ویرایش<img
                                                                src="/images/SVG/Arrow - Down 4.svg" alt="..."
                                                                class="pr-1"></a>
                                                    </div>
                                                @endif()
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-0">
                        <div class="btn-group mr-auto">
                            <span> {{ $data->links("pagination") }}</span>
{{--                            <button type="button" id="prevBtn" class="btn btn-primary" onclick="history.go(-1)">--}}
{{--                                <i class="fa fa-caret-right pl-1"></i> قبلی--}}
{{--                            </button>--}}
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
    $(document).ready(function(){
        $('.datepicker_from').pDatepicker({
            initialValue: false,
            format: 'YYYY-MM-DD',
            altField: '.datepicker_from_alt',
        });
        $('.datepicker_to').pDatepicker({
            initialValue: false,
            format: 'YYYY-MM-DD',
            altField: '.datepicker_to_alt',
        });
    })
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
