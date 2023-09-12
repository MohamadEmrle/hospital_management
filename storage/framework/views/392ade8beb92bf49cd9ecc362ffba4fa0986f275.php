

<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','المصروفات'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> المصروفات </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">المصروفات</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء مصروف</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء مصروف جديد</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form  method="POST" action="<?php echo e(route('expenses.store')); ?>"  enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الاسم</label>
                                                <input name="name" type="text" class="form-control"  placeholder="أدخل اسم العرض" required autocomplete="off" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الوصف</label>
                                                <textarea class="form-control mg-t-20" name="description" placeholder="أدخل الوصف" required autocomplete="off" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">القيمة</label>
                                                <input name="values" type="text" class="form-control"  placeholder="أدخل قيمة المصروف" required autocomplete="off" >
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
                            <th>الوصف</th>
                            <th>القيمة</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $number = 0;
                            ?>
                        <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                                $number++;
                            ?>
                            <tr>
                                <td><?php echo e($number); ?></td>
                                <td><?php echo e($expense->name); ?></td>
                                <td><?php echo e($expense->description); ?></td>
                                <td><?php echo e($expense->values); ?></td>
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit<?php echo e($expense->id); ?>" ><i  class="fas fa-user-edit"></i>التحرير</button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete<?php echo e($expense->id); ?>" ><i style="color:red" class="fas fa-user-minus"></i>الحذف</button>
                                    </div>
                                </td>

                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete<?php echo e($expense->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">حذف المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>لا تحذف المستخدم  `<?php echo e($expense->name_en); ?>` هل انت واثق؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لإغلاق</button>
                                              <form action="<?php echo e(route('expenses.destroy',$expense->id)); ?>" method="POST">
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
                            <div class="modal fade" id="modal-edit<?php echo e($expense->id); ?>">
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
                                        <form  method="POST" action="<?php echo e(route('expenses.update',$expense->id)); ?>"  enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                
                                                <div class="card-body">
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الأسم بالعربي</label>
                                                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="<?php echo e($expense->name); ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الوصف بالعربي</label>
                                                        <textarea class="form-control mg-t-20" name="description"  placeholder="أدخل الوصف" required autocomplete="false" ><?php echo e($expense->description); ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">القيمة</label>
                                                        <input name="values" value="<?php echo e($expense->values); ?>" type="text" class="form-control"  placeholder="أدخل قيمة العرض" required autocomplete="false" >
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
                    </table>

                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/expenses/index.blade.php ENDPATH**/ ?>