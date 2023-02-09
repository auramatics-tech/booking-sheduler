@extends('layouts.master')
@section('css')

@section('title')
    {{ __('dash.paid') }}
@stop

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

                {{ __('dash.list') }} {{ __('dash.paid') }}
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

            <div class="card-body">



                <div class=" tab-menu-heading">
                    <div class="tabs-menu1">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs main-nav-line">
                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{{ __('dash.paid') }}</a>
                            </li>
                            <li><a href="#tab2" class="nav-link" data-toggle="tab">{{ __('dash.poinit') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 panel-body tabs-menu-body main-content-body-right border">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <div class="table-responsive hoverable-table">
                                <table class="table table-hover" id="example1" data-page-length='50'
                                    style=" text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0">{{ __('dash.name') }} </th>
                                            <th class="wd-20p border-bottom-0"> {{ __('dash.phone') }}</th>
                                            <th class="wd-20p border-bottom-0"> {{ __('dash.product') }}</th>
                                            <th class="wd-20p border-bottom-0"> {{ __('dash.data') }}</th>
                                            <th class="wd-15p border-bottom-0">{{ __('dash.price') }} </th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($data as $index => $dd)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ App\User::find($dd->user_id)->name ?? '--' }}</td>
                                                <td>{{ App\User::find($dd->user_id)->profile()->phone ?? '--' }}</td>
                                                <td>{{ App\Subscription::where('student_id', $dd->user_id)->first()->name }}
                                                </td>
                                                <td>{{ $dd->date }}</td>
                                                <td>{{ number_format($dd->price, 2, '.', ',') }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>


                        <div class="tab-pane" id="tab2">

                            <h4 class="alert alert-danger">
                                {{ __('dash.allp') }} : {{ Auth()->user()->currentPoints() }}
                            </h4>


                            <div class="table-responsive hoverable-table">
                                <table class="table table-hover" id="example1" data-page-length='50'
                                    style=" text-align: center;">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0">{{ __('dash.student') }} </th>
                                            <th class="wd-15p border-bottom-0">{{ __('dash.poinit') }} </th>
                                            <th class="wd-20p border-bottom-0"> {{ __('dash.message') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($transactions as $index => $ponit)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    {{ App\User::where('id', $ponit->pointable_id)->first()->name ?? '---' }}
                                                </td>
                                                <td>{{ $ponit->amount ?? '--' }}</td>

                                                <td>{{ $ponit->message }}</td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>


                        </div>

                    </div>
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
                <form action="{{ route('subscriptions.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{ __('dash.alretDelete') }}</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
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
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #username').val(username);
    })
</script>


@endsection
