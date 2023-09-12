

<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> الزيارة </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الزيارة</li>
            </ol>
        </div>

    </div>



    <!-- Row -->
    <div class="row square">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                        </div>
                        <div class="col-10">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users"
                                        role="tab" aria-controls="users" aria-selected="true"><?php echo e(__('العملاء')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="comments-tab" data-toggle="tab" href="#comments" role="tab"
                                        aria-controls="comments" aria-selected="false"><?php echo e(__('التعليقات')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="rewards-tab" data-toggle="tab" href="#rewards" role="tab"
                                        aria-controls="rewards" aria-selected="false"><?php echo e(__('المكافأت')); ?></a>
                                </li>

                            </ul>
                            <div class="tab-content pl-3 p-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="users" role="tabpanel"
                                    aria-labelledby="users-tab">
                                    <div class="tab-pane fade show active" id="users" role="tabpanel"
                                        aria-labelledby="users-tab">
                                        <form action="https://demo.freaktemplate.com/singleclinic/admin/updateworkinghours"
                                            method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token"
                                                value="MSAjWUB2QKT128l9aX9V8FBbf8EHOvlIqAla5tUT">
                                            <input type="hidden" name="id" id="id" value="0" />
                                            <div class="table-responsive">

                                                <table id="table"
                                                    class="table table-bordered table-striped text-center">
                                                    <div class="col-sm-6">
                                                        
                                                    </div>
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo e(__('التسلسل')); ?></th>
                                                            <th><?php echo e(__('أسم العميل')); ?></th>
                                                            <th><?php echo e(__('رقم الهاتف')); ?></th>
                                                            <th><?php echo e(__('الإيميل')); ?></th>
                                                            <th><?php echo e(__('تاريخ الميلاد')); ?></th>
                                                            <th><?php echo e(__('العنوان')); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $Serial = 0;
                                                    ?>
                                                    <tbody>
                                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $Serial++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo e($Serial); ?></td>
                                                                <td><?php echo e($row->user->name_ar); ?></td>
                                                                <td><?php echo e($row->user->phone); ?></td>
                                                                <td><?php echo e($row->user->email); ?></td>
                                                                <td><?php echo e($row->user->birthDate); ?></td>
                                                                <td><?php echo e($row->user->address); ?></td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </table>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade  btnsaveoption" id="comments" role="tabpanel"
                                    aria-labelledby="comments-tab">

                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form method="POST" action="<?php echo e(url('admin/comments/store', $show[0]->id)); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">التعليق</label>
                                                    <textarea class="form-control mg-t-20" name="comment" placeholder="أدخل التعليق" required autocomplete="false"></textarea>
                                                </div>
                                                <input type="text" name="detection_id" value="<?php echo e($show[0]->id); ?>"
                                                    hidden>
                                                <input type="text" name="user_id" value="<?php echo e($user_id); ?>" hidden>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">انشئ</button>
                                                </div>
                                            </div>
                                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <section class="p-4 w-100">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md-8 col-lg-6">
                                                            <div class="card shadow-0 border"
                                                                style="background-color: #f0f2f5;">
                                                                <div class="card-body p-4">
                                                                    <div class="form-outline mb-4">

                                                                    </div>

                                                                    <div class="card mb-4">
                                                                        <div class="card-body">
                                                                            Comment: <?php echo e($row->comment); ?>


                                                                            <div class="d-flex justify-content-between">
                                                                                <div
                                                                                    class="d-flex flex-row align-items-center">

                                                                                    <p class="small mb-0 ms-2">Comment
                                                                                        Provider :
                                                                                        <?php echo e($row->users->name_en); ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <!-- /.card-body -->


                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade  btnsaveoption" id="rewards" role="tabpanel"
                                    aria-labelledby="rewards-tab">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card custom-card">
                                                <div class="card-body">
                                                    <button class="btn btn-primary mb-3" data-toggle="modal"
                                                        data-target="#modal-create">انشاء
                                                        مكافأة</button>

                                                    <!-- Create Modal -->
                                                    <div class="modal fade" id="modal-create">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">انشاء مكافأة جديدة</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- form start -->
                                                                    <form method="POST"
                                                                        action="<?php echo e(url('admin/rewards/store', $show[0]->id)); ?>"
                                                                        enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">نقاط
                                                                                    المكافأة</label>
                                                                                <input name="reward_points" type="number"
                                                                                    class="form-control"
                                                                                    placeholder="أدخل نقاط المكافأة"
                                                                                    required autocomplete="false">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">رابط
                                                                                    الترويج</label>
                                                                                <input name="promotion_link"
                                                                                    type="url" class="form-control"
                                                                                    placeholder="رابط الترويج" required
                                                                                    autocomplete="off">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="exampleInputEmail1">العميل</label>
                                                                                <select name="user_id"
                                                                                    class="form-control select-lg select2">
                                                                                    <option>أختر العميل</option>
                                                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option
                                                                                            value="<?php echo e($row->id); ?>">
                                                                                            <?php echo e($row->user->name_en); ?>

                                                                                        </option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            </div>
                                                                            <input type="text" name="detection_id"
                                                                                value="<?php echo e($show[0]->id); ?>" hidden>
                                                                        </div>
                                                                        <!-- /.card-body -->

                                                                        <div class="card-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">انشئ</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>

                                                    <table id="table"
                                                        class="table table-bordered table-striped text-center">
                                                        <thead>
                                                            <tr>
                                                                <th>التسلسل</th>
                                                                <th>نقاط المكافأة</th>
                                                                <th>رابط الترويج</th>
                                                                <th>العميل</th>
                                                                <th>العمليات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $number = 0;
                                                            ?>
                                                            <?php $__currentLoopData = $rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $number++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo e($number); ?></td>
                                                                    <td><?php echo e($row->reward_points); ?></td>
                                                                    <td><a href="<?php echo e($row->promotion_link); ?>"><?php echo e($row->promotion_link); ?>

                                                                    </td>
                                                                    <td><?php echo e($row->users->name_en); ?></td>
                                                                    <td class="text-center">
                                                                        <button class="btn btn-secondary dropdown-toggle"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="fas fa-sliders-h"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                            <button type="button"
                                                                                class="btn btn-success dropdown-item"
                                                                                data-toggle="modal"
                                                                                data-target="#modal-edit<?php echo e($row->reward_points); ?>"><i
                                                                                    class="fas fa-user-edit"></i>التحرير</button>
                                                                            <button type="button" class="dropdown-item"
                                                                                data-toggle="modal"
                                                                                data-target="#modal-delete<?php echo e($row->id); ?>"><i
                                                                                    style="color:red"
                                                                                    class="fas fa-user-minus"></i>الحذف</button>
                                                                        </div>
                                                                    </td>

                                                                </tr>

                                                                <!-- Delete Modal -->
                                                                <div class="modal fade"
                                                                    id="modal-delete<?php echo e($row->id); ?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">حذف المستخدم</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h5>لا تحذف المكافأة هل انت واثق؟ </h5>
                                                                            </div>
                                                                            <div
                                                                                class="modal-footer justify-content-between">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">لإغلاق</button>
                                                                                <form
                                                                                    action="<?php echo e(route('rewards.destroy', $row->id)); ?>"
                                                                                    method="POST">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <?php echo method_field('DELETE'); ?>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">الحذف</button>

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
                                                                <div class="modal fade"
                                                                    id="modal-edit<?php echo e($row->reward_points); ?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">تحرير الملف</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!-- form start -->
                                                                                <form method="POST"
                                                                                    action="<?php echo e(route('rewards.update', $row->id)); ?>"
                                                                                    enctype="multipart/form-data">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <?php echo method_field('PATCH'); ?>
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?php echo e($row->id); ?>">
                                                                                    <div class="card-body">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">نقاط
                                                                                                المكافأة</label>
                                                                                            <input name="reward_points"
                                                                                                value="<?php echo e($row->reward_points); ?>"
                                                                                                type="number"
                                                                                                class="form-control"
                                                                                                placeholder="أدخل نقاط المكافأة"
                                                                                                required
                                                                                                autocomplete="false">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">رابط
                                                                                                الترويج</label>
                                                                                            <input name="promotion_link"
                                                                                                value="<?php echo e($row->promotion_link); ?>"
                                                                                                type="url"
                                                                                                class="form-control"
                                                                                                placeholder="رابط الترويج"
                                                                                                required
                                                                                                autocomplete="false">
                                                                                        </div>

                                                                                        

                                                                                    </div>
                                                                                    <!-- /.card-body -->

                                                                                    <div class="card-footer">
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary">انشئ</button>
                                                                                    </div>
                                                                                </form>
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

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/detections/show.blade.php ENDPATH**/ ?>