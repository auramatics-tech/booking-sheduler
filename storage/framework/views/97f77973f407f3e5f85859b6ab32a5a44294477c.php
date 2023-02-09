<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />
    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <style>
        @import  url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600&display=swap');

        /* *,
        body,
        html {
            font-family: 'Cairo', sans-serif;

        } */

        i.fa,
        i.far,
        i.fab,
        i.fas {
            font-size: 20px !important;
            margin-right: 10px !important;
        }

        a {
            color: #5b6e88;
            text-decoration: none;
            background-color: transparent;
        }

        .app-sidebar .side-item.side-item-category:not(:first-child) {
            margin-top: unset !important;
        }

        li.select2-selection__choice {
            background-color: #ff8829 !important;
            border: 1px solid #ff8829 !important;
        }

        .app-sidebar {
            height: 60px !important;
        }

        .app-content {
            margin-left: 30px !important;
            margin-right: 30px !important;
        }

        .widget-user .widget-user-image>img {
            width: 80px !important;
            height: 80px !important;
            border: 3px solid #fff !important;
            object-fit: cover !important;
        }

        .widget-user .widget-user-image {
            position: absolute !important;
            top: 70px !important;
            left: 50% !important;
            margin-left: -45px !important;
        }
    </style>
</head>

<body class="main-body app sidebar-mini">
    <!-- Loader -->
    <div id="global-loader">
        <img src="<?php echo e(URL::asset('assets/img/loader.svg')); ?>" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->
    <?php echo $__env->make('layouts.main-sidebaru', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- main-content -->
    <div>
        
        <!-- container -->
        <div class="container">
            <?php echo $__env->yieldContent('page-header'); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('includes.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH D:\xampp-7.4.30\htdocs\xdenglish\resources\views/layouts/master3.blade.php ENDPATH**/ ?>