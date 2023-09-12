<link href="{{ asset('css/image.css') }}" rel="stylesheet" />
@extends('layouts.panel')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> الأطباء </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الأطباء</li>
            </ol>
        </div>
    </div>





    <!-- Row -->
    <div class="row square">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">

                    <div class="panel profile-cover">
                        <div class="profile-cover__img">
                            <img class="img" src="{{ asset('images/doctors/' . $show[0]->photo) }}" alt="NoImage">
                            @if (LaravelLocalization::getCurrentLocale() == 'en')
                                <h3 class="h3">Name: {{ $show[0]->name_en }}</h3>
                                <h3 class="h3">Specialty: {{ $show[0]->specialtys->spename_en }}</h3>
                            @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                                <h3 class="h3">الأسم: {{ $show[0]->name_ar }}</h3>
                                <h3 class="h3">التخصص: {{ $show[0]->specialtys->spename_ar }}</h3>
                            @endif
                        </div>
                    </div>
                    <div class="profile-cover__action bg-img"></div>
                    <div class="profile-cover__info">
                        <ul class="nav">
                            <li><strong>{{ $dates }}</strong> المواعيد</li>
                            <li><strong>{{ $detections }}</strong>الزيارات</li>
                            <li><strong>{{ $bills }}</strong>الفواتير</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-10">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dates-tab" data-toggle="tab" href="#dates" role="tab"
                                    aria-controls="dates" aria-selected="true">{{ __('المواعيد') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="prices-tab" data-toggle="tab" href="#prices" role="tab"
                                    aria-controls="prices" aria-selected="true">{{ __('الفواتير') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="detections-tab" data-toggle="tab" href="#detections" role="tab"
                                    aria-controls="detections" aria-selected="false">{{ __('الزيارات') }}</a>
                            </li>
                           

                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <div class="tab-pane fade show active" id="dates" role="tabpanel"
                                aria-labelledby="dates-tab">
                                <div class="tab-pane fade show active" id="dates" role="tabpanel"
                                    aria-labelledby="dates-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card custom-card">
                                                <div class="card-body">
                                                    <button class="btn btn-primary mb-3" data-toggle="modal"
                                                        data-target="#modal-create">انشاء موعد</button>

                                                    <!-- Create Modal -->
                                                    <div class="modal fade" id="modal-create">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">انشاء موعد جديد</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- form start -->
                                                                    <form method="POST"
                                                                        action="{{ url('admin/dates/store', $show[0]->id) }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">من
                                                                                    الساعة</label>
                                                                                <input name="for_hour" type="time"
                                                                                    class="form-control"
                                                                                    placeholder="أدخل اسم العرض" required
                                                                                    autocomplete="false">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">إلى
                                                                                    الساعة</label>
                                                                                <input name="to_hour" type="time"
                                                                                    class="form-control"
                                                                                    placeholder="أدخل اسم العرض" required
                                                                                    autocomplete="false">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="exampleInputEmail1">اليوم</label>
                                                                                <input type="text" name="day"
                                                                                    placeholder="أدخل اليوم"
                                                                                    class="form-control" required
                                                                                    autocomplete="false">
                                                                            </div>
                                                                            <input type="text" name="doctor_id"
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
                                                                <th>من الساعة</th>
                                                                <th>إلى الساعة</th>
                                                                <th>اليوم</th>
                                                                <th>الطبيب</th>
                                                                <th>العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $number = 0;
                                                            @endphp
                                                            @foreach ($datesDoctor as $date)
                                                                @php
                                                                    $number++;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{ $number }}</td>
                                                                    <td>{{ $date->for_hour }}</td>
                                                                    <td>{{ $date->to_hour }}</td>
                                                                    <td>{{ $date->day }}</td>
                                                                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                                                                        <td>{{ $date->doctors->name_en }}</td>
                                                                    @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                                                                        <td>{{ $date->doctors->name_ar }}</td>
                                                                    @endif
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
                                                                                data-target="#modal-edit{{ $date->id }}"><i
                                                                                    class="fas fa-user-edit"></i>التحرير</button>
                                                                            <button type="button" class="dropdown-item"
                                                                                data-toggle="modal"
                                                                                data-target="#modal-delete{{ $date->id }}"><i
                                                                                    style="color:red"
                                                                                    class="fas fa-user-minus"></i>الحذف</button>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                                <!-- Delete Modal -->
                                                                <div class="modal fade"
                                                                    id="modal-delete{{ $date->id }}">
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
                                                                                <h5>لا تحذف الموعد `{{ $date->day }}` هل
                                                                                    انت واثق؟ </h5>
                                                                            </div>
                                                                            <div
                                                                                class="modal-footer justify-content-between">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">لإغلاق</button>
                                                                                <form
                                                                                    action="{{ route('dates.destroy', $date->id) }}"
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
                                                                    id="modal-edit{{ $date->id }}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">تحرير المستخدم</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!-- form start -->
                                                                                <form method="POST"
                                                                                    action="{{ route('dates.update', $date->id) }}"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    @method('PATCH')
                                                                                    {{--  <input type="hidden" name="id" value="{{$doctor->id}}">  --}}
                                                                                    <div class="card-body">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">من
                                                                                                الساعة</label>
                                                                                            <input name="for_hour"
                                                                                                value="{{ $date->for_hour }}"
                                                                                                type="time"
                                                                                                class="form-control"
                                                                                                placeholder="أدخل اسم العرض"
                                                                                                required
                                                                                                autocomplete="false">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">إلى
                                                                                                الساعة</label>
                                                                                            <input name="to_hour"
                                                                                                value="{{ $date->to_hour }}"
                                                                                                type="time"
                                                                                                class="form-control"
                                                                                                placeholder="أدخل اسم العرض"
                                                                                                required
                                                                                                autocomplete="false">
                                                                                        </div>
                                                                                        <input type="text" name="doctor_id"
                                                                                        value="{{ $show[0]->id }}" hidden>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">اليوم</label>
                                                                                            <input type="text"
                                                                                                name="day"
                                                                                                value="{{ $date->day }}"
                                                                                                placeholder="أدخل اليوم"
                                                                                                class="form-control"
                                                                                                required
                                                                                                autocomplete="off">
                                                                                        </div>

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
                        </div>
                    </div>
                        <div class="tab-pane fade  btnsaveoption" id="detections" role="tabpanel"
                            aria-labelledby="detections-tab">

                            <form action="https://demo.freaktemplate.com/singleclinic/admin/updateworkinghours"
                                method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="MSAjWUB2QKT128l9aX9V8FBbf8EHOvlIqAla5tUT">
                                <input type="hidden" name="id" id="id" value="0" />
                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <div class="col-sm-6">

                                            <thead>
                                                <tr>
                                                    <th>{{ __('التسلسل') }}</th>
                                                    <th>{{ __('رقم الزيارة') }}</th>
                                                    <th>{{ __('حالة الزيارة') }}</th>
                                                    <th>{{ __('الموعد') }}</th>
                                                    <th>{{ __('العميل') }}</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $Serial = 0;
                                            @endphp
                                            <tbody>
                                                    @foreach ($detectionDoctor as $row)
                                                        @php
                                                            $Serial++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $Serial }}</td>
                                                            <td>{{ $row->id }}</td>
                                                            @if ($row->status == 1)
                                                                <td><a class="btn btn-info">open</a></td>
                                                            @elseif($row->status == 2)
                                                                <td><a class="btn btn-info">pending</a></td>
                                                            @elseif($row->status == 3)
                                                                <td><a class="btn btn-info">inprogress</a></td>
                                                            @elseif($row->status == 5)
                                                                <td><a class="btn btn-info">complete</a></td>
                                                            @elseif($row->status == 6)
                                                                <td><a class="btn btn-danger">cancelled</a></td>
                                                            @endif
                                                            <td>{{ $row->date->day }}</td>
                                                            <td>{{ $row->user->name_en }}</td>
                                                        </tr>
                                                    @endforeach
                                                
                                    </table>
                                </div>

                            </form>
                        </div>
                        
                    <div class="tab-pane fade  btnsaveoption" id="prices" role="tabpanel"
                            aria-labelledby="prices-tab">

                            <form action="https://demo.freaktemplate.com/singleclinic/admin/updateworkinghours"
                                method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="MSAjWUB2QKT128l9aX9V8FBbf8EHOvlIqAla5tUT">
                                <input type="hidden" name="id" id="id" value="0" />
                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        {{--  <div class="col-sm-6">
                                                <div class="float-left d-inline">
                                                    <a href="{{ url('admin/reward_create', $deteID[0]->detectionID) }}"
                                                        class="btn btn-info">{{ __('dashboard.create') }}</a>
                                                </div>  --}}
                                </div>
                                <thead>
                                    <tr>
                                        <th>{{ __('التسلسل') }}</th>
                                        <th>{{ __('الخصم') }}</th>
                                        <th>{{ __('القيمة الإجمالية') }}</th>
                                        <th>{{ __('طريقة الدفع') }}</th>
                                        <th>{{ __('العميل') }}</th>
                                </thead>
                                @php
                                    $Serial = 0;
                                @endphp
                                <tbody>
                                    @if (isset($billDoctor) && $billDoctor->count() > 0)
                                        @foreach ($billDoctor as $row)
                                            @php
                                                $Serial++;
                                            @endphp
                                            <tr>
                                                <td>{{ $Serial }}</td>
                                                <td>{{ $row->discount }}</td>
                                                <td>{{ $row->total_value }}</td>
                                                <td>{{ $row->payment }}</td>
                                                <td>{{ $row->users->name_en }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                                </table>
                        </div>
                        <h5 class="alert alert-info">المجموع: {{ $total }} جنيه</h5>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
