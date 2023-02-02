<?php $__env->startSection('title', 'Замовлення ' . $order->id); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1><?php echo app('translator')->get('main.order_app_title'); ?> <?php echo e($order->id); ?></h1>
                    <p><?php echo app('translator')->get('main.order_customer_name'); ?>: <b><?php echo e($order->name); ?></b></p>
                    <p><?php echo app('translator')->get('main.customer_phone'); ?>: <b><?php echo e($order->phone); ?></b></p>
                    <table class="table-striped table">
                        <thead>
                            <tr>
                                <th> <?php echo app('translator')->get('main.list_rows'); ?></th>
                                <th><?php echo app('translator')->get('main.name'); ?></th>
                                <th><?php echo app('translator')->get('main.quantity'); ?></th>
                                <th><?php echo app('translator')->get('main.price'); ?></th>
                                <th><?php echo app('translator')->get('main.cost'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('product', [$product->category->code, $product->code])); ?>">
                                            <img height="56px" src="<?php echo e(Storage::url($product->image)); ?>">
                                            <?php echo e($product->name); ?>

                                        </a>
                                    </td>
                                    <td><span class="badge"> <?php echo e($product->pivot->count); ?></span></td>
                                    <td><?php echo e($product->price); ?> <?php echo app('translator')->get('main.uah'); ?>.</td>
                                    <td><?php echo e($product->getPriceForCount()); ?> <?php echo app('translator')->get('main.uah'); ?>.</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="3"><?php echo app('translator')->get('main.order_total_cost'); ?>:</td>
                                <td></td>
                                <td><?php echo e($order->getOrderCost()); ?> <?php echo app('translator')->get('main.uah'); ?>.</td>

                            </tr>

                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\games\Laravel\foxtrot\resources\views/auth/orders/show.blade.php ENDPATH**/ ?>