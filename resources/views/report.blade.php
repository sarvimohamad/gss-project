@extends('master')
@section('content')

        <div class="content-wrapper">
            <div class="content-header">
                    <div class="">
                        <div class="col-12 ">
                            <div class="d-flex justify-content-between ">
                                <div class="head-list">
                                    <div class="col-12">
                                        <li class="breadcrumb-item font-weight-bold">
                                            گزارشات
                                        </li>
                                    </div>
                                </div>

                                <form class="mb-2" >
                                    <div class="form-row">
                                        <div class="form-group col-sm">
                                            <label for="inputEmail4">سرویس کار</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected></option>
                                                <option></option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm">
                                        </div>
                                        <div class="form-group col-sm">
                                        </div>
                                        <div class="form-group col-sm">
                                            <label for="inputPassword4">نام مدل</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected></option>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-3">
                                            <label for="inputEmail4">تاریخ پذیرش از</label>
                                            <input type="date" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="inputPassword4">تا</label>
                                            <input type="date" class="form-control" id="inputPassword4">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="inputPassword4">تاریخ تحویل از</label>
                                            <input type="date" class="form-control" id="inputPassword4">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="inputPassword4">تا</label>
                                            <input type="date" class="form-control" id="inputPassword4">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary center small">نمایش</button>
                                    </div>
                                </form>


                                <div class="pr-1">
                                    <select class="select-save">
                                        <option selected disabled>ذخیره فایل</option>
                                        <option>ذخیره EXCEL</option>
                                        <option>ذخیره PDF</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex pt-3 m-2">
                            <table class="table table-content">
                                <thead class="table-primary">
                                <td>
                                    <input type="checkbox" id='chkCheckAll'/>

                                </td>
                                <td>شماره کار</td>
                                <td>نماینده</td>
                                <td>نام مشتری</td>
                                <td> تلفن</td>
                                <td> سریال</td>
                                <td> مدل</td>
                                <td> نوع کار</td>
                                <td>شماره فاکتور</td>
                                <td>تغییر</td>
                                <td>وضعیت</td>
                                </thead>
                                <tbody id="myTable">
                                <tr>
                                    <td>
                                        <input type="checkbox" name="ids" class='checkBoxClass'
                                               value=""/>
                                    </td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>

                                        <div class="">
                                            <form class="form-del-record" action="#" method="post">
                                                @method('delete')
                                                @csrf
                                                <a class="del-btn"
                                                   onclick="return confirm('آیا از پاک کردن این محصول اطمینان دارید؟')">
                                                    <img class="pr-3 del-icon"
                                                         src="/images/menu-icons/Iconly_Bold_Close Square.svg">
                                                </a>
                                            </form>

                                        </div>

                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="row pt-2">
                            <div class="col-3 d-flex justify-content-start pr-5 pb-3">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>-- انتخاب گزارش --</option>
                                    <option>گزارش پذیرش</option>
                                    <option>گزارش کل لیست</option>
                                    <option>گزارش تعمیر نمایندگان</option>
                                </select>
                            </div>
                            <div class="col-6 d-flex justify-content-center">
                                <button class="btn btn-success small">نمایش گزارش</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

@endsection()
