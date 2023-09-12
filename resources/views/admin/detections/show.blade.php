@extends('layouts.panel')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> الزيارة </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الزيارة</li>
            </ol>
        </div>

    </div>



    <!-- Row -->
    <div class="row square">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                        </div>
                        <div class="col-10">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users"
                                        role="tab" aria-controls="users" aria-selected="true">{{ __('العملاء') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="comments-tab" data-toggle="tab" href="#comments" role="tab"
                                        aria-controls="comments" aria-selected="false">{{ __('التعليقات') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="rewards-tab" data-toggle="tab" href="#rewards" role="tab"
                                        aria-controls="rewards" aria-selected="false">{{ __('المكافأت') }}</a>
                                </li>

                            </ul>
                            <div class="tab-content pl-3 p-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="users" role="tabpanel"
                                    aria-labelledby="users-tab">
                                    <div class="tab-pane fade show active" id="users" role="tabpanel"
                                        aria-labelledby="users-tab">
                                        <form action="https://demo.freaktemplate.com/singleclinic/admin/updateworkinghours"
                                            method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token"
                                                value="MSAjWUB2QKT128l9aX9V8FBbf8EHOvlIqAla5tUT">
                                            <input type="hidden" name="id" id="id" value="0" />
                                            <div class="table-responsive">

                                                <table id="table"
                                                    class="table table-bordered table-striped text-center">
                                                    <div class="col-sm-6">
                                                        {{--  <div class="float-left d-inline">
                                                            <a href="{{ url('admin/bill_detection', $deteID[0]->detectionID) }}"
                                                                class="btn btn-info">{{ __('dashboard.create') }}</a>
                                                        </div>  --}}
                                                    </div>
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('التسلسل') }}</th>
                                                            <th>{{ __('أسم العميل') }}</th>
                                                            <th>{{ __('رقم الهاتف') }}</th>
                                                            <th>{{ __('الإيميل') }}</th>
                                                            <th>{{ __('تاريخ الميلاد') }}</th>
                                                            <th>{{ __('العنوان') }}</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $Serial = 0;
                                                    @endphp
                                                    <tbody>
                                                        @foreach ($users as $row)
                                                            @php
                                                                $Serial++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $Serial }}</td>
                                                                <td>{{ $row->user->name_ar }}</td>
                                                                <td>{{ $row->user->phone }}</td>
                                                                <td>{{ $row->user->email }}</td>
                                                                <td>{{ $row->user->birthDate }}</td>
                                                                <td>{{ $row->user->address }}</td>
                                                            </tr>
                                                        @endforeach
                                                </table>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade  btnsaveoption" id="comments" role="tabpanel"
                                    aria-labelledby="comments-tab">

                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form method="POST" action="{{ url('admin/comments/store', $show[0]->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">التعليق</label>
                                                    <textarea class="form-control mg-t-20" name="comment" placeholder="أدخل التعليق" required autocomplete="false"></textarea>
                                                </div>
                                                <input type="text" name="detection_id" value="{{ $show[0]->id }}"
                                                    hidden>
                                                <input type="text" name="user_id" value="{{ $user_id }}" hidden>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">انشئ</button>
                                                </div>
                                            </div>
                                            @foreach ($comments as $row)
                                                <section class="p-4 w-100">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md-8 col-lg-6">
                                                            <div class="card shadow-0 border"
                                                                style="background-color: #f0f2f5;">
                                                                <div class="card-body p-4">
                                                                    <div class="form-outline mb-4">

                                                                    </div>

                                                                    <div class="card mb-4">
                                                                        <div class="card-body">
                                                                            Comment: {{ $row->comment }}

                                                                            <div class="d-flex justify-content-between">
                                                                                <div
                                                                                    class="d-flex flex-row align-items-center">

                                                                                    <p class="small mb-0 ms-2">Comment
                                                                                        Provider :
                                                                                        {{ $row->users->name_en }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            @endforeach
                                            <!-- /.card-body -->


                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade  btnsaveoption" id="rewards" role="tabpanel"
                                    aria-labelledby="rewards-tab">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card custom-card">
                                                <div class="card-body">
                                                    <button class="btn btn-primary mb-3" data-toggle="modal"
                                                        data-target="#modal-create">انشاء
                                                        مكافأة</button>

                                                    <!-- Create Modal -->
                                                    <div class="modal fade" id="modal-create">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">انشاء مكافأة جديدة</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- form start -->
                                                                    <form method="POST"
                                                                        action="{{ url('admin/rewards/store', $show[0]->id) }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">نقاط
                                                                                    المكافأة</label>
                                                                                <input name="reward_points" type="number"
                                                                                    class="form-control"
                                                                                    placeholder="أدخل نقاط المكافأة"
                                                                                    required autocomplete="false">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">رابط
                                                                                    الترويج</label>
                                                                                <input name="promotion_link"
                                                                                    type="url" class="form-control"
                                                                                    placeholder="رابط الترويج" required
                                                                                    autocomplete="off">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="exampleInputEmail1">العميل</label>
                                                                                <select name="user_id"
                                                                                    class="form-control select-lg select2">
                                                                                    <option>أختر العميل</option>
                                                                                    @foreach ($users as $row)
                                                                                        <option
                                                                                            value="{{ $row->id }}">
                                                                                            {{ $row->user->name_en }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <input type="text" name="detection_id"
                                                                                value="{{ $show[0]->id }}" hidden>
                                                                        </div>
                                                                        <!-- /.card-body -->

                                                                        <div class="card-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">انشئ</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>

                                                    <table id="table"
                                                        class="table table-bordered table-striped text-center">
                                                        <thead>
                                                            <tr>
                                                                <th>التسلسل</th>
                                                                <th>نقاط المكافأة</th>
                                                                <th>رابط الترويج</th>
                                                                <th>العميل</th>
                                                                <th>العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $number = 0;
                                                            @endphp
                                                            @foreach ($rewards as $row)
                                                                @php
                                                                    $number++;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{ $number }}</td>
                                                                    <td>{{ $row->reward_points }}</td>
                                                                    <td><a href="{{ $row->promotion_link }}">{{ $row->promotion_link }}
                                                                    </td>
                                                                    <td>{{ $row->users->name_en }}</td>
                                                                    <td class="text-center">
                                                                        <button class="btn btn-secondary dropdown-toggle"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="fas fa-sliders-h"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <button type="button"
                                                                                class="btn btn-success dropdown-item"
                                                                                data-toggle="modal"
                                                                                data-target="#modal-edit{{ $row->reward_points }}"><i
                                                                                    class="fas fa-user-edit"></i>التحرير</button>
                                                                            <button type="button" class="dropdown-item"
                                                                                data-toggle="modal"
                                                                                data-target="#modal-delete{{ $row->id }}"><i
                                                                                    style="color:red"
                                                                                    class="fas fa-user-minus"></i>الحذف</button>
                                                                        </div>
                                                                    </td>

                                                                </tr>

                                                                <!-- Delete Modal -->
                                                                <div class="modal fade"
                                                                    id="modal-delete{{ $row->id }}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">حذف المستخدم</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h5>لا تحذف المكافأة هل انت واثق؟ </h5>
                                                                            </div>
                                                                            <div
                                                                                class="modal-footer justify-content-between">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">لإغلاق</button>
                                                                                <form
                                                                                    action="{{ route('rewards.destroy', $row->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">الحذف</button>

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
                                                                <div class="modal fade"
                                                                    id="modal-edit{{ $row->reward_points }}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">تحرير الملف</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!-- form start -->
                                                                                <form method="POST"
                                                                                    action="{{ route('rewards.update', $row->id) }}"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    @method('PATCH')
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $row->id }}">
                                                                                    <div class="card-body">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">نقاط
                                                                                                المكافأة</label>
                                                                                            <input name="reward_points"
                                                                                                value="{{ $row->reward_points }}"
                                                                                                type="number"
                                                                                                class="form-control"
                                                                                                placeholder="أدخل نقاط المكافأة"
                                                                                                required
                                                                                                autocomplete="false">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">رابط
                                                                                                الترويج</label>
                                                                                            <input name="promotion_link"
                                                                                                value="{{ $row->promotion_link }}"
                                                                                                type="url"
                                                                                                class="form-control"
                                                                                                placeholder="رابط الترويج"
                                                                                                required
                                                                                                autocomplete="false">
                                                                                        </div>

                                                                                        {{--  <div class="form-group">
                                                                                            <label for="exampleInputEmail1">العميل</label>
                                                                                            <select name="user_id" class="form-control select-lg select2">
                                                                                                <option>أختر العميل</option>
                                                                                                @foreach ($users as $row)
                                                                                                    <option value="{{ $row->id }}">
                                                                                                        {{ $row->name_en }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>  --}}

                                                                                    </div>
                                                                                    <!-- /.card-body -->

                                                                                    <div class="card-footer">
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary">انشئ</button>
                                                                                    </div>
                                                                                </form>
                                                                                <!-- /.modal -->
                                                            @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endsection
