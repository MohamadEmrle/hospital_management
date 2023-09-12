
@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title','الأسعار')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> الأسعار </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الأسعار</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء السعر</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء السعر جديد</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form  method="POST" action="{{route('prices.store')}}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نسبة الدكتور</label>
                                                <input name="Profits_Dr" type="text" class="form-control"  placeholder="نسبة الدكتور" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">نسبة المركز</label>
                                                <input name="Profits_center" type="text" class="form-control"  placeholder="نسبة المركز" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">القيمة الإجمالية</label>
                                                <input name="total_value" type="text" class="form-control"  placeholder="القيمة الإجمالية" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الطبيب</label>
                                                <select name="doctor_id" class="form-control select-lg select2">
                                                    <option>أختر الطبيب</option>
                                                    @foreach ($doctors as $row )
                                                        <option value="{{ $row->id }}">{{ $row->name_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">انشئ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <table id="table" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th>التسلسل</th>
                            <th>نسبة الدكتور</th>
                            <th>نسبة المركز</th>
                            <th>القيمة الإجمالية</th>
                            <th>الطبيب</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody >
                            @php
                                $number = 0;
                            @endphp
                        @foreach ($prices as $price)
                        @php
                            $number++;
                        @endphp
                            <tr>
                                <td>{{$number}}</td>
                                <td>{{$price->Profits_Dr}} جنيه</td>
                                <td>{{$price->Profits_center}} جنيه</td>
                                <td>{{$price->total_value}} جنيه</td>
                        @if(LaravelLocalization::getCurrentLocale() == 'en')
                                <td>{{$price->doctors->name_en }}</td>
                        @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                            <td>{{$price->doctors->name_ar }}</td>
                        @endif
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$price->id}}" ><i  class="fas fa-user-edit"></i>التحرير</button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$price->id}}" ><i style="color:red" class="fas fa-user-minus"></i>الحذف</button>
                                    </div>
                                </td>

                            </tr>
                            
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete{{$price->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">حذف المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>لا تحذف السعر هل انت واثق؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لإغلاق</button>
                                              <form action="{{route('prices.destroy',$price->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">الحذف</button>

                                            </form>  

                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                            <!-- /.modal -->
                            <!-- Change Modal -->
                            <div class="modal fade" id="modal-edit{{$price->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">تحرير المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                        <form  method="POST" action="{{url('admin/prices/update',$price->id)}}"  enctype="multipart/form-data">
                                                @csrf
                                            {{--  <input type="hidden" name="id" value="{{$price->id}}">    --}}
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">نسبة الدكتور</label>
                                                        <input name="Profits_Dr" value="{{ $price->Profits_Dr }}" type="text" class="form-control"  placeholder="نسبة الدكتور" required autocomplete="off" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">نسبة المركز</label>
                                                        <input name="Profits_center" value="{{ $price->Profits_center }}" type="text" class="form-control"  placeholder="نسبة المركز" required autocomplete="off" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">القيمة الإجمالية</label>
                                                        <input name="total_value" value="{{ $price->total_value }}" type="text" class="form-control"  placeholder="القيمة الإجمالية" required autocomplete="off" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الطبيب</label>
                                                        <select name="doctor_id" class="form-control select-lg select2">
                                                            <option>أختر الطبيب</option>
                                                            @foreach ($doctors as $row )
                                                                <option value="{{ $row->id }}">{{ $row->name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
        
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">التحرير</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            
                                                <!-- /.card-body -->

                                               
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                         @endforeach 
                    </table>

                </div>
            </div>
        </div>
    </div>



@endsection
