<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">

            <?php if($product->isRecommend()): ?>
                <span class="badge badge-warning"><?php echo app('translator')->get('main.properties.recommend'); ?></span>
            <?php endif; ?>
            <?php if($product->isHit()): ?>
                <span class="badge badge-danger"><?php echo app('translator')->get('main.properties.hit'); ?></span>
            <?php endif; ?>
            <?php if($product->isNew()): ?>
                <span class="badge badge-success"><?php echo app('translator')->get('main.properties.new'); ?></span>
            <?php endif; ?>
        </div>
        <img src="<?php echo e(Storage::url($product->image)); ?>" alt="iPhone X 64GB">
        <div class="caption">
            <h3><?php echo e($product->name); ?></h3>
            <p><?php echo app('translator')->get('main.rest_card'); ?>: <?php echo e($product->count); ?></p>
            <p><?php echo e($product->price); ?> <?php echo app('translator')->get('main.uah'); ?>.</p>
            <p>
            <form action="<?php echo e(route('basket-add', $product)); ?>" method="POST">
                <?php if($product->isAvailable()): ?>
                    <button type="submit" class="btn btn-primary" role="button"><?php echo app('translator')->get('main.cart'); ?></button>
                <?php else: ?>
                    <div class="btn btn-default disabled"><?php echo app('translator')->get('main.out_of_stock'); ?></div>
                <?php endif; ?>
                <a href="<?php echo e(route('product', [isset($category) ? $category->code : $product->category->code, $product->code])); ?>"
                    class="btn btn-default" role="button"><?php echo app('translator')->get('main.description'); ?></a>
                <?php echo csrf_field(); ?>
            </form>
            </p>
        </div>
    </div>
</div>
<?php /**PATH D:\games\Laravel\foxtrot\resources\views/layouts/card.blade.php ENDPATH**/ ?>