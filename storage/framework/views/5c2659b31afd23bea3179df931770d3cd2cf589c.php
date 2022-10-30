<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function() {
            if ($('.gdpr_fulltime').is(':checked')) {

                $('.fulltime').show();
            } else {

                $('.fulltime').hide();
            }

            $('#gdpr_cookie').on('change', function() {
                if ($('.gdpr_fulltime').is(':checked')) {

                    $('.fulltime').show();
                } else {

                    $('.fulltime').hide();
                }
            });
        });

        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })

        $('.themes-color-change').on('click', function() {
            var color_val = $(this).data('value');
            $('.theme-color').prop('checked', false);
            $('.themes-color-change').removeClass('active_color');
            $(this).addClass('active_color');
            $(`input[value=${color_val}]`).prop('checked', true);

        });


    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Settings')); ?></li>
<?php $__env->stopSection(); ?>



<?php
$logo = asset(Storage::url('uploads/logo/'));
$lang = \App\Models\Utility::getValByName('default_language');
$color = isset($settings['theme_color']) ? $settings['theme_color'] : 'theme-4';
// $is_sidebar_transperent = isset($settings['is_sidebar_transperent']) ? $settings['is_sidebar_transperent'] : '';
// $dark_mode = isset($settings['dark_mode']) ? $settings['dark_mode'] : '';
$setting = App\Models\Utility::settings();

$SITE_RTL = $settings['SITE_RTL'];
if ($SITE_RTL == '') {
    $SITE_RTL == 'off';
}
?>





<?php $__env->startSection('content'); ?>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-3">
                <div class="card sticky-top">
                    <div class="list-group list-group-flush" id="useradd-sidenav">

                        <a href="#site-setting" id="site-setting-tab"
                            class="list-group-item list-group-item-action border-0"><?php echo e(__('Site Setting')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                        <a href="#email-setting" id="email-setting-tab"
                            class="list-group-item list-group-item-action border-0"><?php echo e(__('Email Setting')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>












                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="" id="site-setting">
                    <?php echo e(Form::model($settings, ['url' => 'settings', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Site Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5><?php echo e(__('Logo dark')); ?></h5>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class=" setting-card">
                                                        <div class="logo-content mt-4 setting-logo">
                                                            <img src="<?php echo e(asset(Storage::url('uploads/logo/logo-dark.png'))); ?>"
                                                                class="logo logo-sm" width="70"
                                                                style="filter: drop-shadow(2px 3px 7px #011c4b);">
                                                        </div>
                                                        <div class="choose-files mt-5">
                                                            <label for="logo">
                                                                <div class=" bg-primary logo_update"> <i
                                                                        class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                </div>
                                                                <input type="file" class="form-control file" name="logo"
                                                                    id="logo" data-filename="logo_update"
                                                                    accept=".jpeg,.jpg,.png" accept=".jpeg,.jpg,.png">
                                                            </label>
                                                        </div>


                                                        <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="row">
                                                                <span class="invalid-logo" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5><?php echo e(__('Logo Light')); ?></h5>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class=" setting-card">
                                                        <div class="logo-content mt-4  setting-logo">
                                                            <img src="<?php echo e(asset(Storage::url('uploads/logo/logo-light.png'))); ?>"
                                                                class="logo logo-sm img_setting" width="70"
                                                                style="filter: drop-shadow(2px 3px 7px #011c4b);">
                                                        </div>

                                                        <div class="choose-files mt-5">
                                                            <label for="logo_light">
                                                                <div class=" bg-primary logo_light_update"> <i
                                                                        class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                </div>
                                                                <input type="file" class="form-control file"
                                                                    name="logo_light" id="logo_light"
                                                                    data-filename="logo_light_update">
                                                            </label>
                                                        </div>

                                                        <?php $__errorArgs = ['logo_light'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="row">
                                                                <span class="invalid-logo_light" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5><?php echo e(__('Favicon')); ?></h5>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class=" setting-card">
                                                        <div class="logo-content mt-4 setting-logo ">
                                                            <img src="<?php echo e(asset(Storage::url('uploads/logo/favicon.png'))); ?>"
                                                                width="50px" class="logo logo-sm img_setting">
                                                        </div>
                                                        <div class="choose-files mt-5">
                                                                <label for="favicon_update">
                                                                    <div class=" bg-primary favicon_update"> <i
                                                                            class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                                    </div>
                                                                    <input type="file" class="form-control file"
                                                                        name="favicon" id="favicon_update"
                                                                        data-filename="favicon_update">
                                                                </label>
                                                        </div>
                                                        <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="row">
                                                                <span class="invalid-favicon" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                            </div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <?php echo e(Form::label('title_text', __('Title Text'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')])); ?>

                                            <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-title_text" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



                                        </div>
                                        <div class="form-group col-md-4">
                                            <?php echo e(Form::label('footer_text', __('Footer Text'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')])); ?>

                                            <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-footer_text" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <?php echo e(Form::label('default_language', __('Default Language'), ['class' => 'col-form-label'])); ?>

                                            <select name="default_language" id="default_language"
                                                class="form-control select2">
                                                <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($lang == $language): ?> selected <?php endif; ?>
                                                        value="<?php echo e($language); ?>"><?php echo e(Str::upper($language)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>
                                        <div class="row">
                                            <div class="col-3 ">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3">

                                                        <?php echo e(Form::label('display_landing_page', __('Landing Page Display'), ['class' => 'col-form-label'])); ?>


                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="display_landing_page" id="display_landing_page"
                                                                <?php echo e($settings['display_landing_page'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label mb-1"
                                                                for="display_landing_page"></label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 ">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3">
                                                        <?php echo e(Form::label('SITE_RTL', __('RTL'), ['class' => 'col-form-label'])); ?>

                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="SITE_RTL" id="SITE_RTL"
                                                                <?php echo e(Utility::getValByName('SITE_RTL') == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label mb-1" for="SITE_RTL"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3 ">
                                                <div class="col switch-width">
                                                    <div class="form-group ml-2 mr-3">
                                                        <?php echo e(Form::label('disable_signup_button', __('Signup'), ['class' => 'col-form-label'])); ?>

                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" data-toggle="switchbutton"
                                                                data-onstyle="primary" class=""
                                                                name="disable_signup_button" id="disable_signup_button"
                                                                <?php echo e($settings['disable_signup_button'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                            <label class="custom-control-label mb-1"
                                                                for="disable_signup_button"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-3">
                                                <div class="custom-control custom-switch p-0">
                                                    <div class="form-group ml-2 mr-3">
                                                        <label class="col-form-label"
                                                            for="gdpr_cookie"><?php echo e(__('GDPR Cookie')); ?></label><br>
                                                        <input type="checkbox"
                                                            class="form-check-input gdpr_fulltime gdpr_type"
                                                            data-toggle="switchbutton" data-onstyle="primary"
                                                            name="gdpr_cookie" id="gdpr_cookie"
                                                            <?php echo e(isset($settings['gdpr_cookie']) && $settings['gdpr_cookie'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <?php echo e(Form::label('cookie_text', __('GDPR Cookie Text'), ['class' => 'fulltime form-label'])); ?>

                                            <?php echo Form::textarea('cookie_text', isset($settings['cookie_text']) && $settings['cookie_text'] ? $settings['cookie_text'] : '', ['class' => 'form-control fulltime', 'style' => 'display: hidden;resize: none;', 'rows' => '2']); ?>

                                        </div>

                                        <h5 class="mt-3 mb-3"><?php echo e(__("Theme Customizer")); ?></h5>
                                        <div class="col-12">
                                            <div class="pct-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6 class="">
                                                            <i data-feather="credit-card"
                                                                class="me-2"></i><?php echo e(__('Primary color settings')); ?>

                                                        </h6>
                                                        <hr class="my-2" />

                                                        <div class="theme-color themes-color">
                                                            <a href="#!"
                                                                class="themes-color-change <?php echo e($color == 'theme-1' ? 'active_color' : ''); ?>"
                                                                data-value="theme-1"></a>
                                                            <input type="radio" class="theme_color d-none"
                                                                name="theme_color" value="theme-1"
                                                                <?php echo e($color == 'theme-1' ? 'checked' : ''); ?>>
                                                            <a href="#!"
                                                                class="themes-color-change <?php echo e($color == 'theme-2' ? 'active_color' : ''); ?>"
                                                                data-value="theme-2"></a>
                                                            <input type="radio" class="theme_color d-none"
                                                                name="theme_color" value="theme-2"
                                                                <?php echo e($color == 'theme-2' ? 'checked' : ''); ?>>
                                                            <a href="#!"
                                                                class="themes-color-change <?php echo e($color == 'theme-3' ? 'active_color' : ''); ?>"
                                                                data-value="theme-3"></a>
                                                            <input type="radio" class="theme_color d-none"
                                                                name="theme_color" value="theme-3"
                                                                <?php echo e($color == 'theme-3' ? 'checked' : ''); ?>>
                                                            <a href="#!"
                                                                class="themes-color-change <?php echo e($color == 'theme-4' ? 'active_color' : ''); ?>"
                                                                data-value="theme-4"></a>
                                                            <input type="radio" class="theme_color d-none"
                                                                name="theme_color" value="theme-4"
                                                                <?php echo e($color == 'theme-4' ? 'checked' : ''); ?>>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <h6 class=" ">
                                                            <i data-feather="layout"
                                                                class="me-2"></i><?php echo e(__('Sidebar settings')); ?>

                                                        </h6>
                                                        <hr class="my-2 " />
                                                        <div class="form-check form-switch ">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="cust_theme_bg" name="cust_theme_bg"
                                                                <?php if($settings['cust_theme_bg'] == 'on'): ?> checked <?php endif; ?> />

                                                            <label class="form-check-label f-w-600 pl-1"
                                                                for="cust_theme_bg"><?php echo e(__('Transparent layout')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6 class=" ">
                                                            <i data-feather="sun"
                                                                class=""></i><?php echo e(__('Layout settings')); ?>

                                                        </h6>
                                                        <hr class=" my-2  " />
                                                        <div class="form-check form-switch mt-2 ">
                                                            <input type="checkbox" class="form-check-input" id="cust_darklayout"
                                                                name="cust_darklayout"
                                                                <?php if($settings['cust_darklayout'] == 'on'): ?> checked <?php endif; ?> />

                                                            <label class="form-check-label f-w-600 pl-1"
                                                                for="cust_darklayout"><?php echo e(__('Dark Layout')); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">

                                    <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>


                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

                <div class="" id="email-setting">
                    <?php echo e(Form::open(['route' => 'email.settings', 'method' => 'post'])); ?>

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5><?php echo e(__('Email Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_driver', __('Mail Driver'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')])); ?>

                                            <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_driver"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_host', __('Mail Host'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ', 'placeholder' => __('Enter Mail Driver')])); ?>

                                            <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_driver"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_port', __('Mail Port'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

                                            <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_port"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_username', __('Mail Username'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

                                            <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_username"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_password', __('Mail Password'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_password', env('MAIL_PASSWORD'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')])); ?>

                                            <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_password"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                            <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_encryption"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_from_address', __('Mail From Address'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

                                            <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_from_address"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                            <?php echo e(Form::label('mail_from_name', __('Mail From Name'), ['class' => 'col-form-label'])); ?>

                                            <?php echo e(Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')])); ?>

                                            <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-xs text-danger invalid-mail_from_name"
                                                    role="alert"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="#" class="btn btn-xs btn-primary" data-ajax-popup="true"
                                                data-title="<?php echo e(__('Send Test Mail')); ?>"
                                                data-url="<?php echo e(route('test.mail')); ?>">
                                                <?php echo e(__('Send Test Mail')); ?>

                                            </a>

                                        </div>
                                        <div class="text-end col-md-6">
                                            <?php echo e(Form::submit(__('Save Changes'), ['class' => 'btn btn-xs btn-primary'])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>














































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/owaisimam/PhpStormProjects/al_qaim_trust/resources/views/setting/system_settings.blade.php ENDPATH**/ ?>