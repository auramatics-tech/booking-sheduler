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
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>

        </div>
        <div class="main-header-right">

            <ul class="nav">
                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">
                        <a href="#" class="d-flex  nav-item nav-link pr-0" data-toggle="dropdown"
                            aria-expanded="false">
                            <span class="avatar country-Flag mr-0 align-self-center bg-transparent">
                                
                                <i style="background: red;
                                padding: 8px;
                                margin-left: -4px;"
                                    class="fa fa-globe" aria-hidden="true"></i>

                            </span>
                            <div class="my-auto">
                                LANG
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">


                            <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <a hreflang="<?php echo e($localeCode); ?>"
                                    href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>"
                                    class="dropdown-item d-flex ">
                                    <span class=" mr-3 align-self-center">
                                        <i class="fas fa-language"></i>

                                    </span>
                                    <div class="d-flex">
                                        <span class="mt-2">
                                            <?php echo e($properties['native']); ?>

                                        </span>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="nav nav-item  navbar-nav-right ml-auto">



                


                <div class="dropdown nav-item main-header-notification d-none d-md-block">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg><span class=" pulse"></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications
                                </h6>
                                <span class="badge badge-pill badge-warning mr-auto my-auto float-left"><a
                                        href="<?php echo e(route('mark')); ?>">Mark all as read</a> </span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have
                                <?php echo e(auth()->user()->unreadNotifications->count()); ?> Unread Notifications </p>
                        </div>
                        <div class="main-notification-list Notification-scroll">

                            <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="d-flex p-3 border-bottom" href="#">
                                    <div class="notifyimg bg-pink">
                                        <i class="la la-file-alt text-white"></i>
                                    </div>
                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">
                                            <?php echo e($notification->data['title'] ?? '---'); ?>

                                            </h5>
                                        <div class="notification-subtext"> <?php echo e($notification->created_at); ?></div>
                                    </div>
                                    <div class="mr-auto">
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div class="dropdown-footer">
                            <a href="">Show All </a>
                        </div>
                    </div>
                </div>
                
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                            src="<?php echo e(url('/')); ?>/uploads/<?php echo e(Auth()->user()->profile->photo ?? 'defalut.png'); ?>"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt=""
                                        src="<?php echo e(url('/')); ?>/uploads/<?php echo e(Auth()->user()->profile->photo ?? 'defalut.png'); ?>"
                                        class="">
                                </div>
                                <div class="mr-3 my-auto">
                                    <h6><?php echo e(Auth::user()->name); ?></h6>
                                    <span><?php echo e(Auth::user()->email); ?></span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="<?php echo e(route('profile.show')); ?>"><i
                                class="bx bx-user-circle"></i><?php echo e(__('dash.Profile')); ?></a>
                        <a class="dropdown-item" href="<?php echo e(route('edit.profile')); ?>"><i class="bx bx-cog"></i>
                            <?php echo e(__('dash.editprof')); ?></a>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="bx bx-log-out"></i> <?php echo e(__('dash.logout')); ?></a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                            style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
<?php /**PATH C:\xampp7.4\htdocs\booking-sheduler\resources\views/layouts/main-header.blade.php ENDPATH**/ ?>