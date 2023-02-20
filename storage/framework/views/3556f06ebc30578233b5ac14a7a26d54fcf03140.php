
<?php $__env->startSection('css'); ?>
    <!-- Internal Nice-select css  -->
    <link href="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')); ?>" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.edit')); ?> <?php echo e(__('dash.users')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> <?php echo e(__('dash.users')); ?></h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                <?php echo e(__('dash.edit')); ?> <?php echo e(__('dash.users')); ?>

            </span>
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
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="<?php echo e(route('users.index')); ?>">
                            <?php echo e(__('dash.back')); ?>

                        </a>
                    </div>
                </div><br>

                <?php echo Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id], 'files' => true]); ?>

                <div class="">

                    <div class="row mg-b-20">

                        <div class="col-md-12">
                            <div class="form-group">
                                <img width="70" height="70"
                                    src="<?php echo e(url('/')); ?>/uploads/<?php echo e($user->profile->photo ?? 'defalut.png'); ?>" />

                                <div class="custom-file">
                                    <label for="projectinput1">
                                        <?php echo e(__('dash.photo')); ?></label>

                                    <input class="custom-file-input" name="photo" id="customFile" type="file"> <label
                                        class="custom-file-label" for="customFile">Choose
                                        photo</label>
                                </div>
                            </div>
                        </div>

                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label> <?php echo e(__('dash.name')); ?>: <span class="tx-danger">*</span></label>
                            <?php echo Form::text('name', null, ['class' => 'form-control', 'required']); ?>

                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> <?php echo e(__('dash.email')); ?>: <span class="tx-danger">*</span></label>
                            <?php echo Form::text('email', null, ['class' => 'form-control', 'required']); ?>

                        </div>
                    </div>

                </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> <?php echo e(__('dash.password')); ?>: <span class="tx-danger">*</span></label>
                        <?php echo Form::password('password', ['class' => 'form-control']); ?>

                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> <?php echo e(__('dash.confrimPass')); ?> : <span class="tx-danger">*</span></label>
                        <?php echo Form::password('confirm-password', ['class' => 'form-control']); ?>

                    </div>
                </div>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg-6">
                        <label class="form-label"> <?php echo e(__('dash.status')); ?></label>
                        <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                            <option value="<?php echo e($user->status); ?>"><?php echo e($user->status); ?></option>
                            <option value="active">Active</option>
                            <option value="notActie"> Not Active</option>
                        </select>
                    </div>
                </div>

                <div class="row mg-b-20">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong> <?php echo e(__('dash.type')); ?></strong>
                            <?php echo Form::select('roles_name[]', $roles, $userRole, ['class' => 'form-control', 'multiple']); ?>

                        </div>
                    </div>
                </div>
                <div class="mg-t-30">
                    <button class="btn btn-main-primary pd-x-20" type="submit">
                        <?php echo e(__('dash.edit')); ?>

                    </button>
                </div>
                <?php echo Form::close(); ?>

            </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\booking-sheduler\resources\views/dashboard/users/edit.blade.php ENDPATH**/ ?>