

<?php $__env->startSection('title', __('main.cart_place')); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo app('translator')->get('main.approve_order'); ?></h1>
    <div class="container">
        <div class="row justify-content-center">
            <p><?php echo app('translator')->get('main.order_total_cost'); ?> <b>
                    <?php echo e($order->getOrderCost()); ?>

                    <?php echo app('translator')->get('main.uah'); ?>.</b></p>
            <form action="<?php echo e(route('confirm-order')); ?>" method="POST">
                <div>
                    <p><?php echo app('translator')->get('main.credentials'); ?>:</p>
                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2"><?php echo app('translator')->get('main.customer_name'); ?>:</label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name"
                                    value="<?php echo e(Auth::check() ? Auth::user()->name : null); ?>" class="form-control">
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2"><?php echo app('translator')->get('main.customer_phone'); ?>:</label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br />
                        <br />
                        <div class="form-group">
                            <label for="email" class="control-label col-lg-offset-3 col-lg-2">Email:</label>
                            <div class="col-lg-4">
                                <input type="email" name="email" id="email"
                                    value="<?php echo e(Auth::check() ? Auth::user()->email : null); ?>" class="form-control">
                            </div>
                        </div>
                        <br />
                        <br />
                        <input type="submit" name="submit" id="submit" value="<?php echo app('translator')->get('main.approve_order'); ?>"
                            class="btm btn-success">
                        <?php echo csrf_field(); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\games\Laravel\foxtrot\resources\views/order.blade.php ENDPATH**/ ?>