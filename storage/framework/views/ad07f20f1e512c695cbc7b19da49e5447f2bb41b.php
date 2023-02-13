
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
            <h4 class="content-title mb-0 my-auto">
                <?php echo e(__('dash.tutors')); ?> : <?php echo e($data->name); ?>

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



    <!-- Col -->
    <div class="col-lg-8 m-auto">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="pl-0">
                    <div class="main-profile-overview">

                        <div class="d-flex justify-content-between mg-b-20">
                            <div>
                                <div class="main-img-user profile-user">
                                    <img alt=""
                                        src="<?php echo e(url('/')); ?>/uploads/<?php echo e($data->profile->photo ?? 'defalut.png'); ?>"><a
                                        class="" href="#"></a>
                                </div>

                                <h5 class="main-profile-name"><?php echo e($data->name ?? '----'); ?></h5>
                                <br />
                                <h5 class="main-profile-name">
                                    <?php echo e($data->profile->name_ko ?? '----'); ?></h5>


                                <p class="main-profile-name-text">
                                    <?php echo e(__('dash.email')); ?> :
                                    <?php echo e($data->email ?? '----'); ?>

                                </p>

                                <div class="main-profile-contact-list mt-3">
                                    <div class="media">
                                        <div class="media-icon bg-primary-transparent text-primary">
                                            <i class="icon ion-md-phone-portrait"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>전공</span>
                                            <div>
                                                <?php echo e($data->profile->major ?? '----'); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-success-transparent text-success">
                                            <i class="icon ion-logo-slack"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>나라</span>
                                            <div>
                                                <?php echo e($data->profile->country ?? '----'); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-info-transparent text-info">
                                            <i class="icon ion-md-locate"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>tags</span>
                                            <div>
                                                <?php echo e($data->profile->tags ?? '----'); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-info-transparent text-info">
                                            <i class="icon ion-md-locate"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>자기소개</span>
                                            <div>
                                                <?php echo e($data->profile->introduction ?? '----'); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>




                        </div>

                        <!-- main-profile-bio -->

                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>


        <div class="card mg-b-20">
            <div class="card-body">
                <div class="pl-0">
                    <div class="main-profile-overview">

                        <div class="d-flex justify-content-between mg-b-20">
                            <div>

                                <h5 class="main-profile-name">자기소개</h5>
                                <br />
                                <p>
                                    <?php echo e($data->profile->introduction ?? '---'); ?>

                                </p>

                                <br />


                                <style>
                                    #iframe {
                                        width: 700px;
                                    }

                                    @media  only screen and (max-width: 600px) {
                                        #iframe {
                                            width: 100%;
                                        }
                                    }
                                </style>
                                <iframe id="iframe" frameborder="0" allowfullscreen="" class="mt-5 m-auto"
                                    height="315"
                                    src="http://www.youtube.com/embed/<?php echo e($data->profile->youtube_link); ?>">
                                </iframe>


                            </div>




                        </div>

                        <!-- main-profile-bio -->

                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>


    </div>

    




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

<?php echo $__env->make('layouts.master3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\booking-sheduler\resources\views/front/tutor.blade.php ENDPATH**/ ?>