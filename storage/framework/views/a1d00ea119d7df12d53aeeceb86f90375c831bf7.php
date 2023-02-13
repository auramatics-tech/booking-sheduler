
<?php $__env->startSection('css'); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.subscriptions')); ?>

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

                <?php echo e(__('dash.list')); ?> <?php echo e(__('dash.subscriptions')); ?>

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
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add subscriptions')): ?>
                        <a class="btn btn-primary btn-sm" href="<?php echo e(route('subscriptions.create')); ?>">
                            <?php echo e(__('dash.add')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">


                    <?php if(auth()->user()->hasRole('Student')): ?>
                        <div class="main-profile-overview">

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
                                                <span class="tag tag-green d-flex"><?php echo e($subscription->status); ?></span>
                                            <?php else: ?>
                                                <span class="tag tag-red d-flex"><?php echo e($subscription->status); ?></span>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-solid-danger mg-b-0" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span></button>
                            <?php echo e(__('dash.subInfo')); ?>

                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-10p border-bottom-0">UID</th>
                                <th class="wd-15p border-bottom-0"><?php echo e(__('dash.name')); ?> </th>
                                <th class="wd-15p border-bottom-0"><?php echo e(__('dash.student')); ?> </th>
                                <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.start')); ?></th>
                                <th class="wd-15p border-bottom-0"> <?php echo e(__('dash.end')); ?></th>
                                <th class="wd-10p border-bottom-0"><?php echo e(__('dash.action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($subscription->UID); ?></td>
                                    <td><?php echo e($subscription->name); ?></td>

                                    <td><?php echo e(App\User::find($subscription->student_id)->name); ?></td>
                                    <td><?php echo e($subscription->start); ?></td>
                                    <td><?php echo e($subscription->end); ?></td>



                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="<?php echo e(route('subscriptions.show', $subscription->id)); ?>">
                                            <?php echo e(__('dash.show')); ?>

                                        </a>
                                        

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete subscriptions')): ?>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="<?php echo e($subscription->id); ?>"
                                                data-username="<?php echo e($subscription->title); ?>" data-toggle="modal"
                                                href="#modaldemo8"><i class="las la-trash"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\booking-sheduler\resources\views/dashboard/subscriptions/index.blade.php ENDPATH**/ ?>