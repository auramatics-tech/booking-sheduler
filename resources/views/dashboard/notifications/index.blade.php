@extends('layouts.master')

@section('title')
    {{ __('dash.notifications') }}
@endsection
@section('css')
    <!-- Internal Data table css -->

    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="card card-statistics h-100 mt-5">
        <div class="card-body">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('dash.notifications') }} </h3>


                    </div>
                    <div class="card-body">

                        @if (session()->has('delete'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ \session()->get('delete') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        @if (auth()->user()->hasRole('Admin'))
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#CreateNotaction">
                                {{ __('dash.add') }}
                            </button>
                        @endif


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
                                            <form action="{{ route('notifications.store') }}" method="post">
                                                @csrf


                                                <div class="form-group">
                                                    <label for="title">User </label>
                                                    <select class="custom-select my-1 mr-sm-2" id="user_id" name="user_id">
                                                        <option selected=""> Choese User ....</option>
                                                        <option value="0"> All Users </option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                            </option>
                                                        @endforeach
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
                                    <th> {{ __('dash.user') }} </th>
                                    <th> {{ __('dash.title') }} </th>
                                    <th> {{ __('dash.message') }} </th>
                                    <th> {{ __('dash.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $notification)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ App\User::find($notification->data['user_id'])->name }}</td>
                                        <td>{{ $notification->data['title'] }}</td>
                                        <td>{{ $notification->data['body'] }}</td>
                                        <td>
                                            {{-- <a href="{{ route('notifications.edit', $notification->id) }}"
                                                class="btn btn-primary btn-sm" role="button" aria-disabled="true">تعديل </a> --}}
                                            @if (auth()->user()->hasRole('Admin'))
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete_post{{ $notification->id }}">
                                                    <i style=" font-size: 12px !important;" class="fa fa-trash"></i>
                                                </button>
                                            @endif
                                        </td>
                                        @include('dashboard.notifications.destroy')
                                    </tr>
                                @endforeach
                        </table>
                        {{-- {{ $notifications->render() }} --}}
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
@endsection


@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

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
@endsection
