
<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'العميل'); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> العميل </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">العميل</li>
            </ol>

        </div>

    </div>

    <div class="profile-cover__img">
        <img class="img" src="<?php echo e(asset('images/users/' . $show[0]->profile)); ?>" alt="NoImage">
    </div><br>
    <div class="panel profile-cover">

        <div class="profile-cover__img">

            <h3 class="h3">Name: <?php echo e($show[0]->name); ?></h3>
            <h3 class="h3">Email: <?php echo e($show[0]->email); ?></h3>
            <h3 class="h3">Phone: <?php echo e($show[0]->phone); ?></h3>
            <h3 class="h3">BirthDate: <?php echo e($show[0]->birthDate); ?></h3>
            <h3 class="h3">Address: <?php echo e($show[0]->address); ?></h3>
        </div>
    </div>
    </div>



    <!-- Row -->
    <div class="row square">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">


                    <div class="profile-cover__action bg-img"></div>
                    <div class="profile-cover__info">
                        <ul class="nav">
                            <li><strong><?php echo e($services); ?></strong>الخدمات</li>
                            <li><strong><?php echo e($detections); ?></strong>الزيارات</li>
                            <li><strong><?php echo e($files); ?></strong>الملفات</li>
                            <li><strong><?php echo e($bills); ?></strong>الفواتير</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-10">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="services-tab" data-toggle="tab" href="#services"
                                    role="tab" aria-controls="services" aria-selected="true"><?php echo e(__('الخدمات')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="detections-tab" data-toggle="tab" href="#detections" role="tab"
                                    aria-controls="detections" aria-selected="false"><?php echo e(__('الزيارات')); ?></a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link " id="bills-tab" data-toggle="tab" href="#bills" role="tab"
                                    aria-controls="bills" aria-selected="false"><?php echo e(__('الفواتير')); ?></a>
                            </li>
                           
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <div class="tab-pane fade show active" id="services" role="tabpanel"
                                aria-labelledby="services-tab">
                                <div class="tab-pane fade show active" id="dates" role="tabpanel"
                                    aria-labelledby="dates-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card custom-card">
                                                <div class="card-body">
                                                    <button class="btn btn-primary mb-3" data-toggle="modal"
                                                        data-target="#modal-create">انشاء خدمة</button>

                                                    <!-- Create Modal -->
                                                    <div class="modal fade" id="modal-create">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">انشاء خدمة جديدة</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- form start -->
                                                                    <form method="POST"
                                                                        action="<?php echo e(url('admin/services/store', $show[0]->id)); ?>"
                                                                        enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="card-body">
                                                                            <input type="text" name="user_id"
                                                                                value="<?php echo e($show[0]->id); ?>" hidden>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">اسم مقدم
                                                                                    الخدمة</label>
                                                                                <input name="services_provider"
                                                                                    type="text" class="form-control"
                                                                                    placeholder="أدخل اسم الخدمة" required
                                                                                    autocomplete="off">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">اسم
                                                                                    الخدمة</label>
                                                                                <input name="name" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="أدخل اسم الخدمة" required
                                                                                    autocomplete="off">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">وصف
                                                                                    الخدمة</label>
                                                                                <textarea name="description" placeholder="أدخل وصف الحدمة" required autocomplete="false"></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">قيمة
                                                                                    الخدمة</label>
                                                                                <input name="value" type="number"
                                                                                    class="form-control"
                                                                                    placeholder="أدخل قيمة الخدمة" required
                                                                                    autocomplete="off">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">طريقة
                                                                                    الدفع</label>
                                                                                <select name="payment"
                                                                                    class="form-control select-lg select2">
                                                                                    <option>أختر طريقة الدفعة</option>
                                                                                    <option value="cash">Cash</option>
                                                                                    <option value="visi">Visi</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
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
                                                            <th>العميل</th>
                                                            <th>مقدم الخدمة</th>
                                                            <th>الأسم</th>
                                                            <th>الوصف</th>
                                                            <th>القيمة</th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $userServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($service->users->name_en); ?></td>
                                                                <td><?php echo e($service->services_provider); ?></td>
                                                                <td><?php echo e($service->name); ?></td>
                                                                <td><?php echo e($service->description); ?></td>
                                                                <td><?php echo e($service->value); ?></td>

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
                                                                            data-target="#modal-edit<?php echo e($service->id); ?>"><i
                                                                                class="fas fa-user-edit"></i>التحرير</button>
                                                                        <button type="button" class="dropdown-item"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-delete<?php echo e($service->id); ?>"><i
                                                                                style="color:red"
                                                                                class="fas fa-user-minus"></i>الحذف</button>
                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <!-- Delete Modal -->
                                                            <div class="modal fade" id="modal-delete<?php echo e($service->id); ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">حذف المستخدم</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5>لا تحذف الخدمة هل انت واثق؟ </h5>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">لإغلاق</button>
                                                                            <form
                                                                                action="<?php echo e(url('admin/services/destroy', $service->id)); ?>"
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
                                                            <div class="modal fade" id="modal-edit<?php echo e($service->id); ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">تحرير المستخدم</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <!-- form start -->
                                                                            <form method="POST"
                                                                                action="<?php echo e(url('admin/services/update', $service->id)); ?>"
                                                                                enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('POST'); ?>
                                                                                <div class="card-body">

                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">اسم
                                                                                            مقدم الخدمة</label>
                                                                                        <input name="services_provider"
                                                                                            value="<?php echo e($service->services_provider); ?>"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل اسم الخدمة"
                                                                                            required autocomplete="off">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">اسم
                                                                                            الخدمة</label>
                                                                                        <input name="name"
                                                                                            value="<?php echo e($service->name); ?>"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل اسم الخدمة"
                                                                                            required autocomplete="off">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">وصف
                                                                                            الخدمة</label>
                                                                                        <textarea name="description" value="" placeholder="أدخل وصف الحدمة" required autocomplete="false"><?php echo e($service->description); ?></textarea>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">قيمة
                                                                                            الخدمة</label>
                                                                                        <input name="value"
                                                                                            value="<?php echo e($service->value); ?>"
                                                                                            type="number"
                                                                                            class="form-control"
                                                                                            placeholder="أدخل قيمة الخدمة"
                                                                                            required autocomplete="off">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">طريقة
                                                                                            الدفع</label>
                                                                                        <select name="payment"
                                                                                            class="form-control select-lg select2">
                                                                                            <option>أختر طريقة الدفعة
                                                                                            </option>
                                                                                            <option value="cash">Cash
                                                                                            </option>
                                                                                            <option value="visi">Visi
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                        <!-- /.card-body -->
                                                                        <div class="card-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">التحرير</button>
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
                        </div>
                        <div class="tab-pane fade  btnsaveoption" id="detections" role="tabpanel"
                            aria-labelledby="detections-tab">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div class="modal fade" id="modal-create">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- form start -->
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
                                                        <th>حالة الزيارة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $number = 0;
                                                    ?>
                                                    <?php $__currentLoopData = $userDetections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                <td><a href="#"class="btn btn-primary"><?php echo e(__('زيارة مفتوحة')); ?></a></td>
                                                            <?php elseif($row->status == 2): ?>
                                                                <td><a href="#" class="btn btn-primary"><?php echo e(__('زيارة قيد التنفيذ')); ?></a></td>
                                                            <?php elseif($row->status == 3): ?>
                                                                <td><a href="#" class="btn btn-primary"><?php echo e(__('زيارة تحت التنفيذ')); ?></a></td>
                                                            <?php elseif($row->status == 5): ?>
                                                                <td><a href="#" class="btn btn-primary"><?php echo e(__('زيارة منتهية')); ?></a></td>
                                                            <?php elseif($row->status == 6): ?>
                                                                <td><a href="#" class="btn btn-danger"><?php echo e(__('زيارة ملغاة')); ?></a></td>
                                                            <?php endif; ?>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade  btnsaveoption" id="bills" role="tabpanel"
                            aria-labelledby="bills-tab">
                            <form action="https://demo.freaktemplate.com/singleclinic/admin/updateworkinghours"
                                method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="MSAjWUB2QKT128l9aX9V8FBbf8EHOvlIqAla5tUT">
                                <input type="hidden" name="id" id="id" value="0" />
                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <div class="col-sm-6">

                                            <thead>
                                                <tr>
                                                    <th><?php echo e(__('التسلسل')); ?></th>
                                                    <th><?php echo e(__('الخصم')); ?></th>
                                                    <th><?php echo e(__('القيمة الإجمالية')); ?></th>
                                                    <th><?php echo e(__('طريقة الدفع')); ?></th>
                                                    <th><?php echo e(__('اسم الطبيب')); ?></th>
                                                </tr>
                                            </thead>
                                            <?php
                                                $Serial = 0;
                                            ?>
                                            <tbody>
                                            <?php $__currentLoopData = $userBills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $Serial++;
                                                    ?>
                                                <tr>
                                                    <td><?php echo e($Serial); ?></td>
                                                    <td><?php echo e($row->discount); ?></td>
                                                    <td><?php echo e($row->total_value); ?></td>
                                                    <td><?php echo e($row->payment); ?></td>
                                                    <td><?php echo e($row->doctors->name_en); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                                <h5 class="alert alert-info">المجموع: <?php echo e($total); ?> جنيه</h5>
                            </form>
                        </div>
                    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\adminpanellaravel\resources\views/admin/users/show.blade.php ENDPATH**/ ?>