<?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(session()->has('Add')): ?>
        

        <script>
            window.onload = function() {
                notif({
                    msg: "<?php echo e(session()->get('Add')); ?>",
                    type: "success"
                })
            }
        </script>

    <?php endif; ?>

    <?php if(session()->has('delete')): ?>
        

        <script>
            window.onload = function() {
                notif({
                    msg: "<?php echo e(session()->get('delete')); ?>",
                    type: "success"
                })
            }
        </script>

    <?php endif; ?>

    <?php if(session()->has('edit')): ?>
        

        <script>
            window.onload = function() {
                notif({
                    msg: "<?php echo e(session()->get('edit')); ?>",
                    type: "success"
                })
            }
        </script>
    <?php endif; ?><?php /**PATH C:\xampp7.4\htdocs\booking-sheduler\resources\views/includes/error.blade.php ENDPATH**/ ?>