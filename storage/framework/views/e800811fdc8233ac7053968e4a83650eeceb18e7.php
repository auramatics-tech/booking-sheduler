

<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.notifications')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!-- Internal Data table css -->

    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-statistics h-100 mt-5">
        <div class="card-body">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('dash.notifications')); ?> </h3>


                    </div>
                    <div class="card-body">

                        <?php if(session()->has('delete')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(\session()->get('delete')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>


                        <?php if(auth()->user()->hasRole('Admin')): ?>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CreateNotaction">
                                <?php echo e(__('dash.add')); ?>

                            </button>
                        <?php endif; ?>


                        <div class="modal fade" id="CreateNotaction" tabindex="-1" role="dialog" style="display: none;"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title" id="exampleModalLabel">
                                            <div class="mb-30">
                                                <h6> Send Notafcation </h6>

                                            </div>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <form action="<?php echo e(route('notifications.store')); ?>" method="post">
                                                <?php echo csrf_field(); ?>


                                                <div class="form-group">
                                                    <label for="title">User </label>
                                                    <select class="custom-select my-1 mr-sm-2" id="user_id" name="user_id">
                                                        <option selected=""> Choese User ....</option>
                                                        <option value="0"> All Users </option>
                                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                </div>


                                                <div class="form-group">
                                                    <label for="title">title </label>
                                                    <input type="text" class="form-control" name="title" id="title"
                                                        aria-describedby="title" placeholder="title ">

                                                </div>
                                                <div class="form-group">
                                                    <label for="message">Message</label>
                                                    <textarea rows="10" class="form-control" name="body" id="body" placeholder="message">

                                                    </textarea>
                                                </div>


                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> <?php echo e(__('dash.user')); ?> </th>
                                    <th> <?php echo e(__('dash.title')); ?> </th>
                                    <th> <?php echo e(__('dash.message')); ?> </th>
                                    <th> <?php echo e(__('dash.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e(App\User::find($notification->data['user_id'])->name); ?></td>
                                        <td><?php echo e($notification->data['title']); ?></td>
                                        <td><?php echo e($notification->data['body']); ?></td>
                                        <td>
                                            
                                            <?php if(auth()->user()->hasRole('Admin')): ?>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete_post<?php echo e($notification->id); ?>">
                                                    <i style=" font-size: 12px !important;" class="fa fa-trash"></i>
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                        <?php echo $__env->make('dashboard.notifications.destroy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        
                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    </div>
    </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\booking-sheduler\resources\views/dashboard/notifications/index.blade.php ENDPATH**/ ?>