<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.fpass')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="<?php echo e(URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')); ?>"
        rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="<?php echo e(URL::asset('xd/logo.png')); ?>" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto"
                            alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="mb-5 d-flex"> <a href="index.html"><img src="<?php echo e(URL::asset('xd/logo.png')); ?>"
                                            class="sign-favicon ht-40" alt="logo"></a>
                                </div>
                                <div class="main-card-signin d-md-flex bg-white">
                                    <div class="wd-100p">

                                        <div>
                                            <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a hreflang="<?php echo e($localeCode); ?>" class="tag mb-2"
                                                    href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                                                    <?php echo e($properties['native']); ?>

                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        <div class="main-signin-header">
                                            <h2> <?php echo e(__('dash.forgetPass')); ?></h2>
                                            <h4><?php echo e(__('dash.forPh')); ?></h4>


                                            <?php if(session('status')): ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?php echo e(session('status')); ?>

                                                </div>
                                            <?php endif; ?>

                                            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <label><?php echo e(__('dash.email')); ?></label>
                                                    <input value="<?php echo e(old('email')); ?>" name="email" type="email"
                                                        id="email" class="form-control"
                                                        placeholder="<?php echo e(__('dash.email')); ?>" type="text">
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <button type="submit"
                                                    class="btn btn-main-primary btn-block"><?php echo e(__('dash.send')); ?></button>
                                            </form>
                                        </div>


                                        <div class="main-signup-footer mg-t-20">
                                            <p><a href="<?php echo e(route('login')); ?>">
                                                    <?php echo e(__('dash.login')); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/xdenglish.net/app.xdenglish.net/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>