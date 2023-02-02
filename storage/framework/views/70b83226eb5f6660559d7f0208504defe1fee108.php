<?php $__env->startSection('title', __('main.all_orders')); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <h1><?php echo app('translator')->get('main.orders_list'); ?></h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>
                    <?php echo app('translator')->get('main.list_rows'); ?>
                    </th>
                    <th>
                        id
                    </th>
                    <th>
                        <?php echo app('translator')->get('main.customer_name'); ?>
                    </th>
                    <th>
                        <?php echo app('translator')->get('main.customer_phone'); ?>
                    </th>
                    <th>
                    <?php echo app('translator')->get('main.order_date'); ?>
                    </th>
                    <th>
                    <?php echo app('translator')->get('main.cost'); ?>
                    </th>
                    <th>
                    <?php echo app('translator')->get('main.actions'); ?>

                    </th>
                </tr>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->index + 1); ?></td>
                        <td><?php echo e($order->id); ?></td>
                        <td><?php echo e($order->name); ?></td>
                        <td><?php echo e($order->phone); ?></td>
                        <td><?php echo e($order->created_at->format('H:i d/m/Y')); ?></td>
                        <td><?php echo e($order->getOrderCost()); ?> <?php echo app('translator')->get('main.uah'); ?>.</td>
                        <td>
                            <div class="btn-group" role="group">
                                <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                                    <a class="btn btn-success" type="button"
                                        href="<?php echo e(route('orders.show', $order)); ?>"><?php echo app('translator')->get('main.open'); ?></a>
                                <?php else: ?>
                                    <a class="btn btn-success" type="button"
                                        href="<?php echo e(route('person.orders.show', $order)); ?>"><?php echo app('translator')->get('main.open'); ?></a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
        <?php echo e($orders->links()); ?>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\games\Laravel\foxtrot\resources\views/auth/orders/index.blade.php ENDPATH**/ ?>