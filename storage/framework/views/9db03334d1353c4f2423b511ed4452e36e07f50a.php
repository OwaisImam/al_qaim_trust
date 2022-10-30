<?php $__env->startSection('page-title'); ?>
    <?php if(\Auth::user()->type == 'super admin'): ?>
        <?php echo e(__('Manage Centers')); ?>

    <?php else: ?>
        <?php echo e(__('Manage Users')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <?php if(\Auth::user()->type == 'super admin'): ?>
        <li class="breadcrumb-item"><?php echo e(__('Centers')); ?></li>
    <?php else: ?>
        <li class="breadcrumb-item"><?php echo e(__('Users')); ?></li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create User')): ?>
        <?php if(\Auth::user()->type == 'super admin'): ?>
            <a href="#" data-url="<?php echo e(route('user.create')); ?>" data-ajax-popup="true"
                data-title="<?php echo e(__('Create New Center')); ?>" data-size="md" data-bs-toggle="tooltip" title=""
                class="btn btn-sm btn-primary" data-bs-original-title="<?php echo e(__('Create')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        <?php else: ?>
            <a href="#" data-url="<?php echo e(route('user.create')); ?>" data-ajax-popup="true"
                data-title="<?php echo e(__('Create New User')); ?>" data-bs-toggle="tooltip" title="" class="btn btn-sm btn-primary"
                data-bs-original-title="<?php echo e(__('Create')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php
$profile = asset(Storage::url('uploads/avatar/'));
?>
<?php $__env->startSection('content'); ?>
    <?php if(\Auth::user()->type == 'super admin'): ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-3">
                <div class="card  text-center">
                    <div class="card-header border-0 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">

                                <div class="badge p-2 px-3 rounded bg-primary">center</div>
                            </h6>
                        </div>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item" data-url="<?php echo e(route('user.edit', $user->id)); ?>"
                                        data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Update User')); ?>"><i
                                            class="ti ti-edit "></i><span
                                            class="ms-2"><?php echo e(__('Edit')); ?></span></a>

                                    <a href="#" class="dropdown-item" data-ajax-popup="true" data-size="md"
                                        data-title="<?php echo e(__('Change Password')); ?>"
                                        data-url="<?php echo e(route('user.reset', \Crypt::encrypt($user->id))); ?>"><i
                                            class="ti ti-key"></i>
                                        <span class="ms-1"><?php echo e(__('Reset Password')); ?></span></a>

                                    <a href="#" class="bs-pass-para dropdown-item"
                                        data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                        data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                        data-confirm-yes="delete-form-<?php echo e($user->id); ?>" title="<?php echo e(__('Delete')); ?>"
                                        data-bs-toggle="tooltip" data-bs-placement="top"><i class="ti ti-trash"></i><span
                                            class="ms-2"><?php echo e(__('Delete')); ?></span></a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id], 'id' => 'delete-form-' . $user->id]); ?>

                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="avatar">
                            <img src="<?php echo e(!empty($user->avatar) ? asset(Storage::url('uploads/avatar/' . $user->avatar)) : asset(Storage::url('uploads/avatar/avatar.png'))); ?>"
                                class="rounded-circle" style="width: 10%">
                        </div>
                        <h4 class="mt-2"><?php echo e($user->name); ?></h4>
                        <small><?php echo e($user->email); ?></small>
                        <?php if(\Auth::user()->type == 'super admin'): ?>
                            <div class=" mb-0 mt-3">
                                <div class=" p-3">
                                    <div class="row">










                                        <!--  <div class="col-6 <?php echo e(Auth::user()->type == 'admin' ? 'text-end' : 'text-start'); ?>  ">
                                                                            <h6 class="mb-0 px-3"><?php echo e(__('Plan Expired : ')); ?> <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date) : __('Unlimited')); ?></h6>
                                                                        </div> -->
                                        <div class="col-6 text-start mt-4">
                                            <h6 class="mb-0 px-3">6</h6>

                                            <p class="text-muted text-sm mb-0"><?php echo e(__('Users')); ?></p>
                                        </div>
                                        <div class="col-6 text-end mt-4">


                                        </div>
                                    </div>
                                </div>
                            </div>






                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="#" class="btn-addnew-project my-4 " data-ajax-popup="true" data-url="<?php echo e(route('user.create')); ?>"
                data-title="<?php echo e(__('Create New Center')); ?>" data-bs-toggle="tooltip" title=""
                class="btn btn-sm btn-primary" data-bs-original-title="<?php echo e(__('Create')); ?>">
                <div class="bg-primary proj-add-icon my-4">
                    <i class="ti ti-plus"></i>
                </div>
                <h6 class="mt-4 mb-2"><?php echo e(__('New Center')); ?></h6>
                <p class="text-muted text-center"><?php echo e(__('Click here to add new center')); ?></p>
            </a>
        </div>
    <?php else: ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-3">
                <div class="card  text-center">
                    <div class="card-header border-0 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                <div class="badge p-2 px-3 rounded bg-primary"><?php echo e(ucfirst($user->type)); ?></div>
                            </h6>
                        </div>

                        <?php if(Gate::check('Edit User') || Gate::check('Delete User')): ?>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit User')): ?>
                                            <a href="#" class="dropdown-item" data-url="<?php echo e(route('user.edit', $user->id)); ?>"
                                                data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Update User')); ?>"><i
                                                    class="ti ti-edit "></i><span
                                                    class="ms-2"><?php echo e(__('Edit')); ?></span></a>
                                        <?php endif; ?>



                                        <a href="#" class="dropdown-item" data-ajax-popup="true" data-size="md"
                                            data-title="<?php echo e(__('Change Password')); ?>"
                                            data-url="<?php echo e(route('user.reset', \Crypt::encrypt($user->id))); ?>"><i
                                                class="ti ti-key"></i>
                                            <span class="ms-1"><?php echo e(__('Reset Password')); ?></span></a>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id], 'id' => 'delete-form-' . $user->id]); ?>

                                            <a href="#" class="bs-pass-para dropdown-item"
                                                data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                data-confirm-yes="delete-form-<?php echo e($user->id); ?>"
                                                title="<?php echo e(__('Delete')); ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="top"><i class="ti ti-trash"></i><span
                                                    class="ms-2"><?php echo e(__('Delete')); ?></span></a>
                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="card-body">
                        <div class="avatar">
                            <img src="<?php echo e(!empty($user->avatar) ? asset(Storage::url('uploads/avatar/' . $user->avatar)) : asset(Storage::url('uploads/avatar/avatar.png'))); ?>"
                                class="rounded-circle" style="width: 30%">
                        </div>
                        <h4 class="mt-2 text-primary"><?php echo e($user->name); ?></h4>
                        <small class=""><?php echo e($user->email); ?></small>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="#" class="btn-addnew-project " data-ajax-popup="true" data-url="<?php echo e(route('user.create')); ?>"
                data-title="<?php echo e(__('Create New User')); ?>" data-bs-toggle="tooltip" title="" class="btn btn-sm btn-primary"
                data-bs-original-title="<?php echo e(__('Create')); ?>">
                <div class="bg-primary proj-add-icon">
                    <i class="ti ti-plus"></i>
                </div>
                <h6 class="mt-4 mb-2"><?php echo e(__('New User')); ?></h6>
                <p class="text-muted text-center"><?php echo e(__('Click here to add new user')); ?></p>
            </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/owaisimam/PhpStormProjects/al_qaim_trust/resources/views/user/index.blade.php ENDPATH**/ ?>