
<?php $__env->startSection('css'); ?>
    <!--Internal  Font Awesome -->
    <link href="<?php echo e(URL::asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="<?php echo e(URL::asset('assets/plugins/treeview/treeview-rtl.css')); ?>" rel="stylesheet" type="text/css" />



<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.show')); ?> <?php echo e(__('dash.lessons')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><?php echo e(__('dash.lessons')); ?></h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    <?php echo e(__('dash.show')); ?> <?php echo e(__('dash.lessons')); ?>


                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('lessons.index')); ?>">Back</a>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong><?php echo e(__('dash.title')); ?>:</strong>
                                <?php echo e($lesson->title); ?>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Start Date:</strong>
                                <?php echo e($lesson->start); ?>

                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>End Date:</strong>
                                <?php echo e($lesson->end); ?>

                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <?php echo e($lesson->description); ?>

                            </div>
                        </div>

                    </div>
                <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\booking-sheduler\resources\views/dashboard/lessons/show.blade.php ENDPATH**/ ?>