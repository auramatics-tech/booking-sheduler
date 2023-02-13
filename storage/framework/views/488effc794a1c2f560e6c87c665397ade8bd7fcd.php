
<?php $__env->startSection('css'); ?>
    <!-- Internal Nice-select css  -->
    <link href="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')); ?>" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.setting')); ?>


<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">
                <a href="<?php echo e(route('setting.general')); ?>"> <?php echo e(__('dash.setting')); ?>

                </a>
            </h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- row -->
<div class="row">


    <div class="col-lg-12 col-md-12">

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Error</strong>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">

                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="<?php echo e(route('setting.post')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                    <div class="">

                        <div class="row mg-b-20">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <label for="projectinput1">
                                            <?php echo e(__('dash.photo')); ?></label>

                                        <input class="custom-file-input" name="photo" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">Choose
                                            photo</label>
                                    </div>
                                </div>
                            </div>


                            <div class="parsley-input col-md-4" id="fnWrapper">
                                <label><?php echo e(__('dash.name_app')); ?>

                                    : <span class="tx-danger"></span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="name_app"
                                    value="<?php echo e($setting->name_app ?? ''); ?>" type=" text">
                            </div>

                            <div class="parsley-input col-md-4" id="fnWrapper">
                                <label><?php echo e(__('dash.email')); ?>

                                    : <span class="tx-danger"></span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="email"
                                    value="<?php echo e($setting->email ?? ''); ?>" type="text">
                            </div>

                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> <?php echo e(__('dash.phone')); ?>: <span class="tx-danger"></span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="phone"
                                    value="<?php echo e($setting->phone ?? ''); ?>" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> <?php echo e(__('dash.skype_id')); ?>: <span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="skype_id" value="<?php echo e($setting->skype_id ?? ''); ?>" type="text">
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> <?php echo e(__('dash.kako_link')); ?>: <span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="kako_link" value="<?php echo e($setting->kako_link ?? ''); ?>" type="text">
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> <?php echo e(__('dash.chat_link')); ?>: <span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="chat_link" value="<?php echo e($setting->chat_link ?? ''); ?>" type="text">
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> <?php echo e(__('dash.address')); ?>: <span class="tx-danger"></span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="address" value="<?php echo e($setting->address ?? ''); ?>" type="text">
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> <?php echo e(__('dash.operating_hours')); ?>: <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="operating_hours" value="<?php echo e($setting->operating_hours ?? ''); ?>" type="text">
                        </div>

                    </div>




                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn btn-main-primary pd-x-20" type="submit"> <?php echo e(__('dash.confirm')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<!-- Internal Nice-select js-->
<script src="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')); ?>"></script>

<!--Internal  Parsley.min js -->
<script src="<?php echo e(URL::asset('assets/plugins/parsleyjs/parsley.min.js')); ?>"></script>
<!-- Internal Form-validation js -->
<script src="<?php echo e(URL::asset('assets/js/form-validation.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\booking-sheduler\resources\views/dashboard/setting/setting.blade.php ENDPATH**/ ?>