
<?php $__env->startSection('title'); ?>
Booking Calendar
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<style>
    .modal-backdrop.show {
    opacity: 0.1 !important;
}
.daydrop_down .dropdown-menu {
padding: 1rem;
min-width:230px;
}
.select2.select2-container.select2-container--default{
    width: 100% !important;
}
.select2-container--default .select2-selection--multiple{
    border: 1px solid #b9b9af !important;
    padding: 10px !important;
    background-color: #fff !important;
    border-radius: 2px !important;
    min-height: 40px !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
    padding-right: 20px !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    top: 1px !important;
    right: 0px !important;
    left: unset !important;
    color: #fff !important;
    opacity: 1 !important;
    border-right: 0px !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
    background: transparent !important;
}
</style>
    <link href="<?php echo e(URL::asset('assets/css/booking.css')); ?>" rel="stylesheet" />
    <link href="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css?v=1675835876" rel="stylesheet" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> <?php echo e(__('dash.dash')); ?>

                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Booking Calendar
                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="bg-light-gray">
    <div class="">
        <div class="panel materials-panel mt-8">
            <div class="d-flex">
            <ul class="text-lg px-4 tabs">
                <li><span class="tab-item get_slots" data-value="midnight" aria-selected="true">0:00 - 6:00</span></li>
                <li><span class="tab-item get_slots" data-value="morning" aria-selected="false">6:00 - 12:00</span></li>
                <li><span class="tab-item get_slots" data-value="afternoon" aria-selected="false">12:00 - 18:00</span></li>
                <li><span class="tab-item get_slots" data-value="evening" aria-selected="false">18:00 - 24:00</span></li>
            </ul>
            <ul class="mb-0 d-flex align-items-center pr-4">
                <li> <div class="dropdown daydrop_down">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                        Day
                    </button>
                    <div class="dropdown-menu">
                      <form action="">
                            <div class="form-group">
                                <label for="">Day Clone From:</label>
                                <select name="" id="clone_form" class="w-100">
                                    <option value="">Select Day</option>
                                    <?php $__currentLoopData = $period; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(date('Y-m-d',strtotime($date))); ?>"><?php echo e(date('l', strtotime($date))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Day Clone To:</label>
                                <select name="" id="clone_to" class="w-100" multiple>
                                    <option value="">Select Day</option>
                                    <?php $__currentLoopData = $period; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(date('Y-m-d',strtotime($date))); ?>"><?php echo e(date('l', strtotime($date))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-secondary btn-sm" id="dayClone">Submit</button>
                      </form>
                    </div>
                  </div>
                </li>
                <li>
                    <div class="dropdown daydrop_down">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle mx-3" data-toggle="dropdown">
                            Week
                        </button>
                        <div class="dropdown-menu">
                          <form action="">
                                <div class="form-group">
                                    <label for="">Day Clone From:</label>
                                    <select name="" id="clone_form1" class="w-100">
                                        <option value="">Select Day</option>
                                        <?php $__currentLoopData = $period; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(date('Y-m-d',strtotime($date))); ?>"><?php echo e(date('l', strtotime($date))); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">To Complete Week</label>
                                    <select name="clone_all[]" id="clone_all" class="w-100 d-none" multiple>
                                        <?php $__currentLoopData = $period; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(date('Y-m-d',strtotime($date))); ?>" selected><?php echo e(date('l', strtotime($date))); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-secondary btn-sm" id="weekClone">Submit</button>
                          </form>
                    </div>
                </li>
                <li>
                    <div class="dropdown daydrop_down">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                        Month
                    </button>
                    <div class="dropdown-menu">
                      <form action="">
                            <div class="form-group">
                                <label for="">Day Clone From:</label>
                                <select name="" id="clone_form2" class="w-100">
                                    <option value="">Select Day</option>
                                    <?php $__currentLoopData = $period; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(date('Y-m-d',strtotime($date))); ?>"><?php echo e(date('l', strtotime($date))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-secondary btn-sm" id="monthClone">Submit</button>
                        </form>
                    </div>
                 </li>
            </ul>
            </div>
            <div>
                <div class="ant-card ant-card-bordered">
                    <div class="ant-card-body pb-0">
                        <div class="calendar-content time-based">
                            <div>
                                <div class="cal week-scroll">
                                    <div class="cal-container">
                                        <span class="text-success" id="slot_msg"></span>
                                        <table class="timeslot-table" cellpadding="0" id="timeslot-table">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="dayModal" tabindex="-1" aria-labelledby="dayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dayModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var defaultSlot = "midnight";
            get_slots(defaultSlot) 

            $('.get_slots').on('click', function() {
                    $(".get_slots").attr("aria-selected" ,"false");
                    $(this).attr("aria-selected" ,"true"); 
                     var defaultSlot = $(this).attr('data-value'); 
                     get_slots(defaultSlot)     
            });
        });
        function get_slots(defaultSlot){
             $.ajax({
                url: "<?php echo e(url('dashboard/get-slots')); ?>",
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'slot=' + defaultSlot,
                success: function(data) {
                $(".timeslot-table").html(data);
                $(".timeslot-table").html(data);
                }
            });
        }
        $(document).on('click','.upper' ,function() { 
            var value = $(this).attr('data-date');
            var value1 = $(this).attr('data-time');
            var time = $('#time').val();
            $(this).addClass('on')
            $(this).html('A')
            $('#slot_msg').html('');
            if(time)
                $.ajax({
                url: "<?php echo e(url('dashboard/save-slots')); ?>",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{'start': value, 'time': value1 },
                success: function(data) {
                    if(data.status == 1){
                        $('#slot_msg').removeClass('text-danger')
                        $('#slot_msg').addClass('text-success')
                    }else{
                        $('#slot_msg').removeClass('text-success')
                        $('#slot_msg').addClass('text-danger')
                    }
                   $('#slot_msg').html(data.msg)
                }
            });
        });

            const first = document.getElementById("clone_form");
            const second = document.getElementById("clone_to");

            first.addEventListener("change", function() {
            const selectedOption = this.value;
            const disabled_option = second.querySelector(`option[disabled]`);
            if(disabled_option){
                disabled_option.disabled = false;
            }
            const secondOption = second.querySelector(`option[value="${selectedOption}"]`);
            if (selectedOption && secondOption) {
                secondOption.disabled = true;
            }
            });

        $(document).on('click','#dayClone' ,function() {
            var clone_form = $("#clone_form").val();
            var clone_to = $("#clone_to").val();
            // var timeArr = [];
            // $("#time:checked").each(function() {
            //         timeArr.push($(this).val());
            //     });
            // if (timeArr.length <= 0) {
            //     $('#slot_msg').removeClass('text-success')
            //     $('#slot_msg').addClass('text-danger')
            //     $('#slot_msg').html('Please check at least one checkbox');
            //     return false;
            // }else{
                get_week_slots(clone_form, clone_to) 
            // } 
        });
        $(document).on('click','#weekClone' ,function() { 
            var clone_form = $("#clone_form1").val();
            var clone_to = $("#clone_all").val();
            get_week_slots(clone_form, clone_to) 
         });
        $(document).on('click','#monthClone' ,function() { 
            var clone_form = $("#clone_form2").val();
            var clone_to="month";
            get_week_slots(clone_form, clone_to) 
         });
         function get_week_slots(clone_form, clone_to){
            $.ajax({
                url: "<?php echo e(url('dashboard/day-clone')); ?>",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{'clone_form': clone_form, 'clone_to': clone_to },
                success: function(data) {
                    if(data.status == 1){
                        $('#slot_msg').removeClass('text-danger')
                        $('#slot_msg').addClass('text-success')
                    }else{
                        $('#slot_msg').removeClass('text-success')
                        $('#slot_msg').addClass('text-danger')
                    }
                   $('#slot_msg').html(data.msg)
                   history.go(0);
                }
            });
         }
    </script>
<script src="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js?v=1675835876"></script>
<script>
    $("#clone_to").select2();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-7.4.30\htdocs\xdenglish\resources\views/dashboard/booking_calender/index.blade.php ENDPATH**/ ?>