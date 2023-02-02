<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo app('translator')->get('main.admin_page'); ?>: <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(env('APP_URL')); ?>/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="icon" type="image/x-icon"
        href="<?php echo e(env('APP_URL')); ?>/images/favicon/<?php echo e(env('APP_ICON', 'favicon-fox-96x96.png')); ?>" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(env('APP_URL')); ?>/css/app.css" rel="stylesheet">
    <link href="<?php echo e(env('APP_URL')); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(env('APP_URL')); ?>/css/admin.css" rel="stylesheet">
    <link href="<?php echo e(env('APP_URL')); ?>/css/starter-template.css" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(route('index')); ?>">
                    <?php echo app('translator')->get('main.back_to_shop'); ?> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbar" class="navbar-collapse collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                            <li class="<?php echo Route::currentRouteNamed('categor*') ? 'active' : '' ?>"><a href="<?php echo e(route('categories.index')); ?>"><?php echo app('translator')->get('main.all_categories'); ?></a>
                            </li>
                            <li class="<?php echo Route::currentRouteNamed('product*') ? 'active' : '' ?>"><a href="<?php echo e(route('products.index')); ?>"><?php echo app('translator')->get('main.all_products'); ?></a>
                            </li>
                            <li class="<?php echo Route::currentRouteNamed('prod-prop*') ? 'active' : '' ?>"><a href="#"><?php echo app('translator')->get('main.all_properties'); ?></a></li>
                            <li class="<?php echo Route::currentRouteNamed('coupon*') ? 'active' : '' ?>"><a href="#"><?php echo app('translator')->get('main.coupons'); ?></a></li>
                            <li class="<?php echo Route::currentRouteNamed('supplier*') ? 'active' : '' ?>"><a href="#"><?php echo app('translator')->get('main.suppliers'); ?></a></li>
                            <li class="<?php echo Route::currentRouteNamed('admin-login*') ? 'active' : '' ?>"><a href="<?php echo e(route('admin-login')); ?>"><?php echo app('translator')->get('main.all_orders'); ?></a></li>
                            <li><a href="<?php echo e(route('locale', __('main.set_lang'))); ?>"><?php echo app('translator')->get('main.current_lang'); ?></a></li>
                        <?php else: ?>
                            <li class="<?php echo Route::currentRouteNamed('admin-login*') ? 'active' : '' ?>"><a
                                    href="<?php echo e(route('person.orders.index')); ?>"><?php echo app('translator')->get('main.all_orders'); ?></a></li>
                            <li><a href="<?php echo e(route('locale', __('main.set_lang'))); ?>"><?php echo app('translator')->get('main.current_lang'); ?></a></li>
                        <?php endif; ?>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item <?php echo Route::currentRouteNamed('login') ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('main.login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item <?php echo Route::currentRouteNamed('register') ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('main.register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('main.logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
            <div class="starter-template">
                <?php if(session()->has('success')): ?>
                    <p class="alert alert-success"><?php echo e(session()->get('success')); ?></p>
                <?php endif; ?>

                <?php if(session()->has('warning')): ?>
                    <p class="alert alert-danger"><?php echo e(session()->get('warning')); ?></p>
                <?php endif; ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>
</body>

</html>
<?php /**PATH D:\games\Laravel\foxtrot\resources\views/auth/layouts/admin.blade.php ENDPATH**/ ?>