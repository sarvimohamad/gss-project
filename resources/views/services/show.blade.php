@extends('master')
@section('title','مشخصات کاربر')
@section('css')
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
@endsection
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>مشخصات درخواست</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a style="text-decoration: none;" href="dashboard">خانه</a></li>
                            <li class="breadcrumb-item">لیست درخواست ها</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <div class="alert-div">
            @if (Session::has('success'))
                <div class="success" role="alert">
                    <ul class="box-div" style="list-style-type:none;">
                        <li class="font-alert">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-11 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between pr-5 py-4 ">
                            <h1 class="card-title font-weight-bold pl-5">نوع درخواست
                                <span
                                    style="color: #1f28eb">{{$service->type->name ?? '-'}}</span>
                            </h1>
                            <h5 class="font-weight-bold"> نام درخواست کننده: <span
                                    style="color: #11e4be">{{$service->name}}</span></h5>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="customer-info">
                            <div class="modal-body">

                                <div class="container p-5 mb-5" style="background-color:#fafdff">
                                    <div class="d-flex justify-content-around flex-wrap">
                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p>تاریخ
                                                ثبت درخواست
                                            <span
                                            class="customer-info-dark-blue pr-2">{{\Morilog\Jalali\Jalalian::forge($service->created_at)->format('%Y/%m/%d')}}</span>
                                            </p></div>
                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p> نام
                                                شعبه<span
                                                    class="customer-info-dark-blue pr-2">{{$service->bankName}}</span>
                                            </p>
                                        </div>
                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p>کد شعبه<span
                                                    class="customer-info-dark-blue pr-2">
                                                </span>{{$service->code_branch}} </p></div>
                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p> نام
                                                ثبت کننده<span
                                                    class="customer-info-dark-blue pr-2">{{$service->name}}</span>
                                            </p>
                                        </div>
                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p>شماره
                                                موبایل <span
                                                    class="customer-info-dark-blue pr-2">{{$service->mobile}}</span>
                                            </p></div>
                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p>تلفن
                                                ثابت
                                                <span class="customer-info-dark-blue pr-2">{{$service->telephone}}
                                                </span></p></div>

                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p>
                                                استان<span
                                                    class="customer-info-dark-blue pr-2">{{$service->province->name ?? '-'}}</span>
                                            </p></div>

                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p>
                                                شهر<span
                                                    class="customer-info-dark-blue pr-2">{{$service->city->name ?? '-'}}</span>
                                            </p></div>
                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p>آدرس
                                                <span
                                                    class="customer-info-dark-blue pr-2">{{$service->address}}</span>
                                            </p></div>
                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p>توضیحات
                                                <span
                                                    class="customer-info-dark-blue pr-2">{{$service->desc}}</span>
                                            </p></div>
                                    </div>
                                    @if(in_array($service->demand , ['approve' , 'decline']))
                                        <div class="customer-info-grey customer-info-items font-size-14 px-2"><p>وضعیت
                                                بررسی شعبه
                                                <span
                                                    class="customer-info-dark-blue pr-2">
                                                     @if($service->demand == 'approve') تایید درخواست
                                                    @elseif($service->demand == 'decline') عدم تایید درخواست
                                                    @endif()
                                                </span>
                                            </p></div>
                                    @endif()
                                </div>


                                <div class="div-alert">
                                    @if(auth()->user()->role == 'user')
{{--                                        @if(!$service->demand == ['decline' , 'approve'])--}}

                                            @if(in_array( $service->status_id ,[1,2,3,5] ))
                                                <form action="{{route('add.message' , [$service->id])}}" method="post">
                                                    @csrf
                                                  <div class="d-flex justify-content-center">
                                                      <div class="col-6">
                                                          <select class="form-select select-item  form-select-md  mr-1 ml-1" style="display: none"
                                                                  name="status">

                                                              @foreach($statuses as $status)
                                                                  <option @if($status->id == $service->status_id) selected
                                                                          @endif @if(in_array($status->id ,[1,2,4])) disabled
                                                                          @endif() value="{{$status->id}}">{{$status->name}}</option>
                                                              @endforeach()
                                                          </select>
                                                      </div>

                                                  </div>

                                                    <div class="d-flex justify-content-center mt-5">
                                                        <div class="form-group">
                                                            <div class="pb-1">پیام خود را وارد کنید:</div>
                                                            <div class="textarea2" style="display: none">توضیحات</div>
                                                            <textarea name="text" class="form-control DropDownStatus"
                                                                      rows="3" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-center pt-3 mt-3 mb-5">
                                                        <input type="submit" class="btn btn-primary btn-md"
                                                               value="ارسال به شعبه">
                                                    </div>
                                                </form>
                                            @else()
                                                <div class="d-flex justify-content-center pt-3 mt-3">
                                                    <div class="alert-demand" style="height: 3rem ;display: none">
                                                        @if($service->demand == 'approve')
                                                            <p class="alert-para">شما درخواست را تایید کرده اید</p>
                                                        @elseif($service->demand == 'decline')
                                                            <p class="alert-para">شما درخواست را تایید نکرده اید</p>
                                                        @endif()
                                                    </div>
                                                </div>

{{--                                                <div class="d-flex justify-content-center pt-3 mt-3">--}}
{{--                                                    <div class="alert-demand" style="height: 3rem">--}}
{{--                                                        <p class="alert-para">درخواست توسط شعبه ارسال شده</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                            @endif()
{{--                                        @endif()--}}
                                    @endif()
                                </div>

                                <div class="">
{{--                                    {{$message->user->role}}--}}
{{--                                    {{auth()->user()->role}}--}}


                                    @if($service->demand !== 'approve')
                                        <form class="verify-form" method="post"
                                              action="{{route('verify' , $service->id)}}">
                                            @csrf
                                            @if(auth()->user()->role == 'bank' and !in_array($service->status->id,[1,2]) and $message->user->role !== auth()->user()->role)

                                                <div class="d-flex justify-content-center m-3">
                                                    <div class="col-6">
                                                        <select class="form-select form-select-md mb-3 select-item"
                                                                style="background-color: #e1e7e7"
                                                                aria-label=".form-select-md example" name="demand">
                                                            <option selected value="response">ارسال پاسخ</option>
                                                            <option value="approve">تایید درخواست</option>
                                                            <option value="decline">عدم تایید درخواست</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-center mt-5">
                                                    <div class="form-group">
                                                        <div class="textarea2" style="display: none">توضیحات</div>
                                                        <textarea name="text" class="form-control DropDown"
                                                                  rows="3"></textarea>
                                                    </div>
                                                </div>


                                                <div class="col-sm-12 text-center">
                                                    <input type="submit" value="تایید" class="btn btn-success">
                                                </div>
                                        </form>
                                    @endif()

                                @endif()

{{--                                @if(auth()->user()->role == 'bank')--}}
{{--                                    @if($service->demand == 'approve')--}}
{{--                                        <div class="d-flex justify-content-center mb-5">--}}
{{--                                            <div class="div-alert-bank">--}}
{{--                                                <div>درخواست شما ارسال شده است--}}
{{--                                                    <span>شما درخواست را--}}
{{--                                                @if($service->demand == 'approve')--}}
{{--                                                            تایید کرده اید.--}}
{{--                                                        @elseif($service->demand == 'decline')--}}
{{--                                                            تایید نکرده اید.--}}
{{--                                                        @endif()--}}
{{--                                                        @endif()--}}
{{--                                                </span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endif()--}}


                                @if($service->messages->count())
                                    @foreach($service->messages as $message)

                                                <?php
                                                $time = \Morilog\Jalali\Jalalian::forge($message->created_at)->format('%H:%M:%S %Y/%m/%d');
//                                            \Morilog\Jalali\Jalalian::forge($request->createtime)->format('%H:%M:%S  %Y/%m/%d')
//                                            ." ".explode(" ",$message->service->created_at)[1]
                                                ?>
                                                <div class="col-12 mb-2 mt-1  pt-3">
                                                    <div class="row">
                                                <div class="d-flex justify-content-center">
                                                    <div class="col-2 pr-5 mt-3 pl-5 d-flex justify-content-end  flex-column bd-highlight ">
                                                        <div class=" bd-highlight"><label for="user"  class="form-label">{{$message->user->name}}:</label></div>
                                                        <div class=" bd-highlight"><p class="">{{$time}}</p></div>
                                                    </div>


                                                    <div class="message-box @if($message->user_id == auth()->user()->id) message-box-user @else message-box-bank @endif mt-2">
                                                        <div class="col-8 p-0"><p id="user">{!! nl2br($message->text) !!}</p></div>
                                                    </div>
                                                    <div class="col-2"></div>
                                                </div>
                                                </div>
                                                </div>
                                    @endforeach
                                @endif

                                    <div class="d-flex justify-content-center  pt-5">
                                        @if($service->status->id == 1)
                                            <a href="{{route('index')}}"
                                               class="btn btn-outline-secondary btn-sm">بازگشت</a>
                                        @endif()
                                    </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


    </div>
    </div>

    </section>
    </div>



@endsection
