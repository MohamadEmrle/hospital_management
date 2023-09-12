

<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','المواعيد'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> المواعيد </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">المواعيد</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء موعد</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء موعد جديد</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form  method="POST" action="<?php echo e(route('dates.store')); ?>"  enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">من الساعة</label>
                                                <input name="for_hour" type="time" class="form-control"  placeholder="أدخل اسم العرض" required autocomplete="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">إلى الساعة</label>
                                                <input name="to_hour" type="time" class="form-control"  placeholder="أدخل اسم العرض" required autocomplete="false" >
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">اليوم</label>
                                                <input type="text" name="day" placeholder="أدخل اليوم" class="form-control" required autocomplete="false" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الأطباء</label>
                                                <select name="doctor_id" class="form-control select-lg select2">
                                                    <option>أختر طبيب</option>
                                                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <th>من الساعة</th>
                            <th>إلى الساعة</th>
                            <th>اليوم</th>
                            <th>الطبيب</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $number = 0;
                            ?>
                        <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                                $number++;
                            ?>
                            <tr>
                                <td><?php echo e($number); ?></td>
                                <td><?php echo e($date->for_hour); ?></td>
                                <td><?php echo e($date->to_hour); ?></td>
                                <td><?php echo e($date->day); ?></td>
                        <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?>
                                <td><?php echo e($date->doctors->name_en); ?></td>
                        <?php elseif(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
                                <td><?php echo e($date->doctors->name_ar); ?></td>
                        <?php endif; ?>
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit<?php echo e($date->id); ?>" ><i  class="fas fa-user-edit"></i>التحرير</button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete<?php echo e($date->id); ?>" ><i style="color:red" class="fas fa-user-minus"></i>الحذف</button>
                                    </div>
                                </td>

                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete<?php echo e($date->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">حذف المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>لا تحذف الموعد  `<?php echo e($date->day); ?>` هل انت واثق؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لإغلاق</button>
                                              <form action="<?php echo e(route('dates.destroy',$date->id)); ?>" method="POST">
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
                            <div class="modal fade" id="modal-edit<?php echo e($date->id); ?>">
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
                                        <form  method="POST" action="<?php echo e(route('dates.update',$date->id)); ?>"  enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">من الساعة</label>
                                                        <input name="for_hour" value="<?php echo e($date->for_hour); ?>" type="time" class="form-control"  placeholder="أدخل اسم العرض" required autocomplete="false" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">إلى الساعة</label>
                                                        <input name="to_hour" value="<?php echo e($date->to_hour); ?>" type="time" class="form-control"  placeholder="أدخل اسم العرض" required autocomplete="false" >
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">اليوم</label>
                                                        <input type="text" name="day" value="<?php echo e($date->day); ?>" placeholder="أدخل اليوم" class="form-control" required autocomplete="false" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الأطباء</label>
                                                        <select name="doctor_id" class="form-control select-lg select2">
                                                            <option>أختر الطبيب</option>
                                                            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_en); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->


                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </table>

                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/dates/index.blade.php ENDPATH**/ ?>