
<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'الملفات'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> الملفات </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الملفات</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء ملف</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء ملف جديد</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form method="POST" action="<?php echo e(route('files.store')); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">العميل</label>
                                                <select name="user_id" id="user_id" class="form-control select-lg select2">
                                                    <option>أختر العميل</option>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الزيارة</label>
                                                <select name="detection_id" id="detection_id" class="form-control select-lg select2">
                                                    <option>أختر الزيارة</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">اسم الملف</label>
                                                <input name="name" type="text" class="form-control"
                                                    placeholder="أدخل اسم الملف" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">وصف الملف</label>
                                                <textarea class="form-control mg-t-20" name="description" placeholder="أدخل الوصف" required autocomplete="false"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">الملف</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="file" class="custom-file-input"
                                                            id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">نوع الملف</label>
                                                    <select name="file_type" class="form-control select-lg select2">
                                                        <option>أختر نوع الملف</option>
                                                        <option value="prescription">روشتة</option>
                                                        <option value="analysis">تحاليل</option>
                                                        <option value="rays">أشعة</option>
                                                        <option value="other">اّخرى</option>
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
                                <th>الأسم</th>
                                <th>رقم الزيارة</th>
                                <th>العميل</th>
                                <th>نوع الملف</th>
                                <th>الملف</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $number = 0;
                            ?>
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $number++;
                                ?>
                                <tr>
                                    <td><?php echo e($number); ?></td>
                                    <td><?php echo e($file->name); ?></td>
                                    <td><?php echo e($file->detections->id); ?></td>
                                    <td><?php echo e($file->file_type); ?></td>
                                    <td><?php echo e($file->users->name_en); ?></td>
                                    <td><a href="<?php echo e(url('admin/file/download', $file->name)); ?>"
                                            download="<?php echo e($file->file); ?>" class="btn btn-primary">Download</i></a></td>


                                    <td class="text-center">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-sliders-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal"
                                                data-target="#modal-edit<?php echo e($file->id); ?>"><i
                                                    class="fas fa-user-edit"></i>التحرير</button>
                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#modal-delete<?php echo e($file->id); ?>"><i style="color:red"
                                                    class="fas fa-user-minus"></i>الحذف</button>
                                        </div>
                                    </td>

                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="modal-delete<?php echo e($file->id); ?>">
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
                                                <h5>لا تحذف الملف هل انت واثق؟ </h5>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">لإغلاق</button>
                                                <form action="<?php echo e(route('files.destroy', $file->id)); ?>" method="POST">
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
                                <div class="modal fade" id="modal-edit<?php echo e($file->id); ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">تحرير الملف</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form start -->
                                                <form method="POST" action="<?php echo e(route('files.update', $file->id)); ?>"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">اسم الملف</label>
                                                            <input name="name" value="<?php echo e($file->name); ?>" type="text" class="form-control"
                                                                placeholder="أدخل اسم الملف" required
                                                                autocomplete="false">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">وصف الملف</label>
                                                            <textarea class="form-control mg-t-20" name="description" placeholder="أدخل الوصف" required
                                                                autocomplete="false"><?php echo e($file->description); ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">نوع الملف</label>
                                                            <select name="file_type" class="form-control select-lg select2">
                                                                <option>أختر نوع الملف</option>
                                                                <option value="prescription">روشتة</option>
                                                                <option value="analysis">تحاليل</option>
                                                                <option value="rays">أشعة</option>
                                                                <option value="other">اّخرى</option>
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
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(e) {

        $('#user_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "<?php echo e(url('admin/detections/detection_ajax')); ?>/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#detection_id").find('option:not(:first)').remove();
                        if (data['newDetection']) {
                            $.each(data['newDetection'], function(key, value) {
                                $("#detection_id").append("<option value=" + value[
                                        'id'] + ">" + value['id'] +
                                    "</option>");
                            });
                        }

                    }
                });
            } else {
                $('#detection_id').empty();
            }
        });
    });
</script>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\adminpanellaravel\resources\views/admin/files/index.blade.php ENDPATH**/ ?>