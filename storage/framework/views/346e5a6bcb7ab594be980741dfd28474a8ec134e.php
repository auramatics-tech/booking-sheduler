<?php if(session()->has('Add')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " <?php echo e(__('messages.success')); ?>",
                type: "success"
            });
        }
    </script>
<?php endif; ?>

<?php if(session()->has('edit')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " <?php echo e(__('messages.Update')); ?>",
                type: "success"
            });
        }
    </script>
<?php endif; ?>

<?php if(session()->has('delete')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " <?php echo e(__('messages.Delete')); ?>",
                type: "error"
            });
        }
    </script>
<?php endif; ?>
<?php /**PATH D:\xampp-7.4.30\htdocs\xdenglish\resources\views/layouts/messages.blade.php ENDPATH**/ ?>