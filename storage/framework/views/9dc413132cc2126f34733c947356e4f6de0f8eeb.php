
<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'تقرير المواعيد'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> تقرير المواعيد </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">تقرير المواعيد</li>
            </ol>
        </div>
    </div>

    <table id="table" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>التسلسل</th>
                <th>من الساعة</th>
                <th>إلى الساعة</th>
                <th>اليوم</th>
                <th>الطبيب</th>
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
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/reports/dates.blade.php ENDPATH**/ ?>