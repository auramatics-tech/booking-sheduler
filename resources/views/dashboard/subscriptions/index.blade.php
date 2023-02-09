@extends('layouts.master')
@section('css')

@section('title')
    {{ __('dash.subscriptions') }}
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

                {{ __('dash.list') }} {{ __('dash.subscriptions') }}
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
                    @can('add subscriptions')
                        <a class="btn btn-primary btn-sm" href="{{ route('subscriptions.create') }}">
                            {{ __('dash.add') }}</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">


                    @if (auth()->user()->hasRole('Student'))
                        <div class="main-profile-overview">

                            <label class="main-content-label tx-13 mg-b-20">

                                {{ __('dash.mySubscription') }}
                            </label>
                            @if (isset($subscription))

                                <div class="main-profile-social-list">

                                    <div class="media">
                                        <div class="media-icon bg-primary-transparent text-primary">
                                            <i style="margin: auto !important;" class="fas fa-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>주문번호: </span>
                                            {{ $subscription->UID }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-primary-transparent text-primary">
                                            <i style="margin: auto !important;" class="fas fa-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>수강권 :: </span>
                                            {{ $subscription->name }}
                                            </a>
                                        </div>
                                    </div>


                                    <div class="media">
                                        <div class="media-icon bg-primary-transparent text-primary">
                                            <i style="margin: auto !important;" class="fas fa-calendar-day"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>수강 시작일: </span>
                                            {{ $subscription->start }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-success-transparent text-success">
                                            <i style="margin: auto !important;" class="fas fa-calendar-day"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>수강 종료일 : </span>
                                            {{ $subscription->end }}
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-info-transparent text-info">
                                            <i class="icon ion-logo-linkedin"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>수강 요일 : </span>
                                            <div class="d-flex">
                                                @foreach ($subscription->day_lesson as $day)
                                                    <span class="tag mr-2"> {{ $day }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-icon bg-danger-transparent text-danger">
                                            <i class="icon ion-md-link"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>상태</span>

                                            @if ($subscription->status == 'active')
                                                <span class="tag tag-green d-flex">{{ $subscription->status }}</span>
                                            @else
                                                <span class="tag tag-red d-flex">{{ $subscription->status }}</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                        </div>
                    @else
                        <div class="alert alert-solid-danger mg-b-0" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span></button>
                            {{ __('dash.subInfo') }}
                        </div>
                    @endif
                @else
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-10p border-bottom-0">UID</th>
                                <th class="wd-15p border-bottom-0">{{ __('dash.name') }} </th>
                                <th class="wd-15p border-bottom-0">{{ __('dash.student') }} </th>
                                <th class="wd-20p border-bottom-0"> {{ __('dash.start') }}</th>
                                <th class="wd-15p border-bottom-0"> {{ __('dash.end') }}</th>
                                <th class="wd-10p border-bottom-0">{{ __('dash.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($data as $index => $subscription)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $subscription->UID }}</td>
                                    <td>{{ $subscription->name }}</td>

                                    <td>{{ App\User::find($subscription->student_id)->name }}</td>
                                    <td>{{ $subscription->start }}</td>
                                    <td>{{ $subscription->end }}</td>



                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('subscriptions.show', $subscription->id) }}">
                                            {{ __('dash.show') }}
                                        </a>
                                        {{-- @can('edit lessons')
                                            <a href="{{ route('subscriptions.edit', $subscription->id) }}"
                                                class="btn btn-sm btn-info" title="edit"><i class="las la-pen"></i></a>
                                        @endcan --}}

                                        @can('delete subscriptions')
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $subscription->id }}"
                                                data-username="{{ $subscription->title }}" data-toggle="modal"
                                                href="#modaldemo8"><i class="las la-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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
