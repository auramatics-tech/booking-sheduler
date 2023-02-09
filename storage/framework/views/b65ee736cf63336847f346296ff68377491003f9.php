
<?php $__env->startSection('css'); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.paid')); ?>

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
            <h4 class="content-title mb-0 my-auto"> <?php echo e(__('dash.dash')); ?>

            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/

                <?php echo e(__('dash.list')); ?> <?php echo e(__('dash.paid')); ?>

            </span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>





<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">

            <div class="card-body">



                <div class=" tab-menu-heading">
                    <div class="tabs-menu1">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs main-nav-line">
                            <li><a href="#tab1" class="nav-link active" data-toggle="tab"><?php echo e(__('dash.paid')); ?></a>
                            </li>
                            <li><a href="#tab2" class="nav-link" data-toggle="tab"><?php echo e(__('dash.poinit')); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 panel-body tabs-menu-body main-content-body-right border">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <div class="table-responsive hoverable-table">
                                <table class="table table-hover" id="example1" data-page-length='50'
                                    style=" text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0"><?php echo e(__('dash.name')); ?> </th>
                                            <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.phone')); ?></th>
                                            <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.product')); ?></th>
                                            <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.data')); ?></th>
                                            <th class="wd-15p border-bottom-0"><?php echo e(__('dash.price')); ?> </th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($index + 1); ?></td>
                                                <td><?php echo e(App\User::find($dd->user_id)->name ?? '--'); ?></td>
                                                <td><?php echo e(App\User::find($dd->user_id)->profile()->phone ?? '--'); ?></td>
                                                <td><?php echo e(App\Subscription::where('student_id', $dd->user_id)->first()->name); ?>

                                                </td>
                                                <td><?php echo e($dd->date); ?></td>
                                                <td><?php echo e(number_format($dd->price, 2, '.', ',')); ?></td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>


                        <div class="tab-pane" id="tab2">

                            <h4 class="alert alert-danger">
                                <?php echo e(__('dash.allp')); ?> : <?php echo e(Auth()->user()->currentPoints()); ?>

                            </h4>


                            <div class="table-responsive hoverable-table">
                                <table class="table table-hover" id="example1" data-page-length='50'
                                    style=" text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0"><?php echo e(__('dash.student')); ?> </th>
                                            <th class="wd-15p border-bottom-0"><?php echo e(__('dash.poinit')); ?> </th>
                                            <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.message')); ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ponit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($index + 1); ?></td>
                                                <td>
                                                    <?php echo e(App\User::where('id', $ponit->pointable_id)->first()->name ?? '---'); ?>

                                                </td>
                                                <td><?php echo e($ponit->amount ?? '--'); ?></td>

                                                <td><?php echo e($ponit->message); ?></td>


                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            </div>


                        </div>

                    </div>
                </div>





            </div>
        </div>
    </div>
    <!--/div-->

    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">
                        <?php echo e(__('dash.delete')); ?> </h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="<?php echo e(route('subscriptions.destroy', 'test')); ?>" method="post">
                    <?php echo e(method_field('delete')); ?>

                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                        <p><?php echo e(__('dash.alretDelete')); ?></p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo e(__('dash.cancle')); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('dash.sure')); ?></button>
                    </div>
            </div>
            </form>
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

<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #username').val(username);
    })
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/xdenglish.net/app.xdenglish.net/resources/views/dashboard/subscriptions/paidLog.blade.php ENDPATH**/ ?>