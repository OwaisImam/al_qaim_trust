<?php

$company_favicon = Utility::getValByName('company_favicon');

$logo = asset(Storage::url('uploads/logo/'));
$company_logo = \App\Models\Utility::GetLogo();
$SITE_RTL = Utility::getValByName('SITE_RTL');

$setting = App\Models\Utility::colorset();
$color = !empty($setting['theme_color']) ? $setting['theme_color'] : 'theme-3';

// $SITE_RTL=$setting['SITE_RTL'];


?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>">

<head>

    
    <title>
        <?php echo e(Utility::getValByName('title_text') ? Utility::getValByName('title_text') : config('app.name', 'HRMGo')); ?>

        - <?php echo $__env->yieldContent('page-title'); ?></title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo')) . '/favicon.png'); ?>" type="image/x-icon" />

    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/stylesheet.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
    <!-- vendor css -->
    

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">





    <?php if($SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>
    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php endif; ?>

</head>

<body class="<?php echo e($color); ?>">
    <!-- [ auth-signup ] start -->
    <div class="auth-wrapper auth-v3">
        <div class="bg-auth-side bg-primary"></div>
        <div class="auth-content">
            <nav class="navbar navbar-expand-md navbar-light default">
                <div class="container-fluid pe-2">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo e($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png')); ?>"
                            alt="<?php echo e(config('app.name', 'HRMGO')); ?>" alt="logo">
                        
                        
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
















                </div>
            </nav>
            <div class="card">
                <div class="row align-items-center ">
                    <?php echo $__env->yieldContent('content'); ?>

                </div>
            </div>
            <div class="auth-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <?php echo e(__('Copyright')); ?> &copy;
                            <?php echo e(Utility::getValByName('footer_text') ? Utility::getValByName('footer_text') : config('app.name', 'LeadGo')); ?>

                            <?php echo e(date('Y')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ auth-signup ] end -->

    <!-- Required Js -->
    <script src="<?php echo e(asset('custom/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor-all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
    <script>
        feather.replace();
    </script>

    <input type="checkbox" class="d-none" id="cust-theme-bg"
        <?php echo e(Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : ''); ?> />
    <input type="checkbox" class="d-none" id="cust-darklayout"
        <?php echo e(Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : ''); ?> />

    <script src="<?php echo e(asset('custom/js/jquery.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('script'); ?>
    <?php echo $__env->yieldPushContent('custom-scripts'); ?>

    <?php if($message = Session::get('success')): ?>
        <script>
            show_toastr('Success', '<?php echo $message; ?>', 'success');
        </script>
    <?php endif; ?>
    <?php if($message = Session::get('error')): ?>
        <script>
            show_toastr('Error', '<?php echo $message; ?>', 'error');
        </script>
    <?php endif; ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\al_qaim_trust\resources\views/layouts/auth.blade.php ENDPATH**/ ?>