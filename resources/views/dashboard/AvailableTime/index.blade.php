@extends('layouts.master')
@section('title')
    {{ __('dash.AvailableTime') }}
@stop
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
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ __('dash.dash') }}
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/

                    {{ __('dash.list') }} {{ __('dash.AvailableTime') }}
                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')



    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-sm-1 col-md-2">
                        @if (Auth()->user()->hasRole(['Admin', 'Teacher']))
                            <a class="btn btn-primary btn-sm" href="{{ route('available-times.create') }}">
                                {{ __('dash.add') }}</a>
                            <a target="_blank" class="btn btn-primary btn-sm" href="{{ route('teacher.calendar') }}">
                                {{ __('dash.calendar') }}</a>
                        @endif
                    </div>
                    <div class="col-lg-4 mg-t-20 mg-lg-t-0 mt-2">
                        <p>
                            Please select a teacher to show Available Time
                        </p>
                        <form method="GET" action="{{ route('available-times.index') }}">
                            <select class="form-control select2" name="teacher" onchange="this.form.submit()">
                                <option label="Choose one">
                                </option>
                                @foreach ($teacher as $t)
                                    <option value="{{ $t->id }}">
                                        {{ $t->name }}
                                    </option>
                                @endforeach

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
                                    <th class="wd-15p border-bottom-0">{{ __('dash.time') }} </th>
                                    <th class="wd-15p border-bottom-0">{{ __('dash.teachers') }} </th>
                                    <th class="wd-15p border-bottom-0">{{ __('dash.student') }} </th>
                                    <th class="wd-20p border-bottom-0"> {{ __('dash.start') }}</th>
                                    <th class="wd-15p border-bottom-0"> {{ __('dash.end') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('dash.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $t)
                                    <tr>
                                        <td><input type="checkbox" class="checkbox" data-id="{{ $t->id }}"></td>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $t->time }}</td>
                                        <td>{{ $t->user->name ?? '---' }}</td>
                                        <td>{{ $t->student->name ?? '---' }}</td>
                                        <td>{{ $t->start }}</td>
                                        <td>{{ $t->end }}</td>



                                        <td>
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('available-times.show', $t->id) }}">
                                                {{ __('dash.show') }}
                                            </a>
                                            @if (Auth()->user()->hasRole(['Admin', 'Teacher']))
                                                <a href="{{ route('available-times.edit', $t->id) }}"
                                                    class="btn btn-sm btn-info" title="edit"><i
                                                        class="las la-pen"></i></a>

                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                    data-id="{{ $t->id }}" data-time="{{ $t->time }}"
                                                    data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                        class="las la-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
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
                            {{ __('dash.delete') }} </h6><button aria-label="Close" class="close" data-dismiss="modal"
                            type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('available-times.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{ __('dash.alretDelete') }}</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="time" id="time" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('dash.cancle') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('dash.sure') }}</button>
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
                            url: "{{ route('delete-multiple-category') }}",
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

@endsection
