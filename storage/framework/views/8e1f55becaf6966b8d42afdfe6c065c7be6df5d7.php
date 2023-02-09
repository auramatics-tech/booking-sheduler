
<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.AvailableTime')); ?>

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
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> <?php echo e(__('dash.dash')); ?>

                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/

                    <?php echo e(__('dash.list')); ?> <?php echo e(__('dash.AvailableTime')); ?>

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
                        <?php if(Auth()->user()->hasRole(['Admin', 'Teacher'])): ?>
                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('available-times.create')); ?>">
                                <?php echo e(__('dash.add')); ?></a>
                            <a target="_blank" class="btn btn-primary btn-sm" href="<?php echo e(route('teacher.calendar')); ?>">
                                <?php echo e(__('dash.calendar')); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 mg-t-20 mg-lg-t-0 mt-2">
                        <p>
                            Please select a teacher to show Available Time
                        </p>
                        <form method="GET" action="<?php echo e(route('available-times.index')); ?>">
                            <select class="form-control select2" name="teacher" onchange="this.form.submit()">
                                <option label="Choose one">
                                </option>
                                <?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($t->id); ?>">
                                        <?php echo e($t->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" id="check_all"></td>
                                    <th class="wd-10p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0"><?php echo e(__('dash.time')); ?> </th>
                                    <th class="wd-15p border-bottom-0"><?php echo e(__('dash.teachers')); ?> </th>
                                    <th class="wd-15p border-bottom-0"><?php echo e(__('dash.student')); ?> </th>
                                    <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.start')); ?></th>
                                    <th class="wd-15p border-bottom-0"> <?php echo e(__('dash.end')); ?></th>
                                    <th class="wd-10p border-bottom-0"><?php echo e(__('dash.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkbox" data-id="<?php echo e($t->id); ?>"></td>
                                        <td><?php echo e(++$i); ?></td>
                                        <td><?php echo e($t->time); ?></td>
                                        <td><?php echo e($t->user->name ?? '---'); ?></td>
                                        <td><?php echo e($t->student->name ?? '---'); ?></td>
                                        <td><?php echo e($t->start); ?></td>
                                        <td><?php echo e($t->end); ?></td>



                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="<?php echo e(route('available-times.show', $t->id)); ?>">
                                                <?php echo e(__('dash.show')); ?>

                                            </a>
                                            <?php if(Auth()->user()->hasRole(['Admin', 'Teacher'])): ?>
                                                <a href="<?php echo e(route('available-times.edit', $t->id)); ?>"
                                                    class="btn btn-sm btn-info" title="edit"><i
                                                        class="las la-pen"></i></a>

                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                    data-id="<?php echo e($t->id); ?>" data-time="<?php echo e($t->time); ?>"
                                                    data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                        class="las la-trash"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="8"><button class="btn btn-danger delete-all">Delete All</button>
                                    </td>
                                </tr>
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
                            <?php echo e(__('dash.delete')); ?> </h6><button aria-label="Close" class="close" data-dismiss="modal"
                            type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="<?php echo e(route('available-times.destroy', 'test')); ?>" method="post">
                        <?php echo e(method_field('delete')); ?>

                        <?php echo e(csrf_field()); ?>

                        <div class="modal-body">
                            <p><?php echo e(__('dash.alretDelete')); ?></p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="time" id="time" type="text" readonly>
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
            var time = button.data('time')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #time').val(time);
        })
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#check_all').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });
            //إختيار الجميع
            $('.checkbox').on('click', function() {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#check_all').prop('checked', true);
                } else {
                    $('#check_all').prop('checked', false);
                }
            });
            //إختيار عنصر معين
            $('.delete-all').on('click', function(e) {
                var idsArr = [];
                $(".checkbox:checked").each(function() {
                    idsArr.push($(this).attr('data-id'));
                });
                if (idsArr.length <= 0) {
                    //عند الضغط على زر الحذف - التحقق اذا كان المستخدم قد اختار اي صف للحذف
                    alert("Please select atleast one record to delete.");
                } else {
                    //رسالة تأكيد للحذف
                    if (confirm("Are you sure, you want to delete the selected categories?")) {
                        var strIds = idsArr.join(",");
                        $.ajax({
                            url: "<?php echo e(route('delete-multiple-category')); ?>",
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + strIds,
                            success: function(data) {
                                if (data['status'] == true) {
                                    $(".checkbox:checked").each(function() {
                                        $(this).parents("tr")
                                            .remove(); //حذف الصف بعد اتمام الحذف من قاعدة البيانات
                                    });
                                    //رسالة toast للحذف
                                    toastr.options.closeButton = true;
                                    toastr.options.closeMethod = 'fadeOut';
                                    toastr.options.closeDuration = 100;
                                    toastr.success('Deleted Successfully');
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                    }
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-7.4.30\htdocs\xdenglish\resources\views/dashboard/AvailableTime/index.blade.php ENDPATH**/ ?>