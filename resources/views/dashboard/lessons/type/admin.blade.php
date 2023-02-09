  <!-- row opened -->
  <div class="row row-sm">
      <div class="col-xl-12">
          <div class="card">
              <div class="card-header pb-0">
                  <div class="col-sm-1 col-md-2">
                      @can('add lessons')
                          <a class="btn btn-primary btn-sm" href="{{ route('lessons.create') }}">
                              {{ __('dash.add') }}</a>
                      @endcan
                  </div>
              </div>
              <div class="card-body">
                  <div class="table-responsive hoverable-table">
                      <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                          <thead>
                              <tr>
                                  <th class="wd-10p border-bottom-0">#</th>
                                  {{-- <th class="wd-15p border-bottom-0">{{ __('dash.title') }} </th> --}}
                                  <th class="wd-15p border-bottom-0">{{ __('dash.teachers') }} </th>
                                  <th class="wd-15p border-bottom-0">{{ __('dash.students') }} </th>
                                  <th class="wd-20p border-bottom-0"> {{ __('dash.start') }}</th>
                                  <th class="wd-15p border-bottom-0"> {{ __('dash.end') }}</th>
                                  <th class="wd-10p border-bottom-0">{{ __('dash.action') }}</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($data as $key => $user)
                                  <tr>
                                      <td>{{ ++$i }}</td>
                                      {{-- <td>{{ $user->title }}</td> --}}
                                      <td>{{ $user->teacher->name ?? '---' }}</td>
                                      <td>
                                          <a class="modal-effect btn btn-outline-primary btn-sm"
                                              data-effect="effect-rotate-left" data-toggle="modal"
                                              href="#modalShow{{ $user->id }}">
                                              {{ $user->student->name ?? '---' }}</a>

                                      </td>
                                      <td>{{ $user->start }}</td>
                                      <td>{{ $user->end }}</td>



                                      <td>
                                          <a class="btn btn-success btn-sm"
                                              href="{{ route('lessons.show', $user->id) }}">
                                              {{ __('dash.show') }}
                                          </a>
                                          @can('edit lessons')
                                              <a href="{{ route('lessons.edit', $user->id) }}"
                                                  class="btn btn-sm btn-info" title="edit"><i class="las la-pen"></i></a>
                                          @endcan

                                          @can('delete lessons')
                                              <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                  data-id="{{ $user->id }}" data-username="{{ $user->title }}"
                                                  data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                      class="las la-trash"></i></a>
                                          @endcan
                                      </td>
                                  </tr>



                                  <!-- Modal effects -->
                                  <div class="modal" id="modalShow{{ $user->id }}">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content modal-content-demo">
                                              <div class="modal-header">
                                                  <h6 class="modal-title"> {{ $user->student->name ?? '---' }}
                                                  </h6>
                                                  <button aria-label="Close" class="close" data-dismiss="modal"
                                                      type="button"><span aria-hidden="true">&times;</span></button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="listgroup-example ">
                                                      <ul class="list-group">
                                                          <li> {{ __('dash.name') }} :
                                                              {{ $user->student->name ?? '---' }}</li>
                                                          <li> {{ __('dash.email') }} :
                                                              {{ $user->student->email ?? '---' }}</li>
                                                          <li>Contact:
                                                              <ul class="list-style-disc">
                                                                  <li>{{ __('dash.skype_id') }} :
                                                                      {{ $user->student->profile->skype_id ?? '---' }}
                                                                  </li>
                                                                  <li>{{ __('dash.zoom_url') }} :
                                                                      {{ $user->student->profile->zoom_url ?? '---' }}
                                                                  </li>
                                                              </ul>
                                                          </li>

                                                          <li>
                                                              <span>수강 요일 : </span>
                                                              <ul class="list-style-disc">
                                                                  @if ($user->teacher_avraible != null)
                                                                      @foreach ($user->teacher_avraible as $day)
                                                                      {{-- {{  dd($day['day']) }} --}}
                                                                          <li class="tag mb-1">
                                                                             &nbsp;&nbsp;&nbsp;
                                                                             
                                                                              {{ $user->student->name ?? '---' }} /
                                                                            @isset($day['teacher_id'])
                                                                            {{ App\User::find($day['teacher_id'])->name ?? '---' }} :
                                                                            @endisset   
                                                                              {{  $day['day'] ?? "---" }} - {{ $day['time'] ?? '---' }}
                                                                              {{-- {{ \Carbon\Carbon::parse($user->start)->format('h:m a') }} --}}

                                                                          </li>
                                                                      @endforeach
                                                                  @endif
                                                              </ul>
                                                          </li>
                                                          <li>
                                                              <a target="_blank" class="btn btn-sm btn-danger"
                                                                  href="{{ url('/chatify') }}">Live
                                                                  Chat</a>
                                                          </li>
                                                      </ul>
                                                  </div>


                                              </div>
                                              <div class="modal-footer">

                                                  <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                      type="button">X</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- End Modal effects-->
                              @endforeach
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
                  <form action="{{ route('lessons.destroy', 'test') }}" method="post">
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
