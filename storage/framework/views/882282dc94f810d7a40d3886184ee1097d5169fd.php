
<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'زيارات مفتوحة'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> زيارات مفتوحة </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">زيارات مفتوحة</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء
                        زيارة</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء زيارة جديدة</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form method="POST" action="<?php echo e(url('admin/detections/store')); ?>"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">العميل</label>
                                                <select name="user_id" id="user_name" class="user_id form-control select-lg select2">
                                                    <option>أختر العميل</option>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">التخصصات</label>
                                                <select name="specialty_id" id="specialty_id"
                                                    class="form-control select-lg select2">
                                                    <option>أختر التخصص</option>
                                                    <?php $__currentLoopData = $specialtys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->spename_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الأطباء</label>
                                                <select name="doctor_id" id="doctor_id"
                                                    class="form-control select-lg select2">
                                                    <option>أختر طبيب</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">المواعيد</label>
                                                <select name="date_id" id="day_name"
                                                    class="form-control select-lg select2">
                                                    <option>أختر موعد</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">السعر</label>
                                                <select name="price_id" id="price_id"
                                                    class="form-control select-lg select2">
                                                    <option>أختر السعر</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الخصم</label>
                                                <input name="discount" type="text" class="form-control"  placeholder="أدخل الخصم" required autocomplete="off" >
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
                                <th>القيمة الإجمالية</th>
                                <th>أسم الطبيب</th>
                                <th>الموعد</th>
                                <th>أسم المريض</th>
                                <th colspan="2">حالة الزيارة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $number = 0;
                            ?>
                            <?php $__currentLoopData = $detections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $number++;
                                ?>
                                <tr>
                                    <td><?php echo e($number); ?></td>
                                    <td><?php echo e($row->price_id); ?></td>
                                    <td><?php echo e($row->doctors->name_en); ?></td>
                                    <td><?php echo e($row->date->day); ?></td>
                                    <td><?php echo e($row->user->name_en); ?></td>
                                    <?php if($row->status == 1): ?>
                                        <td><a href="<?php echo e(url('admin/detection_pendingEd', $row->id)); ?>"
                                                class="btn btn-primary"><?php echo e(__('زيارة مفتوحة')); ?></a></td>
                                        <td><a href="<?php echo e(url('admin/detection_cancelledEd', $row->id)); ?>"
                                                class="btn btn-danger"><?php echo e(__('إلغاء الزيارة')); ?></a></td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-sliders-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="<?php echo e(url('admin/detections/show', $row->id)); ?>"
                                                class="btn btn-success dropdown-item"><i
                                                    class="fas fa-user-edit"></i>مشاهدة</button></a>

                                            
                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#modal-delete<?php echo e($row->id); ?>"><i style="color:red"
                                                    class="fas fa-user-minus"></i>الحذف</button>
                                        </div>
                                    </td>

                                </tr>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="modal-delete<?php echo e($row->id); ?>">
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
                                                <h5>هل انت واثق من الحذف؟ </h5>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">لإغلاق</button>
                                                <form action="<?php echo e(url('admin/detection_destroy', $row->id)); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
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
                                
                                <!-- /.modal -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(e) {

        $('#specialty_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "<?php echo e(url('admin/detections/doctor_ajax')); ?>/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#doctor_id").find('option:not(:first)').remove();
                        if (data['newDoctor']) {
                            $.each(data['newDoctor'], function(key, value) {
                                $("#doctor_id").append("<option value=" + value[
                                        'id'] + ">" + value['name_en'] +
                                    "</option>");
                            });
                        }

                    }
                });
            } else {
                $('#doctor_id').empty();
            }
        });
    });
</script>

<script>
    $(document).ready(function(e) {

        $('#doctor_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "<?php echo e(url('admin/detections/price_ajax')); ?>/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#price_id").find('option:not(:first)').remove();
                        if (data['newPrice']) {
                            $.each(data['newPrice'], function(key, value) {
                                $("#price_id").append("<option value=" + value[
                                        'total_value'] + ">" + value['total_value'] +
                                    "</option>");
                            });
                        }

                    }
                });
            } else {
                $('#price_id').empty();
            }
        });
    });
</script>

<script>
    $(document).ready(function(e) {

        $('#doctor_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "<?php echo e(url('admin/detections/date_ajax')); ?>/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#day_name").find('option:not(:first)').remove();
                        if (data['newDate']) {
                            $.each(data['newDate'], function(key, value) {
                                $("#day_name").append("<option value=" + value[
                                        'id'] + ">" + value['day'] +
                                    "</option>");
                            });
                        }

                    }
                });
            } else {
                $('#day_name').empty();
            }
        });
    });
</script>
<script>

    var path = "<?php echo e(url('admin/autocomplete')); ?>";
    
    $('#user_name').typeahead({
    
        source: function(query, process){
    
            return $.get(path, {query:query}, function(data){
    
                return process(data);
    
            });
    
        }
    
    });
    
    </script>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\adminpanellaravel\resources\views/admin/detections/detection_open.blade.php ENDPATH**/ ?>