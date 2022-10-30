<?php
use App\Models\Utility;
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$languages = Utility::languages();
$profile = asset(Storage::url('uploads/avatar/'));
// $setting = App\Models\Utility::settings();
// $is_sidebar_transperent=$setting['is_sidebar_transperent'];

// $mode_setting = \App\Models\Utility::mode_layout();
?>


<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <header class="dash-header transprent-bg">
<?php else: ?>
    <header class="dash-header">
<?php endif; ?>


    <div class="header-wrapper">
        <div class="me-auto dash-mob-drp">
            <ul class="list-unstyled">
                <li class="dash-h-item mob-hamburger">
                    <a href="#!" class="dash-head-link" id="mobile-collapse">
                        <div class="hamburger hamburger--arrowturn">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                </li>

                <li class="dropdown dash-h-item drp-company">
                    <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="theme-avtar">
                            <img alt="#"
                                src="<?php echo e(!empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . '/avatar.png'); ?>"
                                class="header-avtar" style="width: 100%">
                        </span>
                        <span class="hide-mob ms-2"> <?php echo e(Auth::user()->name); ?>

                            <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                    </a>
                    <div class="dropdown-menu dash-h-dropdown">
                        <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                            <i class="ti ti-user"></i>
                            <span><?php echo e(__('My Profile')); ?></span>
                        </a>

                        <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="ti ti-power"></i>
                            <span><?php echo e(__('Logout')); ?></span>
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?></form>
                    </div>
                </li>


            </ul>
        </div>
        <div class="ms-auto">
            <ul class="list-unstyled">


















































































            </ul>
        </div>
    </div>
</header>
<?php /**PATH /Users/owaisimam/PhpStormProjects/al_qaim_trust/resources/views/partial/Admin/header.blade.php ENDPATH**/ ?>