
@extends('layouts.panel')
@section('admins')
    active
@endsection
@section('admins_list')
    active
@endsection
@section('title','المديرين')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> إدارة </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">@lang('admin.homepage')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('admin.Adminlist')</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    {{-- <a href="{{route('admins.create')}}" class="btn btn-primary mb-3" >أنشئ مديرًا جديدًا</a> --}}
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">أنشئ مديرًا جديدًا</button>
                               <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">انشئ مديرا جديدا</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->

                                                        <form action="{{route('admins.store')}}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">الاسم</label>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">البريد الالكتروني</label>
                                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">كلمة المرور</label>
                                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="exampleInputPassword1" placeholder="Password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">اعادة كلمة المرور</label>
                                                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"  id="exampleInputPassword1" placeholder="Password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">الصلاحيات</label>
                                                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                                    <option value="0"  selected disabled>اختر الصلاحية</option>
                                                                    @foreach($roles as $role)
                                                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">انشئ</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                          <!-- /.modal -->
                    <table id="table" class="table table-bordered table-striped text-center ">
                        <thead>
                        <tr>
                            <th>ملف تعريفي للمستخدم</th>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>الصلاحيات</th>
                            <th>تاريخ التسجيل</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody >
                        @foreach (\App\Models\User::where('id',Auth::user()->id)->get() as $user)
                            <tr>
                                <td>
                                    <img class="rounded-circle" src="{{URL::to('/').$user->profile()}}" alt="" width="50" height="50">
                                </td>

                                <td>
                                    {{$user->name}}
                                </td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach ($user->role as $r)
                                        {{$r->name}}
                                    @endforeach
                                </td>
                                <td >
                                    <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="{{$user->created_at}}">
                                        {{-- {{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('%A, %d %B %Y')}} --}}
                                   {{$user->created_at}}
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$user->id}}" ><i  class="fas fa-user-edit"></i> التحرير</button>
                                    </div>
                                </td>

                            </tr>
                            <!-- /.modal -->
                            <!-- /.modal -->
                            <!-- Change Modal -->
                            <div class="modal fade" id="modal-edit{{$user->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">مدير التحرير</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                            <form  method="POST" action="{{route('admins.update',$user->id)}}"  enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">اسم</label>
                                                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="{{$user->name}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">البريد</label>
                                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="{{$user->email}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">كلمة سر جديدة</label>
                                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">تكرار كلمة المرور</label>
                                                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">اختر الصلاحيات</label>
                                                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                            <option value="0"  selected disabled>اختر الصلاحيات</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->name}}"
                                                                        @if($user->role)
                                                                        {{-- {{dd($user->role->pluck('name')->first())}} --}}
                                                                        @if($role->name == $user->role->pluck('name')->first())
                                                                        selected
                                                                        @endif
                                                                        @endif
                                                                >{{$role->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">الصوره الشخصيه</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">تعديل</button>
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

                        @foreach ($admins as $user)
                            <tr>
                                <td>
                                    <img class="rounded-circle" src="{{URL::to('/').$user->profile()}}" alt="" width="50" height="50">
                                </td>

                                <td>
                                    {{$user->name}}
                                </td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach ($user->role as $r)
                                        {{$r->name}}
                                    @endforeach
                                </td>
                                <td >
                                    <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="{{$user->created_at}}">
                                        {{-- {{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('%A, %d %B %Y')}} --}}
                                         {{$user->created_at}}
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$user->id}}" ><i  class="fas fa-user-edit"></i> تعديل </button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$user->id}}" ><i style="color:red" class="fas fa-user-minus"></i> حذف </button>
                                    </div>
                                </td>

                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete{{$user->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">قم بإزالة المدير</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>لا تقم بإزالة المدير  `{{$user->name}}` هل أنت واثق؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <form action="{{route('admins.destroy',$user->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">حذف</button>

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
                                            <h4 class="modal-title">مدير التحرير</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                            <form  method="POST" action="{{route('admins.update',$user->id)}}"  enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الاسم</label>
                                                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="{{$user->name}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الايميل</label>
                                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="{{$user->email}}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">كلمة سر جديدة</label>
                                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">تكرار كلمة السر</label>
                                                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">الصلاحيات</label>
                                                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                            <option value="0"  selected disabled>اختار الصلاحيات</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->name}}"
                                                                        @if($user->role)
                                                                        {{-- {{dd($user->role->pluck('name')->first())}} --}}
                                                                        @if($role->name == $user->role->pluck('name')->first())
                                                                        selected
                                                                        @endif
                                                                        @endif
                                                                >{{$role->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">الصوره الشخصيه</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">تعديل</button>
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
