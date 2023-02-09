  <!-- row opened -->
  <div class="row row-sm">
      <div class="col-xl-12">
          <div class="card">
              <div class="card-header pb-0">
                  <div class="col-sm-1 col-md-2">
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add lessons')): ?>
                          <a class="btn btn-primary btn-sm" href="<?php echo e(route('lessons.create')); ?>">
                              <?php echo e(__('dash.add')); ?></a>
                      <?php endif; ?>
                  </div>
              </div>
              <div class="card-body">
                  <div class="table-responsive hoverable-table">
                      <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                          <thead>
                              <tr>
                                  <th class="wd-10p border-bottom-0">#</th>
                                  
                                  <th class="wd-15p border-bottom-0"><?php echo e(__('dash.teachers')); ?> </th>
                                  <th class="wd-15p border-bottom-0"><?php echo e(__('dash.students')); ?> </th>
                                  <th class="wd-20p border-bottom-0"> <?php echo e(__('dash.start')); ?></th>
                                  <th class="wd-15p border-bottom-0"> <?php echo e(__('dash.end')); ?></th>
                                  <th class="wd-10p border-bottom-0"><?php echo e(__('dash.action')); ?></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td><?php echo e(++$i); ?></td>
                                      

                                      <td>
                                          <a class="modal-effect btn btn-outline-primary btn-sm"
                                              data-effect="effect-rotate-left" data-toggle="modal"
                                              href="#modalShow<?php echo e($user->id); ?>">
                                              <?php echo e($user->teacher->name ?? '---'); ?></a>

                                      </td>

                                      <td><?php echo e($user->student->name ?? '---'); ?></td>

                                      <td><?php echo e($user->start); ?></td>
                                      <td><?php echo e($user->end); ?></td>



                                      <td>
                                          <a class="btn btn-success btn-sm"
                                              href="<?php echo e(route('lessons.show', $user->id)); ?>">
                                              <?php echo e(__('dash.show')); ?>

                                          </a>
                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit lessons')): ?>
                                              <a href="<?php echo e(route('lessons.edit', $user->id)); ?>"
                                                  class="btn btn-sm btn-info" title="edit"><i class="las la-pen"></i></a>
                                          <?php endif; ?>

                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete lessons')): ?>
                                              <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                  data-id="<?php echo e($user->id); ?>" data-username="<?php echo e($user->title); ?>"
                                                  data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                      class="las la-trash"></i></a>
                                          <?php endif; ?>
                                      </td>
                                  </tr>



                                  <!-- Modal effects -->
                                  <div class="modal" id="modalShow<?php echo e($user->id); ?>">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content modal-content-demo">
                                              <div class="modal-header">
                                                  <h6 class="modal-title"> <?php echo e($user->teacher->name ?? '---'); ?>

                                                  </h6>
                                                  <button aria-label="Close" class="close" data-dismiss="modal"
                                                      type="button"><span aria-hidden="true">&times;</span></button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="listgroup-example ">
                                                      <ul class="list-group">
                                                          <li> <?php echo e(__('dash.name')); ?> :
                                                              <?php echo e($user->teacher->name ?? '---'); ?></li>
                                                          <li> <?php echo e(__('dash.email')); ?> :
                                                              <?php echo e($user->teacher->email ?? '---'); ?></li>
                                                          <li>Contact:
                                                              <ul class="list-style-disc">
                                                                  <li><?php echo e(__('dash.skype_id')); ?> :
                                                                      <?php echo e($user->teacher->profile->skype_id ?? '---'); ?>

                                                                  </li>
                                                                  <li><?php echo e(__('dash.zoom_url')); ?> :
                                                                      <?php echo e($user->teacher->profile->zoom_url ?? '---'); ?>

                                                                  </li>
                                                              </ul>
                                                          </li>

                                                          <li>
                                                              <span>수강 요일 : </span>
                                                              <ul class="list-style-disc">
                                                                  <?php if($user->teacher_avraible != null): ?>
                                                                      <?php $__currentLoopData = $user->teacher_avraible; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                          <li class="tag mb-1 mr-2">

                                                                            &nbsp;&nbsp;&nbsp;
                                                                             
                                                                            <?php echo e($user->student->name ?? '---'); ?> /
                                                                            <?php echo e(App\User::find($day['teacher_id'])->name ?? '---'); ?> :
                                                                            <?php echo e($day['day'] ?? "---"); ?> - <?php echo e($day['time'] ?? '---'); ?>

                                                                            
                                                                          </li>
                                                                          <br />
                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                  <?php endif; ?>
                                                              </ul>
                                                          </li>
                                                          <li>
                                                              <a target="_blank" class="btn btn-sm btn-danger"
                                                                  href="<?php echo e(url('/chatify')); ?>">Live
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
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                          <?php echo e(__('dash.delete')); ?> </h6><button aria-label="Close" class="close" data-dismiss="modal"
                          type="button"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <form action="<?php echo e(route('lessons.destroy', 'test')); ?>" method="post">
                      <?php echo e(method_field('delete')); ?>

                      <?php echo e(csrf_field()); ?>

                      <div class="modal-body">
                          <p><?php echo e(__('dash.alretDelete')); ?></p><br>
                          <input type="hidden" name="id" id="id" value="">
                          <input class="form-control" name="username" id="username" type="text" readonly>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary"
                              data-dismiss="modal"><?php echo e(__('dash.cancle')); ?></button>
                          <button type="submit" class="btn btn-danger"><?php echo e(__('dash.sure')); ?></button>
                      </div>
              </div>
              </form>
          </div>
      </div>
  </div>
<?php /**PATH D:\xampp-7.4.30\htdocs\xdenglish\resources\views/dashboard/lessons/type/student.blade.php ENDPATH**/ ?>