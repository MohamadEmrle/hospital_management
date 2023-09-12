@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title', 'التخصصات')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> التخصصات </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">التخصصات</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء تخصص</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء تخصص جديد</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form method="POST" action="{{ route('specialtys.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الاسم بالإنكليزي</label>
                                                <input name="spename_en" type="text" class="form-control"
                                                    id="exampleInputEmail1" placeholder="أدخل اسم تخصص" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الاسم بالعربي</label>
                                                <input name="spename_ar" type="text" class="form-control"
                                                    id="exampleInputEmail1" placeholder="أدخل اسم تخصص" autocomplete="off">
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
                                <th>الأسم</th>
                                <th>العمليات</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 0;
                            @endphp
                            @foreach ($specialtys as $specialty)
                                @php
                                    $number++;
                                @endphp
                                <tr>
                                    <td>
                                        {{ $number }}
                                    </td>
                                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                                        <td>{{ $specialty->spename }}</td>
                                    @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                                        <td>{{ $specialty->spename }}</td>
                                    @endif

                                    <td class="text-center">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-sliders-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal"
                                                data-target="#modal-edit{{ $specialty->id }}"><i
                                                    class="fas fa-user-edit"></i>التحرير</button>
                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#modal-delete{{ $specialty->id }}"><i style="color:red"
                                                    class="fas fa-user-minus"></i>الحذف</button>
                                        </div>
                                    </td>

                                </tr>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="modal-delete{{ $specialty->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">حذف الأختصاص</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>لا تحذف الأختصاص هل انت واثق؟ </h5>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">لإغلاق</button>
                                                <form action="{{ route('specialtys.destroy', $specialty->id) }}"
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
                                <div class="modal fade" id="modal-edit{{ $specialty->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">تحرير الأختصاص</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form start -->
                                                <form method="POST"
                                                    action="{{ route('specialtys.update', $specialty->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="id" value="{{ $specialty->id }}">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                    @if(LaravelLocalization::getCurrentLocale() == 'en')
                                                            <label for="exampleInputEmail1">الاسم بالإنكليزي</label>
                                                            <input name="spename_en" value="{{ $specialty->spename }}" type="text" class="form-control"
                                                                id="exampleInputEmail1" placeholder="Enter name" required
                                                                value="{{ $specialty->name }}" required>
                                                        </div>
                                                    @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">الاسم بالعربي</label>
                                                            <input name="spename_ar" value="{{ $specialty->spename }}" type="text" class="form-control"
                                                                id="exampleInputEmail1" placeholder="Enter name" required
                                                                value="{{ $specialty->name }}" required>
                                                        </div>

                                                    </div>
                                                    @endif
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
