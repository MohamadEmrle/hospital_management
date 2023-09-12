

<?php $__env->startSection('Setting'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection( $group->name ); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e($group->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> <?php echo e($group->name); ?> </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">إعدادات</li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($group->name); ?></li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">

                    <form role="form" action="<?php echo e(route('settings.update',$group->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="card-body">
                            <?php $__currentLoopData = $group->settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($setting->type == 'string'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo e($setting->description); ?></label>
                                        <input type="text" name="<?php echo e($setting->id); ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo e($setting->value); ?>">
                                    </div>
                                <?php elseif($setting->type == 'email'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo e($setting->description); ?></label>
                                        <input type="email" name="<?php echo e($setting->id); ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo e($setting->value); ?>">
                                    </div>
                                <?php elseif($setting->type == 'number'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo e($setting->description); ?></label>
                                        <input type="number" name="<?php echo e($setting->id); ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo e($setting->value); ?>">
                                    </div>
                                <?php elseif($setting->type == 'textarea'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo e($setting->description); ?></label>
                                        <textarea name="<?php echo e($setting->id); ?>"><?php echo e($setting->value); ?></textarea>
                                        <script>
                                            CKEDITOR.replace( '<?php echo e($setting->id); ?>' );
                                        </script>
                                    </div>
                                <?php elseif($setting->type == 'file'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputFile"><?php echo e($setting->description); ?></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="<?php echo e($setting->id); ?>" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">التحرير</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>