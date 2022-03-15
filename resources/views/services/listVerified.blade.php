@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
                <div class="col-12 ">
                    <div class="d-flex justify-content-between pt-3 m-2">
                        <div class="head-list">
                            <div class="col-12">
                                <li class="breadcrumb-item font-weight-bold">
                                   لیست درخواست های تایید شده
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
                        <td>
                            <input type="checkbox" id='chkCheckAll'/>

                        </td>
                        <td>نوع درخواست</td>
                        <td>نام بانک</td>
                        <td>کد شعبه</td>
                        <td> تماس گیرنده</td>
                        <td> تلفن همراه</td>
                        <td>وضعیت</td>
                        </tr>
                        </thead>
                        <tbody id="myTable">
                        @foreach($data as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" name="ids" class='checkBoxClass'
                                           value=""/>
                                </td>
                                <td>{{$item->typeRequest}}</td>
                                <td>{{$item->bankName}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>
                                   <div class="d-flex flex-row">
                                       <div>
                                           <form action="{{route('show' , $item->id)}}">
                                               @csrf
                                               <button  class="btn btn-outline-info btn-sm">جزئیات</button>
                                           </form>
                                       </div>
                                       @if(auth()->user()->role == 'admin')
                                           <div>
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
                                       @endif()
                                   </div>



                                </td>
                        </tr>
                        @endforeach()

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection()
