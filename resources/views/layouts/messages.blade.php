@if (session()->has('Add'))
    <script>
        window.onload = function() {
            notif({
                msg: " {{ __('messages.success') }}",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: " {{ __('messages.Update') }}",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: " {{ __('messages.Delete') }}",
                type: "error"
            });
        }
    </script>
@endif
