
<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'حركة الخزينة'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> حركة الخزينة </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">حركة الخزينة</li>
            </ol>
        </div>
    </div>




    <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
            <th>التسلسل</th>
            <th>الطبيب</th>
            <th>القيمة الإجمالية</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $number = 0;
            ?>
        <?php $__currentLoopData = $doctorBills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $number++;
        ?>
            <tr>
                <td>
                    <?php echo e($number); ?>

                </td>
                <td>
                    <?php echo e($row->doctors->name_en); ?>

                </td>
                <td>
                    <?php echo e($row->total_value); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/reports/doctors_balances.blade.php ENDPATH**/ ?>