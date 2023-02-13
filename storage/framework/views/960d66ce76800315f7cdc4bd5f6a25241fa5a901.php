
<?php $__env->startSection('css'); ?>
    <!-- Internal Nice-select css  -->
    <link href="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')); ?>" rel="stylesheet" />


    <!--Internal  Datetimepicker-slider css -->
    <link href="<?php echo e(URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')); ?>"
        rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/plugins/pickerjs/picker.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('dash.add')); ?> <?php echo e(__('dash.lessons')); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><?php echo e(__('dash.lessons')); ?>

                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    <?php echo e(__('dash.add')); ?>


                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">

            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Error</strong>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm"
                                href="<?php echo e(route('users.index')); ?>"><?php echo e(__('dash.back')); ?></a>
                        </div>
                    </div><br>
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                        action="<?php echo e(route('lessons.store', 'test')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                        <div class="">

                            <div class="row mg-b-20">


                                


                                



                            </div>

                        </div>

                        <div class="row mg-b-20">

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> <?php echo e(__('dash.start')); ?>: <span class="tx-danger">*</span></label>
                                <input id="datetimepickerstart" class="form-control form-control-sm mg-b-20" name="start"
                                    required="" type="text">

                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> <?php echo e(__('dash.end')); ?>: <span class="tx-danger">*</span></label>
                                <input id="datetimepickerend" class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="end" required="" type="text">
                            </div>

                            <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> <?php echo e(__('dash.students')); ?>: <span class="tx-danger">*</span></label>

                                <select name="students[]" multiple class="select2 form-control  mg-b-20">
                                    <option label="Choose one">
                                    </option>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($v->id); ?>"> <?php echo e($v->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>


                        <hr>

                        <div id="repeater" class="repeater">
                            <!-- Repeater Heading -->
                            
<button type="button" class="btn btn-main-primary  btn-sm" data-repeater-create type="button" >
                                    <i class="fa fa-copy"></i>
                                </button>
                         <div class="clearfix"></div>
                        <div data-repeater-list="teacher_avraible">
                            <div data-repeater-item  class="row row-sm mg-t-20 items" data-group="test">


                                <div class="item-content  parsley-input col-md-4" id="fnWrapper">
                                    <label><?php echo e(__('dash.teachers')); ?>

                                        : <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="teacher_avraible[teacher_id]">
                                        <option label="Choose one">
                                        </option>
                                        <?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($t->id == Auth()->user()->id): ?> selected <?php endif; ?>
                                                value="<?php echo e($t->id); ?>">
                                                <?php echo e($t->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                </div>

                                <div class="item-content parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label> <?php echo e(__('dash.teacher_avraible')); ?>: <span class="tx-danger">*</span></label>

                                    <select name="teacher_avraible[day]"  class="form-control  mg-b-20">
                                        <option label="Choose one">
                                        </option>
                                        

                                        <option value="monday">Monday</option>
                                        <option value="tuesday">Tuesday</option>
                                        <option value="wednesday">Wednesday</option>
                                        <option value="thursday">Thursday</option>
                                        <option value="friday">Friday </option>
                                        <option value="saturday">Saturday</option>
                                        <option value="sunday">Sunday</option>
                                    </select>
                                </div>

                                <div class="item-content parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label> <?php echo e(__('dash.timeLesson')); ?>: <span class="tx-danger">*</span></label>
                                    <input  class="timePickree21 form-control form-control-sm mg-b-20"
                                        data-parsley-class-handler="#lnWrapper" name="teacher_avraible[time]"
                                        required="" type="text">
                                        
                                            
                                        
                                </div>

                                <div class="col-md-2 m-auto">
                                <button type="button" class="btn btn-danger btn-sm" data-repeater-delete="">X</button>
                                
                                

                            </div>



                            </div>
                        </div>
                        </div>
                        

                        <div class="col-lg">
                            <label> <?php echo e(__('dash.description')); ?>: </span></label>

                            <textarea class="form-control" placeholder="description" name="description" rows="3"></textarea>
                        </div>




                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">
                                <?php echo e(__('dash.confirm')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


    <!-- Internal Nice-select js-->
    <script src="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')); ?>"></script>

    <!--Internal  Parsley.min js -->
    <script src="<?php echo e(URL::asset('assets/plugins/parsleyjs/parsley.min.js')); ?>"></script>
    <!-- Internal Form-validation js -->
    <script src="<?php echo e(URL::asset('assets/js/form-validation.js')); ?>"></script>


    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="<?php echo e(URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')); ?>"></script>

    <!-- Ionicons js -->
    <script src="<?php echo e(URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')); ?>"></script>

    <!--Internal  pickerjs js -->
    <script src="<?php echo e(URL::asset('assets/plugins/pickerjs/picker.min.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
  
<script type="text/javascript">
    $(document).ready(function () {
      $('.repeater').repeater({
        show: function () {
          $(this).slideDown();
        },
        hide: function (deleteElement) {
           if(confirm('Are you sure you want to delete this element?')) {
              $(this).slideUp(deleteElement);
           }
        },        
      });
    });
  </script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

  <script>
    $( function() {
      $( "#datetimepickerstart" ).datepicker();
      $( "#datetimepickerend" ).datepicker();

      $('.timePickree21').timepicker({
            autoclose: true , 
            interval: 5,
            // timeFormat: 'hh:mm i'

        });

    } );
    </script>

  <script>
        $(function() {
        //     $('#datetimepickerstart').datetimepicker({
        //     format: 'yyyy-mm-dd',
        //     autoclose: true
        // });

        // $('#datetimepickerend').datetimepicker({
        //     format: 'yyyy-mm-dd',
        //     autoclose: true
        // });

        // $('.timePickree21').timepicker({
        //     autoclose: true , 
        //     interval: 5,
        //     timeFormat: 'mm'

        // });


            $('.select22').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\booking-sheduler\resources\views/dashboard/lessons/create.blade.php ENDPATH**/ ?>