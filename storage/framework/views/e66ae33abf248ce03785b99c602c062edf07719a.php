<?php $__env->startSection('title', __('main.product').' : '  . $product->name); ?>

<?php $__env->startSection('content'); ?>

    <h1><?php echo e($product->name); ?></h1>
    <h2><?php echo e($product->category->name); ?></h2>
    <p><?php echo app('translator')->get('main.price'); ?>: <b><?php echo e($product->price); ?> <?php echo app('translator')->get('main.uah'); ?>.</b></p>
    <p><?php echo app('translator')->get('main.rest_card'); ?>: <b><?php echo e($product->count); ?> ед.</b></p>
    <img src="<?php echo e(Storage::url($product->image)); ?>" alt="<?php echo e($product->name); ?>">
    <p><?php echo e($product->description); ?></p>
    <?php if($product->isAvailable()): ?>
        <form action="<?php echo e(route('basket-add', $product)); ?>" method="POST">

            <button type="submit" class="btn btn-primary" role="button"><?php echo app('translator')->get('main.cart'); ?></button>
            <?php echo csrf_field(); ?>
        </form>
    <?php else: ?>
        <form action="<?php echo e(route('subscription', $product)); ?>" method="POST">
            <div class="product-remind">
                <div class="remind"><?php echo app('translator')->get('main.out_of_stock'); ?></div>
                <?php if($errors->get('email')): ?>
                    <div class="alert alert-danger">
                        <?php echo $errors->get('email')[0]; ?>

                    </div>
                <?php endif; ?>
                <input class="product-remind-input" name="email" type="text" id="remind" placeholder="Email"
                    value="">
                <button type="submit" class="btn btn-primary" role="button"><?php echo app('translator')->get('main.remind'); ?></button>
            </div> <?php echo csrf_field(); ?>
        </form>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\games\Laravel\foxtrot\resources\views/product.blade.php ENDPATH**/ ?>