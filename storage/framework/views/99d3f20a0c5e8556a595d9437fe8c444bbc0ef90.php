
<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','الفواتير'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> الفواتير </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الفواتير</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء فاتورة</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء فاتورة جديد</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form  method="POST" action="<?php echo e(url('admin/bills/store')); ?>"  enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الوصف</label>
                                                <textarea class="form-control mg-t-20" name="description" placeholder="أدخل الوصف" required autocomplete="off" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الخصم</label>
                                                <input name="discount" type="text" class="form-control"  placeholder="أدخل الخصم" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">المبلغ المدفوع</label>
                                                <input name="amount_paid" type="number" class="form-control"  placeholder="أدخل المبلغ المدفوع" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">المبلغ الباقي</label>
                                                <input name="amount_remainder" type="number" class="form-control"  placeholder="أدخل المبلغ الباقي" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">القيمة الإجمالية</label>
                                                <input name="total_value" type="number" class="form-control"  placeholder="أدخل القيمة الإجمالية" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">طريقة الدفع</label>
                                                <select name="payment" class="form-control select-lg select2">
                                                    <option>أختر طريقة الدفعة</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="visi">Visi</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">العميل</label>
                                                <select name="user_id" class="form-control select-lg select2">
                                                    <option>أختر العميل</option>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name_en); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الطبيب</label>
                                                <select name="doctor_id" id="doctor_id" class="form-control select-lg select2">
                                                    <option>أختر الطبيب</option>
                                                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name_en); ?></option>
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
                            <th>الخصم</th>
                            <th>القيمة الإجمالية</th>
                            <th>العميل</th>
                            <th>الطبيب</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $number = 0;
                            ?>
                        <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $number++;
                        ?>
                            <tr>
                                <td>
                                    <?php echo e($number); ?>

                                </td>
                                <td><?php echo e($row->discount); ?></td>
                                <td>
                                    <?php echo e($row->total_value); ?>

                                </td>
                                <td>
                                    <?php echo e($row->users->name_en); ?>

                                </td>
                                <td>
                                    <?php echo e($row->doctors->name_en); ?>

                                </td>

                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit<?php echo e($row->id); ?>" ><i  class="fas fa-user-edit"></i>التحرير</button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete<?php echo e($row->id); ?>" ><i style="color:red" class="fas fa-user-minus"></i>الحذف</button>
                                    </div>
                                </td>

                            </tr>
                            
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete<?php echo e($row->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">حذف الفاتورة</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>لا تحذف الفاتورة  هل انت واثق؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لإغلاق</button>
                                              <form action="<?php echo e(route('bills.destroy',$row->id)); ?>" method="POST">
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
                                            <h4 class="modal-title">تحرير المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                        <form  method="POST" action="<?php echo e(route('bills.update',$row->id)); ?>"  enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الوصف</label>
                                                        <textarea class="form-control mg-t-20" name="description"  placeholder="أدخل الوصف" required autocomplete="false" ><?php echo e($row->description); ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الخصم</label>
                                                        <input name="discount" value="<?php echo e($row->discount); ?>" type="text" class="form-control"  placeholder="أدخل الخصم" required autocomplete="false" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">المبلغ المدفوع</label>
                                                        <input name="amount_paid" value="<?php echo e($row->amount_paid); ?>" type="number" class="form-control"  placeholder="أدخل المبلغ المدفوع" required autocomplete="false" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">المبلغ الباقي</label>
                                                        <input name="amount_remainder" value="<?php echo e($row->amount_remainder); ?>" type="number" class="form-control"  placeholder="أدخل المبلغ الباقي" required autocomplete="false" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">القيمة الإجمالية</label>
                                                        <input name="total_value" value="<?php echo e($row->total_value); ?>" type="number" class="form-control"  placeholder="أدخل القيمة الإجمالية" required autocomplete="false" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">طريقة الدفع</label>
                                                        <select name="payment" class="form-control select-lg select2">
                                                            <option>أختر طريقة الدفعة</option>
                                                            <option value="cash">Cash</option>
                                                            <option value="visi">Visi</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">العميل</label>
                                                        <select name="user_id" class="form-control select-lg select2">
                                                            <option>أختر العميل</option>
                                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name_en); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الطبيب</label>
                                                        <select name="doctor_id" id="doctor_id" class="form-control select-lg select2">
                                                            <option>أختر الطبيب</option>
                                                            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name_en); ?></option>
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
                            </div>
                            <!-- /.modal -->

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </table>

                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\adminpanellaravel\resources\views/admin/bills/index.blade.php ENDPATH**/ ?>