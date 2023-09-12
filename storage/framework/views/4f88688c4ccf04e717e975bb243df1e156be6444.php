
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
                <th>نسبة الدكتور</th>
                <th>نسبة المركز</th>
                <th>القيمة الإجمالية</th>
                <th>الطبيب</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $number = 0;
            ?>
                <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $number++;
                        ?>
                            <tr>
                                <td><?php echo e($number); ?></td>
                                <td><?php echo e($price->Profits_Dr); ?> جنيه</td>
                                <td><?php echo e($price->Profits_center); ?> جنيه</td>
                                <td><?php echo e($price->total_value); ?> جنيه</td>
                        <?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?>
                                <td><?php echo e($price->doctors->name_en); ?></td>
                        <?php elseif(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
                            <td><?php echo e($price->doctors->name_ar); ?></td>
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

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/reports/treasury.blade.php ENDPATH**/ ?>