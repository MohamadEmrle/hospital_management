

<?php $__env->startSection('admins'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('admins_list'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','المديرين'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> إدارة </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('admin.homepage'); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('admin.Adminlist'); ?></li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-create">أنشئ مديرًا جديدًا</button>
                               <!-- Create Modal -->
                                        <div class="modal fade" id="modal-create">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">انشئ مديرا جديدا</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->

                                                        <form action="<?php echo e(route('admins.store')); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">الاسم</label>
                                                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">البريد الالكتروني</label>
                                                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">كلمة المرور</label>
                                                                <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="exampleInputPassword1" placeholder="Password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">اعادة كلمة المرور</label>
                                                                <input type="password" name="password_confirmation" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="exampleInputPassword1" placeholder="Password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">الصلاحيات</label>
                                                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                                    <option value="0"  selected disabled>اختر الصلاحية</option>
                                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">انشئ</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                          <!-- /.modal -->
                    <table id="table" class="table table-bordered table-striped text-center ">
                        <thead>
                        <tr>
                            <th>ملف تعريفي للمستخدم</th>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>الصلاحيات</th>
                            <th>تاريخ التسجيل</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody >
                        <?php $__currentLoopData = \App\Models\User::where('id',Auth::user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <img class="rounded-circle" src="<?php echo e(URL::to('/').$user->profile()); ?>" alt="" width="50" height="50">
                                </td>

                                <td>
                                    <?php echo e($user->name); ?>

                                </td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <?php $__currentLoopData = $user->role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($r->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td >
                                    <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php echo e($user->created_at); ?>">
                                        
                                   <?php echo e($user->created_at); ?>

                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit<?php echo e($user->id); ?>" ><i  class="fas fa-user-edit"></i> التحرير</button>
                                    </div>
                                </td>

                            </tr>
                            <!-- /.modal -->
                            <!-- /.modal -->
                            <!-- Change Modal -->
                            <div class="modal fade" id="modal-edit<?php echo e($user->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">مدير التحرير</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                            <form  method="POST" action="<?php echo e(route('admins.update',$user->id)); ?>"  enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">اسم</label>
                                                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="<?php echo e($user->name); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">البريد</label>
                                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="<?php echo e($user->email); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">كلمة سر جديدة</label>
                                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">تكرار كلمة المرور</label>
                                                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">اختر الصلاحيات</label>
                                                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                            <option value="0"  selected disabled>اختر الصلاحيات</option>
                                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($role->name); ?>"
                                                                        <?php if($user->role): ?>
                                                                        
                                                                        <?php if($role->name == $user->role->pluck('name')->first()): ?>
                                                                        selected
                                                                        <?php endif; ?>
                                                                        <?php endif; ?>
                                                                ><?php echo e($role->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">الصوره الشخصيه</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">تعديل</button>
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

                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <img class="rounded-circle" src="<?php echo e(URL::to('/').$user->profile()); ?>" alt="" width="50" height="50">
                                </td>

                                <td>
                                    <?php echo e($user->name); ?>

                                </td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <?php $__currentLoopData = $user->role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($r->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td >
                                    <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php echo e($user->created_at); ?>">
                                        
                                         <?php echo e($user->created_at); ?>

                                    </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <button type="button" class="btn btn-success dropdown-item" data-toggle="modal" data-target="#modal-edit<?php echo e($user->id); ?>" ><i  class="fas fa-user-edit"></i> تعديل </button>
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete<?php echo e($user->id); ?>" ><i style="color:red" class="fas fa-user-minus"></i> حذف </button>
                                    </div>
                                </td>

                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete<?php echo e($user->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">قم بإزالة المدير</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>لا تقم بإزالة المدير  `<?php echo e($user->name); ?>` هل أنت واثق؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <form action="<?php echo e(route('admins.destroy',$user->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">حذف</button>

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
                            <div class="modal fade" id="modal-edit<?php echo e($user->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">مدير التحرير</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- form start -->
                                            <form  method="POST" action="<?php echo e(route('admins.update',$user->id)); ?>"  enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الاسم</label>
                                                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required value="<?php echo e($user->name); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">الايميل</label>
                                                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required value="<?php echo e($user->email); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">كلمة سر جديدة</label>
                                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">تكرار كلمة السر</label>
                                                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">الصلاحيات</label>
                                                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                                                            <option value="0"  selected disabled>اختار الصلاحيات</option>
                                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($role->name); ?>"
                                                                        <?php if($user->role): ?>
                                                                        
                                                                        <?php if($role->name == $user->role->pluck('name')->first()): ?>
                                                                        selected
                                                                        <?php endif; ?>
                                                                        <?php endif; ?>
                                                                ><?php echo e($role->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">الصوره الشخصيه</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">تعديل</button>
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

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/admins/index.blade.php ENDPATH**/ ?>