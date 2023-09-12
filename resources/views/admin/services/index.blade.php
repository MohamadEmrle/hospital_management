@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title', 'الخدمات')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> الخدمات </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الخدمات</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء خدمة</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء خدمة جديدة</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form method="POST" action="{{ route('services.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">العميل</label>
                                                <select name="user_id" id="user_name"
                                                    class="user_id form-control select-lg select2">
                                                    <option>أختر العميل</option>
                                                    @foreach ($users as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">اسم مقدم الخدمة</label>
                                                <input name="services_provider" type="text" class="form-control"
                                                    placeholder="أدخل اسم الخدمة" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">اسم الخدمة</label>
                                                <input name="name" type="text" class="form-control"
                                                    placeholder="أدخل اسم الخدمة" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وصف الخدمة</label>
                                                <textarea name="description" placeholder="أدخل وصف الحدمة" required autocomplete="false"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">قيمة الخدمة</label>
                                                <input name="value" type="number" class="form-control"
                                                    placeholder="أدخل قيمة الخدمة" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">طريقة الدفع</label>
                                                <select name="payment" class="form-control select-lg select2">
                                                    <option>أختر طريقة الدفعة</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="visi">Visi</option>
                                                </select>
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
                            <th>العميل</th>
                            <th>مقدم الخدمة</th>
                            <th>الأسم</th>
                            <th>الوصف</th>
                            <th>القيمة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->users->name_en }}</td>
                                <td>{{ $service->services_provider }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->value }}</td>

                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal"
                                            data-target="#modal-edit{{ $service->id }}"><i
                                                class="fas fa-user-edit"></i>التحرير</button>
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#modal-delete{{ $service->id }}"><i style="color:red"
                                                class="fas fa-user-minus"></i>الحذف</button>
                                    </div>
                                </td>

                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete{{ $service->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">حذف المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>لا تحذف المستخدم هل انت واثق؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">لإغلاق</button>
                                            <form action="{{ url('admin/services/destroy', $service->id) }}"
                                                method="POST">
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
                            <div class="modal fade" id="modal-edit{{ $service->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">تحرير المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                            <form method="POST" action="{{ url('admin/services/update', $service->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">العميل</label>
                                                        <select name="user_id" id="user_name"
                                                            class="user_id form-control select-lg select2">
                                                            <option>أختر العميل</option>
                                                            @foreach ($users as $row)
                                                                <option value="{{ $row->id }}">{{ $row->name_en }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">اسم مقدم الخدمة</label>
                                                        <input name="services_provider"
                                                            value="{{ $service->services_provider }}" type="text"
                                                            class="form-control" placeholder="أدخل اسم الخدمة" required
                                                            autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">اسم الخدمة</label>
                                                        <input name="name" value="{{ $service->name }}"
                                                            type="text" class="form-control"
                                                            placeholder="أدخل اسم الخدمة" required autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">وصف الخدمة</label>
                                                        <textarea name="description" value="" placeholder="أدخل وصف الحدمة" required autocomplete="false">{{ $service->description }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">قيمة الخدمة</label>
                                                        <input name="value" value="{{ $service->value }}"
                                                            type="number" class="form-control"
                                                            placeholder="أدخل قيمة الخدمة" required autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">طريقة الدفع</label>
                                                        <select name="payment" class="form-control select-lg select2">
                                                            <option>أختر طريقة الدفعة</option>
                                                            <option value="cash">Cash</option>
                                                            <option value="visi">Visi</option>
                                                        </select>
                                                    </div>
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
