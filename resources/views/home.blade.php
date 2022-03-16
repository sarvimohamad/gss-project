@extends('master')
@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">پیشخوان</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a style="text-decoration: none" href="">خانه</a></li>
                            <li class="breadcrumb-item "><a style="text-decoration: none" href="{{route('index')}}"> لیست درخواست ها</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->





        <!-- Main content -->
        <section class="content">
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box one text-white">
                            <div class="inner pb-5">
                                <div class="box-icon d-inline-block">
                                    <img src="/images/SVG/Two color_ Note.svg" alt="icon" class="img-fluid">
                                </div>

                                <p  class="mb-0"> کل درخواست ها ({{$services}})</p>
                            </div>
                        </div>
                    </div>


                    @foreach($status as $key=>$item)
                        <div class="col-lg-3 col-6">
                            <div class="small-box box-{{$key+1}} text-white">
                                <div class="inner pb-5">
                                    <div class="box-icon d-inline-block">
                                        <img src="/images/SVG/Two color_ Note-Plus.svg" alt="icon" class="img-fluid">
                                    </div>
                                    <p class="mb-0">{{$item->name}} ({{$item->services->count()}})</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
{{--                    <!-- ./col -->--}}
{{--                    <div class="col-lg-3 col-6">--}}
{{--                        <!-- small box -->--}}
{{--                        <div class="small-box two text-white">--}}
{{--                            <div class="inner pb-5">--}}
{{--                                <div class="box-icon d-inline-block">--}}
{{--                                    <img src="/images/SVG/Two color_ Note-Plus.svg" alt="icon" class="img-fluid">--}}
{{--                                </div>--}}

{{--                                @foreach($services as $service)--}}
{{--                                    <h4>{{$service->count()}}</h4>--}}
{{--                                @endforeach--}}


{{--                                <p class="mb-0">درخواست های در انتظار پاسخ</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- ./col -->--}}
{{--                    <div class="col-lg-3 col-6">--}}
{{--                        <!-- small box -->--}}
{{--                        <div class="small-box three text-white">--}}
{{--                            <div class="inner pb-5">--}}
{{--                                <div class="box-icon d-inline-block">--}}
{{--                                    <img src="/images/SVG/Two color_ Note-Down.svg" alt="icon" class="img-fluid">--}}
{{--                                </div>--}}
{{--                                <h4></h4>--}}

{{--                                <p class="mb-0">درخواست های تایید شده</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- ./col -->--}}
{{--                    <div class="col-lg-3 col-6">--}}
{{--                        <!-- small box -->--}}
{{--                        <div class="small-box four text-white">--}}
{{--                            <div class="inner pb-5">--}}
{{--                                <div class="box-icon d-inline-block">--}}
{{--                                    <img src="/images/SVG/Two color_ Note-Failed.svg" alt="icon" class="img-fluid">--}}
{{--                                </div>--}}
{{--                                <h4></h4>--}}
{{--                                <p class="mb-0">درخواست های رد شده</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- ./col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
