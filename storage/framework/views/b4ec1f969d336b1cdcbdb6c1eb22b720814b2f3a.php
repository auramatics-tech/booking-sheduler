
<?php $__env->startSection('css'); ?>
    <!-- Internal Data table css -->
    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet">
<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.Profile')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> <?php echo e(__('dash.dash')); ?> </h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">
                <?php echo e(__('dash.Profile')); ?>

            </span>
        </div>

    </div>


</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="">
    <div class="content-wrapper">

        <div class="row">
            <!-- Col -->
            <div class="col-lg-6">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="pl-0">
                            <div class="main-profile-overview">

                                <div class="d-flex justify-content-between mg-b-20">
                                    <div>
                                        <div class="main-img-user profile-user">
                                            <img alt=""
                                                src="<?php echo e(url('/')); ?>/uploads/<?php echo e(Auth()->user()->profile->photo); ?>"><a
                                                class="fas fa-camera profile-edit"
                                                href="<?php echo e(route('edit.profile')); ?>"></a>
                                        </div>

                                        <h5 class="main-profile-name"><?php echo e(Auth()->user()->name ?? '----'); ?></h5>
                                        <br />
                                        <h5 class="main-profile-name">
                                            <?php echo e(Auth()->user()->profile->name_ko ?? '----'); ?></h5>



                                        <p class="main-profile-name-text">
                                            <?php echo e(__('dash.username')); ?> :
                                            <?php echo e(Auth()->user()->username ?? '----'); ?>

                                        </p>
                                        <p class="main-profile-name-text">
                                            <?php echo e(__('dash.email')); ?> :
                                            <?php echo e(Auth()->user()->email ?? '----'); ?>

                                        </p>

                                    </div>

                                </div>
                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('edit.profile')); ?>">
                                    <?php echo e(__('dash.editprof')); ?></a>
                                <!-- main-profile-bio -->

                                <?php if(auth()->user()->hasRole('Student')): ?>


                                    <hr class="mg-y-30">

                                    <label class="main-content-label tx-13 mg-b-20">

                                        <?php echo e(__('dash.mySubscription')); ?>

                                    </label>
                                    <?php if(isset($subscription)): ?>

                                        <div class="main-profile-social-list">

                                            <div class="media">
                                                <div class="media-icon bg-primary-transparent text-primary">
                                                    <i style="margin: auto !important;" class="fas fa-info"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>주문번호: </span>
                                                    <?php echo e($subscription->UID); ?>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-icon bg-primary-transparent text-primary">
                                                    <i style="margin: auto !important;" class="fas fa-info"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>수강권 :: </span>
                                                    <?php echo e($subscription->name); ?>

                                                    </a>
                                                </div>
                                            </div>


                                            <div class="media">
                                                <div class="media-icon bg-primary-transparent text-primary">
                                                    <i style="margin: auto !important;" class="fas fa-calendar-day"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>수강 시작일: </span>
                                                    <?php echo e($subscription->start); ?>

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-icon bg-success-transparent text-success">
                                                    <i style="margin: auto !important;" class="fas fa-calendar-day"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>수강 종료일 : </span>
                                                    <?php echo e($subscription->end); ?>

                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-icon bg-info-transparent text-info">
                                                    <i class="icon ion-logo-linkedin"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>수강 요일 : </span>
                                                    <div class="d-flex">
                                                        <?php $__currentLoopData = $subscription->day_lesson; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <span class="tag mr-2"> <?php echo e($day); ?></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-icon bg-danger-transparent text-danger">
                                                    <i class="icon ion-md-link"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>상태</span>

                                                    <?php if($subscription->status == 'active'): ?>
                                                        <span
                                                            class="tag tag-green d-flex"><?php echo e($subscription->status); ?></span>
                                                    <?php else: ?>
                                                        <span
                                                            class="tag tag-red d-flex"><?php echo e($subscription->status); ?></span>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-solid-danger mg-b-0" role="alert">
                                            <button aria-label="Close" class="close" data-dismiss="alert"
                                                type="button">
                                                <span aria-hidden="true">&times;</span></button>
                                            <?php echo e(__('dash.subInfo')); ?>

                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <hr class="mg-y-30">
                            </div><!-- main-profile-overview -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="main-content-label tx-13 mg-b-25">
                            <?php echo e(__('dash.conatct')); ?>

                        </div>
                        <div class="main-profile-contact-list">
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-md-phone-portrait"></i>
                                </div>
                                <div class="media-body">
                                    <span>
                                        <?php echo e(__('dash.phone')); ?>

                                    </span>
                                    <div>
                                        <?php echo e(Auth()->user()->profile->phone ?? '----'); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-success-transparent text-success">
                                    <i class="icon ion-logo-slack"></i>
                                </div>
                                <div class="media-body">
                                    <span>
                                        <?php echo e(__('dash.skyId')); ?>

                                    </span>
                                    <div>
                                        <?php echo e(Auth()->user()->profile->skype_id ?? '----'); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-info-transparent text-info">
                                    <i class="icon ion-md-locate"></i>
                                </div>
                                <div class="media-body">
                                    <span>
                                        <?php echo e(__('dash.Zoom_url')); ?>

                                    </span>
                                    <div>
                                        <?php echo e(Auth()->user()->profile->zoom_url ?? '----'); ?>

                                    </div>
                                </div>
                            </div>
                        </div><!-- main-profile-contact-list -->
                    </div>
                </div>
            </div>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-7.4.30\htdocs\xdenglish\resources\views/dashboard/profile/show.blade.php ENDPATH**/ ?>