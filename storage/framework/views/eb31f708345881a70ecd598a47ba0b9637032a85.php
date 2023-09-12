
<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','الأطباء'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> الأطباء </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الأطباء</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">انشاء طبيب</button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">انشاء طبيب جديد</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- form start -->
                                    <form  method="POST" action="<?php echo e(route('doctors.store')); ?>"  enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الاسم بالإنكليزي</label>
                                                <input name="name_en" type="text" class="form-control"  placeholder="أدخل اسم الطبيب" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الاسم بالعربي</label>
                                                <input name="name_ar" type="text" class="form-control"  placeholder="أدخل اسم الطبيب" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الهاتف</label>
                                                <input name="phone" type="text" class="form-control"  placeholder="أدخل الهاتف" required autocomplete="off" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">صورية شخصية</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الوصف بالإنكلزي</label>
                                                <textarea class="form-control mg-t-20" name="description_en" placeholder="أدخل الوصف" required autocomplete="false" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">الوصف بالعربي</label>
                                                <textarea class="form-control mg-t-20" name="description_ar" placeholder="أدخل الوصف" required autocomplete="false" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">التخصص</label>
                                                <select name="specoalty_id" class="form-control select-lg select2">
                                                    <option>أختر التخصص</option>
                                                    <?php $__currentLoopData = $specialtys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->spename_ar); ?></option>
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
                            <th>الأسم</th>
                            <th>الهاتف</th>
                            <th>الأختصاص</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody >
                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <tr>
                            <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?>
                                <td><?php echo e($doctor->name); ?></td>
                                <td><?php echo e($doctor->phone); ?></td>
                                <td><?php echo e($doctor->specialtys->spename_en); ?></td>
                            <?php elseif(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
                                <td><?php echo e($doctor->name); ?></td>
                                <td><?php echo e($doctor->phone); ?></td>
                                <td><?php echo e($doctor->specialtys->spename_ar); ?></td>
                            <?php endif; ?>
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="<?php echo e(route('doctors.show',$doctor->id)); ?>" class="btn btn-success dropdown-item"><i  class="fas fa-user-edit"></i>مشاهدة</button></a>
                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit<?php echo e($doctor->id); ?>" ><i  class="fas fa-user-edit"></i>التحرير</button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete<?php echo e($doctor->id); ?>" ><i style="color:red" class="fas fa-user-minus"></i>الحذف</button>
                                    </div>
                                </td>

                            </tr>
                           
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete<?php echo e($doctor->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">حذف المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>لا تحذف المستخدم  `<?php echo e($doctor->name); ?>` هل انت واثق؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لإغلاق</button>
                                              <form action="<?php echo e(route('doctors.destroy',$doctor->id)); ?>" method="POST">
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
                            <div class="modal fade" id="modal-edit<?php echo e($doctor->id); ?>">
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
                                        <form  method="POST" action="<?php echo e(route('doctors.update',$doctor->id)); ?>"  enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                
                                                <div class="card-body">
                                                    <div class="form-group">
                                                    <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?> 
                                                        <label for="exampleInputEmail1">الأسم بالإنكليزي</label>
                                                            <input name="name_en" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="<?php echo e($doctor->name); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">الوصف بالإنكلزي</label>
                                                            <textarea class="form-control mg-t-20" name="description_en" value="" placeholder="أدخل الوصف" required autocomplete="false" ><?php echo e($doctor->description); ?></textarea>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">الأسم بالعربي</label>
                                                            <input name="name_ar" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="<?php echo e($doctor->name); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">الوصف بالعربي</label>
                                                            <textarea class="form-control mg-t-20" name="description_ar"  placeholder="أدخل الوصف" required autocomplete="false" ><?php echo e($doctor->description); ?></textarea>
                                                        </div>
                                                    <?php endif; ?>
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الهاتف</label>
                                                        <input name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="<?php echo e($doctor->phone); ?>" required>
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

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\adminpanellaravel\resources\views/admin/doctors/index.blade.php ENDPATH**/ ?>