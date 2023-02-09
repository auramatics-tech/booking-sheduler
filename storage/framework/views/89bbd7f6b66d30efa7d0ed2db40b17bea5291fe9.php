<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="<?php echo e(url('/' . ($page = 'index'))); ?>"><img src="<?php echo e(URL::asset('xd/logo.png')); ?>" class="logo-1"
                        alt="logo"></a>
                <a href="<?php echo e(url('/' . ($page = 'index'))); ?>"><img src="<?php echo e(URL::asset('xd/logo.png')); ?>"
                        class="dark-logo-1" alt="logo"></a>
                <a href="<?php echo e(url('/' . ($page = 'index'))); ?>"><img src="<?php echo e(URL::asset('xd/logo.png')); ?>"
                        class="logo-2" alt="logo"></a>
                <a href="<?php echo e(url('/' . ($page = 'index'))); ?>"><img src="<?php echo e(URL::asset('xd/logo.png')); ?>"
                        class="dark-logo-2" alt="logo"></a>
            </div>


        </div>
        <div class="main-header-right">

            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>



                <div class="dropdown">
                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                        data-toggle="dropdown" type="button">
                        language <i class="fas fa-solid fa-language"></i>
                    </button>
                    <div class="dropdown-menu tx-13">
                        <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a hreflang="<?php echo e($localeCode); ?>" class="dropdown-item"
                                href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                                <?php echo e($properties['native']); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>



                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg></a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /main-header -->


<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="<?php echo e(url('/' . ($page = 'index'))); ?>"><img
                src="<?php echo e(URL::asset('xd/logo.png')); ?>" class="main-logo" alt="logo"></a>

    </div>

</aside>
<!-- main-sidebar -->
<?php /**PATH D:\xampp-7.4.30\htdocs\xdenglish\resources\views/layouts/main-sidebaru.blade.php ENDPATH**/ ?>