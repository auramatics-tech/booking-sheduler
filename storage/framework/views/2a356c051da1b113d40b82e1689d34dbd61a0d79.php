
<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.dash')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!--  Owl-carousel css-->
    <link href="<?php echo e(URL::asset('assets/plugins/owl-carousel/owl.carousel.css')); ?>" rel="stylesheet" />
    <!-- Maps css -->
    <link href="<?php echo e(URL::asset('assets/plugins/jqvmap/jqvmap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> <?php echo e(__('dash.setting')); ?>

                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/

                    <?php echo e(__('dash.general')); ?>

                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <!-- row -->
    <div class="row row-sm mt-5">
        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a target="_new" href="<?php echo e(route('setting.get')); ?>">
                <div class="card text-center bg-danger-gradient">
                    <div class=" card-body ">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i class="ti-bar-chart project bg-primary-transparent mx-auto text-primary "></i>
                        </div>
                        <h4 class="mb-1 text-white">
                            <?php echo e(__('dash.setting')); ?>

                        </h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a target="_new" href="<?php echo e(route('notifications.index')); ?>">
                <div class="card text-center bg-danger-gradient">
                    <div class="card-body ">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i class="ti-pie-chart project bg-pink-transparent mx-auto text-pink "></i>
                        </div>
                        <h4 class="mb-1 text-white"><?php echo e(__('dash.notification')); ?></h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a href="#">
                <div class="card text-center bg-danger-gradient">
                    <div class="card-body">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i class="ti-pulse  project bg-teal-transparent mx-auto text-teal "></i>
                        </div>
                        <h4 class="mb-1 text-white"><?php echo e(__('dash.boards')); ?></h6>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a target="_new" href="<?php echo e(url('/chatify')); ?>">
                <div class="card text-center bg-danger-gradient">
                    <div class="card-body">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i style="color: white; font-size: 22px" class="fa fa-comments" aria-hidden="true"></i>

                        </div>
                        <h4 class="mb-1 text-white"><?php echo e(__('dash.liveChat')); ?></h6>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6 col-md-6">
            <a target="_new" href="<?php echo e(url('/translations')); ?>">
                <div class="card text-center bg-danger-gradient">
                    <div class="card-body">
                        <div class="feature widget-2 text-center mt-0 mb-3">
                            <i style="color: white; font-size: 22px" class="fa fa-comments" aria-hidden="true"></i>

                        </div>
                        <h4 class="mb-1 text-white"><?php echo e(__('dash.translations')); ?></h6>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <!-- /row -->

    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!--Internal  Chart.bundle js -->
    <script src="<?php echo e(URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')); ?>"></script>
    <!-- Moment js -->
    <script src="<?php echo e(URL::asset('assets/plugins/raphael/raphael.min.js')); ?>"></script>
    <!--Internal  Flot js-->
    <script src="<?php echo e(URL::asset('assets/plugins/jquery.flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/dashboard.sampledata.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/chart.flot.sampledata.js')); ?>"></script>
    <!--Internal Apexchart js-->
    <script src="<?php echo e(URL::asset('assets/js/apexcharts.js')); ?>"></script>
    <!-- Internal Map -->
    <script src="<?php echo e(URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/modal-popup.js')); ?>"></script>
    <!--Internal  index js -->
    <script src="<?php echo e(URL::asset('assets/js/index.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/jquery.vmap.sampledata.js')); ?>"></script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\booking-sheduler\resources\views/dashboard/setting/general.blade.php ENDPATH**/ ?>