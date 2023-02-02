<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo app('translator')->get('main.online_shop'); ?>: <?php echo $__env->yieldContent('title'); ?>
    </title>
    <link rel="icon" type="image/x-icon"
        href="<?php echo e(env('APP_URL')); ?>/images/favicon/<?php echo e(env('APP_ICON', 'favicon-fox-96x96.png')); ?>" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <link href="<?php echo e(env('APP_URL')); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(env('APP_URL')); ?>/css/starter-template.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo e(route('index')); ?>"><?php echo app('translator')->get('main.online_shop'); ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echo Route::currentRouteNamed('index') ? 'active' : '' ?>"><a href="<?php echo e(route('index')); ?>"><?php echo app('translator')->get('main.all_products'); ?></a></li>
                    <li class="<?php echo Route::currentRouteNamed('categor*') ? 'active' : '' ?>"><a href="<?php echo e(route('categories')); ?>"><?php echo app('translator')->get('main.categories'); ?></a></li>
                    <li class="<?php echo Route::currentRouteNamed('basket*') ? 'active' : '' ?>"><a href="<?php echo e(route('basket')); ?>"><?php echo app('translator')->get('main.cart'); ?></a></li>
                    <li><a href="<?php echo e(route('reset')); ?>"><?php echo app('translator')->get('main.reset_project'); ?></a></li>
                    <li><a href="<?php echo e(route('locale',__('main.set_lang'))); ?>"><?php echo app('translator')->get('main.current_lang'); ?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="<?php echo Route::currentRouteNamed('login*') ? 'active' : '' ?>"><a href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('main.login'); ?></a></li>
                        <li class="<?php echo Route::currentRouteNamed('register*') ? 'active' : '' ?>"><a href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('main.register'); ?></a></li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                            <li class="<?php echo Route::currentRouteNamed('admin-login') ? 'active' : '' ?>"><a href="<?php echo e(route('admin-login')); ?>"><?php echo app('translator')->get('main.admin_panel'); ?></a></li>
                        <?php else: ?>
                            <li class="<?php echo Route::currentRouteNamed('person.orders.index') ? 'active' : '' ?>"><a href="<?php echo e(route('person.orders.index')); ?>"><?php echo app('translator')->get('main.my_orders'); ?></a></li>
                        <?php endif; ?>
                        <li class="<?php echo Route::currentRouteNamed('shop-logout') ? 'active' : '' ?>"><a href="<?php echo e(route('shop-logout')); ?>"><?php echo app('translator')->get('main.logout'); ?></a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="starter-template">
            <?php if(session()->has('success')): ?>
                <p class="alert alert-success"><?php echo e(session()->get('success')); ?></p>
            <?php endif; ?>

            <?php if(session()->has('warning')): ?>
                <p class="alert alert-danger"><?php echo e(session()->get('warning')); ?></p>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</body>

</html>
<?php /**PATH D:\games\Laravel\foxtrot\resources\views/layouts/master.blade.php ENDPATH**/ ?>