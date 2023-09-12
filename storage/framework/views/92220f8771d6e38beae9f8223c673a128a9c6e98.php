
<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'الأشتراك بالخدمات'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">الأشتراك بالخدمات</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الأستراك بالخدمات</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">أشترك بخدمة</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء مقدم خدمة جديد</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form method="POST" action="<?php echo e(route('UserServices.store')); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الخدمة</label>
                                                <select name="service_id" class="form-control select-lg select2">
                                                    <option>أختر الخدمة</option>
                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">العميل</label>
                                                <select name="user_id" class="form-control select-lg select2">
                                                    <option>أختر العميل</option>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">طريقة الدفع</label>
                                                <select name="payment_method" class="form-control select-lg select2">
                                                    <option>أختر طريقة الدفع</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="visa">Visa</option>
                                                    
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
                                <th>اسم العميل</th>
                                <th>اسم الخدمة</th>
                                <th>طريقة الدفع</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $number = 0;
                            ?>
                            <?php $__currentLoopData = $userServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $number++;
                                ?>
                                <tr>
                                    <td><?php echo e($number); ?></td>
                                <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?>
                                    <td><?php echo e($row->users->name_en); ?></td>
                                    <td><?php echo e($row->service->name_en); ?></td>
                                <?php elseif(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
                                    <td><?php echo e($row->users->name_ar); ?></td>
                                    <td><?php echo e($row->service->name_ar); ?></td>
                                <?php endif; ?>
                                    <td><?php echo e($row->payment_method); ?></td>

                                    <td class="text-center">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-sliders-h"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button type="button" class="btn btn-success dropdown-item" data-toggle="modal"
                                                data-target="#modal-edit<?php echo e($row->id); ?>"><i
                                                    class="fas fa-user-edit"></i>التحرير</button>
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
                                                <h5>لا تحذف الأشتراك بالخدمة هل انت واثق؟ </h5>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">لإغلاق</button>
                                                <form action="<?php echo e(route('UserServices.destroy', $row->id)); ?>" method="POST">
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
                                <div class="modal fade" id="modal-edit<?php echo e($row->id); ?>">
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
                                                <form method="POST" action="<?php echo e(url('admin/UserServices/update', $row->id)); ?>"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    
                                                    <div class="card-body">
                                                        
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">الخدمة</label>
                                                            <select name="service_id" class="form-control select-lg select2">
                                                                <option>أختر الخدمة</option>
                                                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_en); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">العميل</label>
                                                            <select name="user_id" class="form-control select-lg select2">
                                                                <option>أختر العميل</option>
                                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name_en); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">طريقة الدفع</label>
                                                            <select name="payment_method" class="form-control select-lg select2">
                                                                <option>أختر طريقة الدفع</option>
                                                                <option value="cash">Cash</option>
                                                                <option value="visa">Visa</option>
                                                                
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

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/userServices/index.blade.php ENDPATH**/ ?>