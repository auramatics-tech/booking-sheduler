
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
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">
                    <?php echo e(__('dash.dash')); ?>

                    - Wellcom : <?php echo e(auth::user()->name); ?>

                </h2>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
        <div class="row row-sm">
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card bg-primary-gradient text-white ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="icon1 mt-2 text-center">
                                    <i class="fe fe-users tx-40"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-0 text-center">
                                    <span class="text-white">User</span>
                                    <h2 class="text-white mb-0"> <?php echo e(\App\Models\User::count()); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card bg-danger-gradient text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="icon1 mt-2 text-center">
                                    <i class="fe fe-shopping-cart tx-40"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-0 text-center">
                                    <span class="text-white">Student</span>
                                    <h2 class="text-white mb-0">
                                        <?php echo e(\App\Models\User::whereHas('roles', function ($q) {
                                            $q->where('name', 'Student');
                                        })->count()); ?>

                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card bg-success-gradient text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="icon1 mt-2 text-center">
                                    <i class="fe fe-bar-chart-2 tx-40"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-0 text-center">
                                    <span class="text-white">Teacher</span>
                                    <h2 class="text-white mb-0">
                                        <?php echo e(\App\Models\User::whereHas('roles', function ($q) {
                                            $q->where('name', 'Teacher');
                                        })->count()); ?>

                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card bg-warning-gradient text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="icon1 mt-2 text-center">
                                    <i class="fe fe-pie-chart tx-40"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-0 text-center">
                                    <span class="text-white">Lesson</span>
                                    <h2 class="text-white mb-0"> <?php echo e(\App\Models\Lesson::count()); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>



    <?php if(auth()->check() && auth()->user()->hasRole('Student')): ?>
        <!-- row -->
        <div class="row row-sm ">
            <div class="col-lg-6 col-md-12 col-xl-6 ">
                <!--Page Widget Error-->
                <div class="card bd-0 mg-b-20">
                    <div class="card-body bd bd-success text-success text-center">
                        <div class="success-widget">
                            <h3><?php echo e(__('dash.allp')); ?></h3>
                            <p class="mt-3 mb-0">
                                <?php echo e(Auth()->user()->name); ?>: <?php echo e(Auth()->user()->currentPoints()); ?></p>
                        </div>
                    </div>
                </div>
                <!--Page Widget Error-->
            </div>

        </div>
        <!-- /row -->
    <?php endif; ?>



    <div class="row bg-white">
        <div class="col-lg-10 col-md-10 m-auto pd-t-50">

            <div id="calendar"></div>
        </div>

    </div>

    </div>
    </div>
    <!-- Container closed -->
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





    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                locale: 'ko',
                editable: true,
                initialView: 'dayGridWeek',
                buttonText: {
                    today: '오늘',
                    month: '월',
                    week: '주',
                    day: '오늘',
                    list: '목록'
                },
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: '/dashboard/calendar',
                eventColor: '#F67637',
                eventTextColor: '#ffffff',
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event Title:');

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                        $.ajax({
                            url: "/dashboard/full-calender/action",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            success: function(data) {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Created Successfully");
                                // location.reload();
                                // $("#calendar").load(location.href + " #calendar");


                            }
                        })
                    }
                },
                editable: true,
                eventResize: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/dashboard/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");

                        }
                    })
                },
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "/dashboard/full-calender/action",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success: function(response) {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");

                        }
                    })
                },

                eventClick: function(event) {
                    if (confirm("Are you sure you want to remove it?")) {
                        var id = event.id;
                        $.ajax({
                            url: "/dashboard/full-calender/action",
                            type: "POST",
                            data: {
                                id: id,
                                type: "delete"
                            },
                            success: function(response) {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Deleted Successfully");

                            }
                        })
                    }
                }
            });

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\booking-sheduler\resources\views/home.blade.php ENDPATH**/ ?>