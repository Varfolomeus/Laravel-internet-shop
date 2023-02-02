

<?php $__env->startSection('title', __('main.cart_place')); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo app('translator')->get('main.cart_place'); ?></h1>
    <p><?php echo app('translator')->get('main.placement_order'); ?></p>
    <div class="panel">
        <table class="table-striped table">
            <thead>
                <tr>
                    <th><?php echo app('translator')->get('main.name'); ?></th>
                    <th><?php echo app('translator')->get('main.quantity'); ?></th>
                    <th><?php echo app('translator')->get('main.price'); ?></th>
                    <th><?php echo app('translator')->get('main.cost'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->products()->with('category')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('product', [$product->category->code, $product->code])); ?>">
                                <img height="56px" src="<?php echo e(Storage::url($product->image)); ?>">
                                <?php echo e($product->name); ?>

                            </a>
                        </td>
                        <td><span class="badge"><?php echo e($product->pivot->count); ?></span>
                            <div class="btn-group inline-form-buttons">
                                <form action="<?php echo e(route('basket-remove', $product)); ?>" method="POST">
                                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-minus"
                                            aria-hidden="true"></span></button>
                                    <?php echo csrf_field(); ?>
                                </form>
                                <form action="<?php echo e(route('basket-add', $product)); ?>" method="POST">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"
                                            aria-hidden="true"></span></button>
                                    <?php echo csrf_field(); ?>
                                </form>

                            </div>
                        </td>
                        <td><?php echo e($product->price); ?> <?php echo app('translator')->get('main.uah'); ?>.</td>

                        <td><?php echo e($product->getPriceForCount()); ?> <?php echo app('translator')->get('main.uah'); ?>.</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="3"><?php echo app('translator')->get('main.full_cost'); ?>:</td>
                    <td><?php echo e($order->getOrderCost()); ?> <?php echo app('translator')->get('main.uah'); ?>.</td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="<?php echo e(route('basket-place')); ?>"><?php echo app('translator')->get('main.place_order'); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\games\Laravel\foxtrot\resources\views/basket.blade.php ENDPATH**/ ?>