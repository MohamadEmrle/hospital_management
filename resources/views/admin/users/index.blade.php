
@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title','المستخدمين')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> المستخدمين </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">المستخدمين</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء مستخدم</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء مستخدم جديد</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form  method="POST" action="{{route('users.store')}}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الأسم بالإنكليزي</label>
                                                <input name="name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="أدخل اسم المستخدم" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الأسم بالعربي</label>
                                                <input name="name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="أدخل اسم المستخدم" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">البريد الالكتروني</label>
                                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="أدخل البريد الإلكتروني" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">كلمة المرور</label>
                                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">اعادة كلمة المرور</label>
                                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="اعادة كلمة المرور" required autocomplete="off">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">تاريخ الميلاد</label>
                                                <input name="birthDate" class="form-control fc-datepicker hasDatepicker" placeholder="ماه / روز / سال" type="date" id="dp1673689668871">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">كيف تعرفت علينا</label>
                                                <div class="form-group">
                                                    <select name="question" class="form-control select-lg select2">
                                                        <option value="1">غوغل</option>
                                                        <option value="2">فيسبوك</option>
                                                        <option value="3">صديق</option>
                                                        <option value="4">اخرى</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">العنوان</label>
                                                <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="العنوان" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">رقم الهاتف</label>
                                                <input name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="أدخل رقم المستخدم" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">صورية شخصية</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="profile" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
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
                            <th>صورة المستخدم</th>
                            <th>الاسم</th>
                            <th>الايميل</th>
                            <th>تاريخ العضوية</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody >
                        @foreach ($users as $user)
                            <tr>
                            @if(LaravelLocalization::getCurrentLocale() == 'en')
                                <td> <img class="img" src="{{ asset('images/users/'.$user->profile) }}" width="50" height="50"></td>
                                <td>{{$user->name_en}}</td>
                            @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                                <td><img class="img" src="{{ asset('images/users/'.$user->profile) }}" width="50" height="50"></td>
                                <td>{{$user->name_ar}}</td>
                            @endif
                                <td>{{$user->email}}</td>
                                <td>
                                    <button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="{{$user->created_at}}">
                                       {{--  {{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('%A, %d %B %Y')}} --}}
                                     {{$user->created_at}}
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="{{route('users.show',$user->id)}}" class="btn btn-success dropdown-item"><i  class="fas fa-user-edit"></i>مشاهدة</button></a>
                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$user->id}}" ><i  class="fas fa-user-edit"></i>التحرير</button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$user->id}}" ><i style="color:red" class="fas fa-user-minus"></i>الحذف</button>
                                    </div>
                                </td>

                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete{{$user->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">حذف المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>لا تحذف المستخدم  `{{$user->name_en}}` هل انت واثق؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لإغلاق</button>
                                            <form action="{{route('users.destroy',$user->id)}}" method="POST">
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
                            <div class="modal fade" id="modal-edit{{$user->id}}">
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
                                            <form  method="POST" action="{{route('users.update',$user->id)}}"  enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الأسم بالإنكليزي</label>
                                                        <input name="name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="{{$user->name_en}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الأسم بالعربي</label>
                                                        <input name="name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="{{$user->name_ar}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">البريد الالكتروني</label>
                                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="{{$user->email}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">كلمة مرور جديدة</label>
                                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">تكرار كلمة المرور</label>
                                                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">تاريخ الميلاد</label>
                                                        <input name="birthDate" value="{{ $user->birthDate }}" class="form-control fc-datepicker hasDatepicker" placeholder="ماه / روز / سال" type="date" id="dp1673689668871">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">كيف تعرفت علينا</label>
                                                        <div class="form-group">
                                                            <select name="question" class="form-control select-lg select2">
                                                                <option value="1">غوغل</option>
                                                                <option value="2">فيسبوك</option>
                                                                <option value="3">صديق</option>
                                                                <option value="4">اخرى</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">العنوان</label>
                                                        <input type="text" name="address" value="{{ $user->address }}" class="form-control" id="exampleInputPassword1" placeholder="العنوان" required autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">رقم الهاتف</label>
                                                        <input name="phone" value="{{ $user->phone }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="أدخل رقم المستخدم" required autocomplete="off">
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
