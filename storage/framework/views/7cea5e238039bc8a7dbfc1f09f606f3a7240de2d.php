<?php $__env->startSection('title', __('main.title')); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo app('translator')->get('main.all_products'); ?>: <?php echo e($products->total()); ?> <?php echo app('translator')->get('main.all_articles'); ?>, <br /> <?php echo app('translator')->get('main.all_choose'); ?>.</h1>
    <form method="GET" action="<?php echo e(route('index')); ?>">
        <div class="filters row">
            <div class="col-sm-6 col-md-3">
                <label for="price_from"><?php echo app('translator')->get('main.price_from'); ?>
                    <input type="text" name="price_from" id="price_from" size="6" value="<?php echo e(request()->price_from); ?>">
                </label>
                <label for="price_to"> <?php echo app('translator')->get('main.to'); ?>
                    <input type="text" name="price_to" id="price_to" size="6" value="<?php echo e(request()->price_to); ?>">
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="hit">
                    <input type="checkbox" name="hit" id="hit" <?php if(request()->has('hit')): ?> checked <?php endif; ?>>
                    <label for="price_to"> <?php echo app('translator')->get('main.properties.hit'); ?>
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="new">
                    <input type="checkbox" name="new" id="new" <?php if(request()->has('new')): ?> checked <?php endif; ?>>
                    <?php echo app('translator')->get('main.properties.new'); ?>
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="recommend">
                    <input type="checkbox" name="recommend" id="recommend" <?php if(request()->has('recommend')): ?> checked <?php endif; ?>>
                    <?php echo app('translator')->get('main.properties.recommend'); ?>
                </label>
            </div>
            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('main.filter'); ?></button>
                <a href="<?php echo e(route('index')); ?>" class="btn btn-warning"><?php echo app('translator')->get('main.reset'); ?></a>
            </div>
        </div>
    </form>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('layouts.card', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php echo e($products->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\games\Laravel\foxtrot\resources\views/index.blade.php ENDPATH**/ ?>