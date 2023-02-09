
<?php $__env->startSection('css'); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.tutors')); ?>

<?php $__env->stopSection(); ?>

<!-- Internal Data table css -->

<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
<!--Internal   Notify -->
<link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> <?php echo e(__('dash.tutors')); ?>

            </h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<div class="row">

    <div class="col-md-12 mb-4">
        <form action="<?php echo e(route('tutors.search')); ?>" method="POST">

            <div class="col-md-8 m-auto ">
                <div class="card-body pb-0">
                    <div class="input-group mb-2">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="name" class="form-control" placeholder="선생님의 성함을 입력 해 주세요.">
                        <span class="input-group-append">
                            <button class="btn ripple btn-primary" type="button">검색</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <?php if(count($data) > 0): ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12 col-xl-4 col-lg-12">
                <div class="card user-wideget user-wideget-widget widget-user">
                    <div class="widget-user-header bg-primary">
                        <h3 class="widget-user-username" style="cursor: pointer;"
                            onclick='location.href="<?php echo e(route('tutors.show', $t->id)); ?>"'>
                            <?php echo e($t->name); ?></h3>
                        <h6 class="widget-user-desc"><?php echo e($t->email); ?></h5>
                    </div>
                    <div class="widget-user-image">
                        
                        <img style="cursor: pointer;" onclick='location.href="<?php echo e(route('tutors.show', $t->id)); ?>"'
                            src="<?php echo e(url('/')); ?>/uploads/<?php echo e($t->profile->photo ?? 'defalut.png'); ?>"
                            class="brround" alt="User Avatar">
                    </div>
                    <div class="user-wideget-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo e($t->profile->major ?? '----'); ?></h5>
                                    <h5 class="description-text"> <?php echo e(__('dash.major')); ?></h5>
                                </div>
                            </div>
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo e($t->profile->country ?? '----'); ?></h5>
                                    <h5 class="description-text"><?php echo e(__('dash.country')); ?> </h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">
                                        <?php if($t->profile->youtube_link): ?>
                                            <a target="_new"
                                                href="http://www.youtube.com/embed/<?php echo e($t->profile->youtube_link); ?>">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="#">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        <?php endif; ?>
                                    </h5>
                                    <span class="description-text">

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div class="col md-8" m-auto>
            <div class="alert alert-solid-warning" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span></button>
                <strong>No!</strong> No data was found .
            </div>
        </div>
    <?php endif; ?>

</div>


</div>

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!-- Internal Data tables -->
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')); ?>"></script>
<!--Internal  Datatable js -->
<script src="<?php echo e(URL::asset('assets/js/table-data.js')); ?>"></script>
<!--Internal  Notify js -->
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifIt.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifit-custom.js')); ?>"></script>
<!-- Internal Modal js-->
<script src="<?php echo e(URL::asset('assets/js/modal.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-7.4.30\htdocs\xdenglish\resources\views/front/tutors.blade.php ENDPATH**/ ?>