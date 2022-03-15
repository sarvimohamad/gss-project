
{{--@extends('master')--}}
{{--@section('content')--}}
{{--    <div class="content-wrapper">--}}
{{--        <div class="content-header">--}}
{{--            <div class="container-fluid">--}}
{{--                @if(auth()->user()->role == 'admin')--}}
{{--                <div class="col-12">--}}
{{--                    <div class="d-flex justify-content-center pb-5 ">--}}
{{--                        <div>--}}
{{--                            <a href="{{route('ListBank')}}" class="btn btn-primary btn-lg">لیست درخواست ها </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endif()--}}

{{--                <div class="col-12">--}}
{{--                    <div class=" d-flex justify-content-center p-5 ">--}}
{{--                        <div class="col-8 d-flex justify-content-center">--}}
{{--                            <table class="table table-bordered">--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <th>نام</th>--}}
{{--                                    <td class="d-flex justify-content-center">{{$service->name}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>تلفن همراه</th>--}}
{{--                                    <td class="d-flex justify-content-center">{{$service->mobile}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>تلفن ثابت</th>--}}
{{--                                    <td class="d-flex justify-content-center">{{$service->telephone}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>نوع درخواست</th>--}}
{{--                                    <td class="d-flex justify-content-center">{{$service->typeRequest}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>نام بانک</th>--}}
{{--                                    <td class="d-flex justify-content-center">{{$service->bankName}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>شماره سریال</th>--}}
{{--                                    <td class="d-flex justify-content-center">{{$service->serial}}</td>--}}
{{--                                </tr>--}}

{{--                                <tr>--}}
{{--                                    <th>استان و شهر</th>--}}
{{--                                    <td class="d-flex justify-content-center">{{$service->province}} , {{$service->city}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th> آدرس</th>--}}
{{--                                    <td class="d-flex justify-content-center">{{$service->address}}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th> وضعیت</th>--}}
{{--                                    <td class="d-flex justify-content-center">{{$service->status->name}}</td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}

{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @if(auth()->user()->role == 'bank')--}}
{{--                        <div class="col-12">--}}
{{--                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">--}}
{{--                                <option value="1">رد درخواست</option>--}}
{{--                                <option value="2">تایید درخواست</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlTextarea1">توضیحات</label>--}}
{{--                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
{{--                        </div>--}}
{{--                        <div class="text-center">--}}
{{--                            <button class="btn btn-success">تایید</button>--}}
{{--                        </div>--}}
{{--                    @endif()--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-12">--}}
{{--                <div class="d-flex justify-content-center">--}}
{{--                    --}}{{--                    <form action="{{route('pending' , $service->id)}}" method="post">--}}
{{--                    --}}{{--                        @csrf--}}
{{--                    --}}{{--                        --}}
{{--                    --}}{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection()--}}

