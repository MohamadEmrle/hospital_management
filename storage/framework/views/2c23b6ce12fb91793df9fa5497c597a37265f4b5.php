

<?php $__env->startSection('Users'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('User'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','زيارات تحت التنفيذ'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> زيارات تحت التنفيذ </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">زيارات تحت التنفيذ</li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">

                

                    <table id="table" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <tr>
                                <th>التسلسل</th>
                                <th>نسبة الدكتور</th>
                                <th>نسبة المركز</th>
                                <th>أسم الطبيب</th>
                                <th>الموعد</th>
                                <th>أسم المريض</th>
                                <th>حالة الزيارة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $number = 0;
                            ?>
                            <?php $__currentLoopData = $detections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $number++;
                                ?>
                                <tr>
                                    <td><?php echo e($number); ?></td>
                                    <td><?php echo e($row->prices->Profits_Dr); ?></td>
                                    <td><?php echo e($row->prices->Profits_center); ?></td>
                                    <td><?php echo e($row->doctors->name_en); ?></td>
                                    <td><?php echo e($row->date->day); ?></td>
                                    <td><?php echo e($row->user->name_en); ?></td>
                                <?php if($row->status == 3): ?>
                                    <td><a href="<?php echo e(url('admin/detection_completeEd',$row->id)); ?>" class="btn btn-primary"><?php echo e(__('زيارة تحت التنفيذ')); ?></a></td>
                                <?php endif; ?>
                                <td class="text-center">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sliders-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        
                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete<?php echo e($row->id); ?>" ><i style="color:red" class="fas fa-user-minus"></i>الحذف</button>
                                    </div>
                                </td>

                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete<?php echo e($row->id); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">حذف المستخدم</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>هل انت واثق من الحذف؟ </h5>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">لإغلاق</button>
                                              <form action="<?php echo e(url('admin/detection_destroy',$row->id)); ?>" method="POST">
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
                          //  <div class="modal fade" id="modal-edit<?php echo e($row->id); ?>">
                          //     <div class="modal-dialog">
                          //         <div class="modal-content">
                          //             <div class="modal-header">
                          //                 <h4 class="modal-title">تحرير المستخدم</h4>
                          //                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          //                     <span aria-hidden="true">&times;</span>
                          //                 </button>
                          //             </div>
                          //             <div class="modal-body">
                          //                 <!-- form start -->
                          //             <form  method="POST" action="<?php echo e(route('expenses.update',$row->id)); ?>"  enctype="multipart/form-data">
                          //                     <?php echo csrf_field(); ?>
                          //                     <?php echo method_field('PATCH'); ?>
                          //                     
                          //                     <div class="card-body">
                          //                         
                          //                     </div>
                          //                     <!-- /.card-body -->

                          //                     <div class="card-footer">
                          //                         <button type="submit" class="btn btn-primary">التحرير</button>
                          //                     </div>
                          //                 </form>
                          //             </div>
                          //         </div>
                          //         <!-- /.modal-content -->
                          //     </div>
                          //     <!-- /.modal-dialog -->
                          // </div>
                          // <!-- /.modal -->

                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </table>

                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(e) {

        $('#doctor_id').change(function() {
            var id = $(this).val();
			console.log(id);
            if(id) {
                $.ajax({
                    url: "<?php echo e(url('admin/detections/price_ajax')); ?>/"+id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $("#day_name").find('option:not(:first)').remove();
						if (data['dates'])
						{
							$.each(data['dates'],function(key,value){
								$("#day_name").append("<option id='"+value['id']+"'>"+value['day']+"</option>");
							});
						}

                    }
                });
            }else{
                $('#day_name').empty();
            }
        });
    });
</script>
<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/detections/detection_inprogress.blade.php ENDPATH**/ ?>