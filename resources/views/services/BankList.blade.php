@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="col-12 ">
                <div class="d-flex justify-content-between pt-3 m-2">
                    <div class="head-list">
                        <div class="col-12">
                            <li class="breadcrumb-item font-weight-bold">
                                لیست درخواست های درحال بررسی
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex pt-3 m-2">
                    <table class="table table-content">
                        <thead class="table-dark">
                        <tr>

                            <td>نوع درخواست</td>
                            <td>نام بانک</td>
                            <td>کد شعبه</td>
                            <td> تماس گیرنده</td>
                            <td> تلفن همراه</td>
                            <td> وضعیت</td>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach($data as $list)
                        <tr>
                            <td>{{$list->typeRequest}}</td>
                            <td>{{$list->bankName}}</td>
                            <td>{{$list->code}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->mobile}}</td>
                            <td>{{$list->status->name}}</td>
                        </tr>
                        @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection()
