@extends('master')
@section('content')

    <div class="content-wrapper">
        <div class="p-2 pb-5 text-bold">
            درخواست ارزیابی
        </div>
        <div class="alert-div">
            @if (\Session::has('success'))
                <div class="success"  role="alert">
                    <ul class="box-div" style="list-style-type:none;">
                        <li class="font-alert">{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
        </div>
        <form method="post" action="{{route('store')}}" class="form-group form-inline ">
            @csrf

            <div class="col-12 mb-1 ">
                <div class="row">
                    <div class="form-group col-md-5 col-12 text-center mx-auto ">
                        <div class="col-4 p-0">
                            <label for="firstNameInput" class="ml-2">* نوع درخواست</label>
                        </div>
                        <div class="col-8 p-0">
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option selected disabled >-- انتخاب --</option>
                                @foreach($typeRequest as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach()

                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-5 col-12 text-center mx-auto">
                        <div class="col-4 p-0">
                            <label for="input-State" class="form-label">استان</label>
                        </div>
                        <div class="col-8 p-0">
                            <select class="form-select" name="province">
                                <option>-- انتخاب --</option>
                                @foreach($province as $rows)
                                    <option value="{{$rows->id}}">{{$rows->name}}</option>
                                @endforeach()
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3 ">
                <div class="row">
                    <div class="form-group col-md-5 col-12 text-center mx-auto ">

                    </div>
                    <div class="form-group col-lg-5 col-12 text-center mx-auto">
                        <div class="col-4 p-0">
                            <label for="input-State" class="form-label">شهر</label>
                        </div>
                        <div class="col-8 p-0">
                            <select class="form-select" name="city">
                                <option>-- انتخاب --</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3 ">
                <div class="row">
                    <div class="form-group col-md-5 col-12 text-center mx-auto ">
                        <div class="col-4 p-0">
                            <label for="inputPassword4" class="form-label">نام بانک-نام شعبه</label>
                        </div>
                        <div class="col-8 p-0">
                            <input name="bankName" type="text" class="form-control" id="inputPassword4"  autocomplete="off"  required>
                        </div>
                    </div>
                    <div class="form-group col-lg-5 col-12 text-center mx-auto">
                        <div class="col-4 p-0">
                            <label for="inputEmail4" class="form-label">کد شعبه</label>
                        </div>
                        <div class="col-8 p-0">
                            <input name="code_branch" type="text" class="form-control" id="inputEmail4"
                                    autocomplete="off" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3 ">
                <div class="row">
                    <div class="form-group col-md-5 col-12 text-center mx-auto ">
                        <div class="col-4 p-0">
                            <label for="inputEmail4" class="form-label">مرکز ارسال</label>
                        </div>
                        <div class="col-8 p-0">
                            <input name="post_center" type="text" class="form-control" id="inputEmail4"  autocomplete="off" required >
                        </div>
                    </div>
                    <div class="form-group col-lg-5 col-12 text-center mx-auto">
                        <div class="col-4 p-0">
                            <label for="inputEmail4" class="form-label">تماس گیرنده</label>
                        </div>
                        <div class="col-8 p-0">
                            <input name="name" type="text" class="form-control" id="inputEmail4"   autocomplete="off" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3 ">
                <div class="row">
                    <div class="form-group col-md-5 col-12 text-center mx-auto ">
                        <div class="col-4 p-0">
                            <label for="inputMobile" class="form-label">تلفن همراه</label>
                        </div>
                        <div class="col-8 p-0">
                            <input name="tel" type="text" class="form-control" id="inputMobile"  autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group col-lg-5 col-12 text-center mx-auto">
                        <div class="col-4 p-0">
                            <label for="inputEmail4" class="form-label">تلفن ثابت</label>
                        </div>
                        <div class="col-8 p-0">
                            <input name="telephone" type="tel" class="form-control" id="inputEmail4"  autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3 ">
                <div class="row">
                    <div class="form-group col-md-5 col-12 text-center mx-auto ">
                        <div class="col-4 p-0">
                            <label for="inputEmail4" class="form-label">مشخصات محصول</label>
                        </div>
                        <div class="col-8 p-0">
                            <input name="typeRequest" type="text" class="form-control" id="inputEmail4" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group col-lg-5 col-12 text-center mx-auto">
                        <div class="col-4 p-0">
                            <label for="inputPassword4" class="form-label">سریال</label>
                        </div>
                        <div class="col-8 p-0">
                            <input name="serial" type="text" class="form-control" id="inputPassword4" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3 ">
                <div class="row">
                    <div class="form-group col-md-5 col-12 text-center mx-auto ">
                        <div class="col-4 p-0">
                            <label for="inputZip" class="form-label">خرابی اعلامی</label>
                        </div>
                        <div class="col-8 p-0">
                            <input name="breakdown" type="text" class="form-control" id="inputZip" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group col-lg-5 col-12 text-center mx-auto">


                    </div>
                </div>
            </div>


            <div class="col-12 mb-3 mt-3 ">
                <div class="row">
                    <div class="form-group textarea-address" >
                        <div class="col-2 pr-5">
                            <label for="inputAddress" class="form-label">آدرس</label>
                        </div>
                        <div class="col-10 p-0">
                            <textarea name="address" type="text" class="form-group" id="inputAddress" rows="1" autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3 mt-3 ">
                <div class="row">
                    <div class="form-group textarea-address" >
                        <div class="col-2 pr-5">
                            <label for="inputAddress" class="form-label">اظهار نظر مشتری</label>
                        </div>
                        <div class="col-10 p-0">
                            <textarea name="address" type="text" class="form-group" id="inputAddress" autocomplete="off" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>

          <div class="col-12">
              <div class="d-flex justify-content-center  pt-3">
                  <input  type="submit" class="btn btn-primary" value="ارسال به شرکت">
              </div>
          </div>


        </form>

    </div>
    @endsection()