
<?php $__env->startSection('css'); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.teachers')); ?>

<?php $__env->stopSection(); ?>

<!-- Internal Data table css -->

<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
<!--Internal   Notify -->
<link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> <?php echo e(__('dash.dash')); ?>

            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/

                <?php echo e(__('dash.list')); ?> <?php echo e(__('dash.teachers')); ?>

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
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add teachers')): ?>
                        <a class="btn btn-primary btn-sm" href="<?php echo e(route('teachers.create')); ?>">
                            <?php echo e(__('dash.add')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="text-left table table-hover" id="example1" data-page-length='50'
                        style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0"><?php echo e(__('dash.username')); ?> </th>
                                <th class="wd-15p border-bottom-0"><?php echo e(__('dash.name')); ?> </th>
                                <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.name_en')); ?></th>
                                <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.email')); ?></th>
                                <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.phone')); ?></th>
                                <th class="wd-15p border-bottom-0"> <?php echo e(__('dash.status')); ?></th>
                                <th class="wd-10p border-bottom-0"><?php echo e(__('dash.action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($user->username); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->profile->name_en ?? '-----'); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->profile->phone ?? '-----'); ?></td>
                                    <td>

                                        <input type="checkbox" data-id="<?php echo e($user->id); ?>" name="status"
                                            class="js-switch" <?php echo e($user->status == 'active' ? 'checked' : ''); ?>>


                                        
                                    </td>


                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit teachers')): ?>
                                            <a href="<?php echo e(route('teachers.edit', $user->id)); ?>" class="btn btn-sm btn-info"
                                                title="edit"><i class="las la-pen"></i></a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete teachers')): ?>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-user_id="<?php echo e($user->id); ?>" data-username="<?php echo e($user->name); ?>"
                                                data-toggle="modal" href="#modaldemo8" title="??????"><i
                                                    class="las la-trash"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
                        <?php echo e(__('dash.deleteUser')); ?>

                    </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="<?php echo e(route('teachers.destroy', 'test')); ?>" method="post">
                    <?php echo e(method_field('delete')); ?>

                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                        <p>
                            <?php echo e(__('dash.alretDelete')); ?>

                        </p><br>
                        <input type="hidden" name="user_id" id="user_id" value="">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>
    .toast.toast-warning {
        background: #fff !important;
        border: 2px solid #fff !important;
        color: #000 !important;
    }
</style>
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });

    $(document).ready(function() {
        $('.js-switch').change(function() {
            let status = $(this).prop('checked') === true ? 'active' : 'notActive';
            let authorId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '<?php echo e(route('author.update.status')); ?>',
                data: {
                    'status': status,
                    'author_id': authorId
                },
                success: function(data) {
                    console.log(data.message);
                    toastr.options.closeButton = true;
                    // toastr.options.closeMethod = 'fadeOut';
                    // toastr.options.closeDuration = 100;
                    toastr.warning(data.message);
                }
            });
        });
    });
</script>
<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-7.4.30\htdocs\xdenglish\resources\views/dashboard/teachers/index.blade.php ENDPATH**/ ?>