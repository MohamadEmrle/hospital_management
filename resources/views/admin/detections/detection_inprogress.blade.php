
@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title','زيارات تحت التنفيذ')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> زيارات تحت التنفيذ </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">زيارات تحت التنفيذ</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">

                

                    <table id="table" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <tr>
                                <th>التسلسل</th>
                                <th>القيمة الإجمالية</th>
                                <th>أسم الطبيب</th>
                                <th>الموعد</th>
                                <th>أسم المريض</th>
                                <th colspan="2">حالة الزيارة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $number = 0;
                            @endphp
                            @foreach ($detections as $row)
                                @php
                                    $number++;
                                @endphp
                                <tr>
                                    <td>{{ $number }}</td>
                                    <td>{{ $row->price_id }}</td>

                                    <td>{{ $row->doctors->name_en }}</td>
                                    <td>{{ $row->date->day }}</td>
                                    <td>{{ $row->user->name_en }}</td>
                                @if($row->status == 3)
                                    <td><a href="{{ url('admin/detection_completeEd',$row->id) }}" class="btn btn-primary">{{ __('زيارة تحت التنفيذ') }}</a></td>
                                @endif
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        {{--  <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit{{$row->id}}" ><i  class="fas fa-user-edit"></i>التحرير</button>  --}}
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete{{$row->id}}" ><i style="color:red" class="fas fa-user-minus"></i>الحذف</button>
                                    </div>
                                </td>

                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete{{$row->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">حذف المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>هل انت واثق من الحذف؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لإغلاق</button>
                                              <form action="{{ url('admin/detection_destroy',$row->id) }}" method="POST">
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
                          //  <div class="modal fade" id="modal-edit{{$row->id}}">
                          //     <div class="modal-dialog">
                          //         <div class="modal-content">
                          //             <div class="modal-header">
                          //                 <h4 class="modal-title">تحرير المستخدم</h4>
                          //                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          //                     <span aria-hidden="true">&times;</span>
                          //                 </button>
                          //             </div>
                          //             <div class="modal-body">
                          //                 <!-- form start -->
                          //             <form  method="POST" action="{{route('expenses.update',$row->id)}}"  enctype="multipart/form-data">
                          //                     @csrf
                          //                     @method('PATCH')
                          //                     {{--  <input type="hidden" name="id" value="{{$doctor->id}}">  --}}
                          //                     <div class="card-body">
                          //                         {{--  Edit Form  --}}
                          //                     </div>
                          //                     <!-- /.card-body -->

                          //                     <div class="card-footer">
                          //                         <button type="submit" class="btn btn-primary">التحرير</button>
                          //                     </div>
                          //                 </form>
                          //             </div>
                          //         </div>
                          //         <!-- /.modal-content -->
                          //     </div>
                          //     <!-- /.modal-dialog -->
                          // </div>
                          // <!-- /.modal -->

                         @endforeach 
                    </table>

                </div>
            </div>
        </div>
    </div>



@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(e) {

        $('#doctor_id').change(function() {
            var id = $(this).val();
			console.log(id);
            if(id) {
                $.ajax({
                    url: "{{ url('admin/detections/price_ajax') }}/"+id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $("#day_name").find('option:not(:first)').remove();
						if (data['dates'])
						{
							$.each(data['dates'],function(key,value){
								$("#day_name").append("<option id='"+value['id']+"'>"+value['day']+"</option>");
							});
						}

                    }
                });
            }else{
                $('#day_name').empty();
            }
        });
    });
</script>