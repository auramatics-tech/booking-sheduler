<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="<?php echo e(url('/' . ($page = 'index'))); ?>"><img
                src="<?php echo e(URL::asset('xd/logo.png')); ?>" class="main-logo" alt="logo"></a>

    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">
                        <?php echo e(Auth::user()->name); ?></h4>
                    <span class="mb-0 text-muted"><?php echo e(__('dash.username')); ?>: <?php echo e(Auth::user()->username); ?></span>
                    <br />
                    <span class="mb-0 text-muted">
                        
                        <a href="<?php echo e(url('/dashboard/paid-log')); ?>">
                            <?php echo e(__('dash.allp')); ?> : <?php echo e(Auth()->user()->currentPoints()); ?>

                        </a>
                    </span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">
                <?php echo e(__('dash.dash')); ?>

            </li>
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(url('/' . ($page = 'dashboard/home'))); ?>"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label"><?php echo e(__('dash.home')); ?></span></a>
            </li>

            <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
                <li class="slide">
                    <a class="side-menu__item" href="<?php echo e(url('/' . ($page = 'log-viewer'))); ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label"> log-viewer </span></a>
                </li>
            <?php endif; ?>




            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students')): ?>
                
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . ($page = '#'))); ?>">
                        <i class="fa fa-solid fa-users"></i>
                        <span class="side-menu__label"><?php echo e(__('dash.students')); ?></span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('students')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/students'))); ?>">
                                    <?php echo e(__('dash.students')); ?> </a>
                            </li>
                        <?php endif; ?>



                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add students')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/students/create'))); ?>">
                                    <?php echo e(__('dash.add')); ?> </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teachers')): ?>
                
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . ($page = '#'))); ?>">
                        <i class="far fa-address-card"></i> <span
                            class="side-menu__label"><?php echo e(__('dash.teachers')); ?></span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teachers')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/teachers'))); ?>">
                                    <?php echo e(__('dash.teachers')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teachers')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/available-times'))); ?>">
                                    <?php echo e(__('dash.AvailableTime')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teachers')): ?>
                            <li><a target="_blank" class="slide-item" href="<?php echo e(url('/' . ($page = 'tutors'))); ?>">
                                    <?php echo e(__('dash.tutors')); ?> </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add teachers')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/teachers/create'))); ?>">
                                    <?php echo e(__('dash.add')); ?> </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lessons')): ?>
                
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . ($page = '#'))); ?>">
                        <i class="fab fa-leanpub"></i><span class="side-menu__label"><?php echo e(__('dash.lessons')); ?></span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lessons')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/lessons'))); ?>">
                                    <?php echo e(__('dash.lessons')); ?> </a>
                            </li>
                        <?php endif; ?>



                        <?php if(auth()->user()->hasRole('Student')): ?>
                            <li><a target="_blank" class="slide-item" href="<?php echo e(url('/' . ($page = 'tutors'))); ?>">
                                    <?php echo e(__('dash.tutors')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add lessons')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/lessons/create'))); ?>">
                                    <?php echo e(__('dash.add')); ?> </a>
                            </li>
                        <?php endif; ?>


                    </ul>
                </li>
            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('calendar')): ?>
                <li class="slide">
                    <a class="side-menu__item" href="<?php echo e(url('/' . ($page = 'dashboard/calendar'))); ?>">
                        <i class="fas fa-calendar-alt"></i><span
                            class="side-menu__label"><?php echo e(__('dash.calendar')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(auth()->check() && auth()->user()->hasRole('Teacher')): ?>
                <li class="slide">
                    <a class="side-menu__item" href="<?php echo e(url('/' . ($page = 'dashboard/available-times'))); ?>">
                        <i class="fas fa-calendar-alt"></i><span class="side-menu__label"> <?php echo e(__('dash.AvailableTime')); ?>

                        </span></a>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscriptions')): ?>
                <li class="side-item side-item-category"><?php echo e(__('dash.subscriptions')); ?></li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . ($page = '#'))); ?>">
                        <i class="fas fa-users"></i><span
                            class="side-menu__label"><?php echo e(__('dash.subscriptions')); ?></span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscriptions')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/subscriptions'))); ?>">
                                    <?php echo e(__('dash.subscriptions')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add subscriptions')): ?>
                            <li><a class="slide-item"
                                    href="<?php echo e(url('/' . ($page = 'dashboard/subscriptions/create'))); ?>"><?php echo e(__('dash.add')); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
                <li class="side-item side-item-category"><?php echo e(__('dash.users')); ?></li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . ($page = '#'))); ?>">
                        <i class="fas fa-users"></i><span class="side-menu__label"><?php echo e(__('dash.users')); ?></span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('userList')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/users'))); ?>">
                                    <?php echo e(__('dash.users')); ?> </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usersRoles')): ?>
                            <li><a class="slide-item"
                                    href="<?php echo e(url('/' . ($page = 'dashboard/roles'))); ?>"><?php echo e(__('dash.roles')); ?> </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting')): ?>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('/' . ($page = '#'))); ?>">
                        <i class="fas fa-cog"></i>
                        <span class="side-menu__label"><?php echo e(__('dash.setting')); ?></span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting')): ?>
                            <li><a class="slide-item" href="<?php echo e(route('setting.general')); ?>">
                                    <?php echo e(__('dash.general')); ?>


                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('section')): ?>
                            <li><a class="slide-item" href="<?php echo e(url('/' . ($page = 'dashboard/sections'))); ?>">
                                    <?php echo e(__('dash.section')); ?>


                                </a>
                            </li>
                        <?php endif; ?>

                        
                    </ul>
                </li>

            <?php endif; ?>


            <?php if(auth()->user()->roles('Admin') ||
                auth()->user()->roles('Student')): ?>
                <li class="slide">
                    <a class="side-menu__item" href="<?php echo e(route('paid')); ?>">
                        
                        <i class="fas fa-receipt"></i>
                        <span class="side-menu__label"><?php echo e(__('dash.paid')); ?></span></a>
                </li>
            <?php endif; ?>


            <?php if(!auth()->user()->hasRole('Admin')): ?>
                <li class="slide">
                    <a class="side-menu__item" href="<?php echo e(route('notifications.index')); ?>">
                        
                        <i class="fas fa-bell"></i>
                        <span class="side-menu__label"><?php echo e(__('dash.notifications')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if(!auth()->user()->hasRole('Admin')): ?>
                <li class="slide">
                    <a target="_new" class="side-menu__item" href="<?php echo e(url('/chatify')); ?>">
                        
                        <i class="fas fa-comments"></i>
                        <span class="side-menu__label"><?php echo e(__('dash.liveChat')); ?></span></a>
                </li>
            <?php endif; ?>

            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(route('profile.show')); ?>">
                    <i class="fas fa-user"></i>
                    <span class="side-menu__label"><?php echo e(__('dash.Profile')); ?></span></a>
            </li>
            <?php if(auth()->check() && auth()->user()->hasRole('Teacher')): ?>
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(url('/' . ($page = 'dashboard/booking-calendar'))); ?>">
                    <i class="fas fa-calendar-alt"></i><span class="side-menu__label"> Booking Calendar
                    </span></a>
            </li>
        <?php endif; ?>
        <?php if(auth()->check() && auth()->user()->hasRole('Student')): ?>
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(url('/' . ($page = 'dashboard/booking-calendar'))); ?>">
                    <i class="fas fa-calendar-alt"></i><span class="side-menu__label"> Booking Calendar
                    </span></a>
            </li>
        <?php endif; ?>


        </ul>
    </div>
</aside>
<!-- main-sidebar -->
<?php /**PATH C:\xampp7.4\htdocs\booking-sheduler\resources\views/layouts/main-sidebar.blade.php ENDPATH**/ ?>