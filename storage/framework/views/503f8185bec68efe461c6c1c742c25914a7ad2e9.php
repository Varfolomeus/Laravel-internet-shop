<p><?php echo e($name); ?> добрий день, повідомляємо про прийняття замовлення до виконання.</p>
<p>Загальна вартість замовлення № <?php echo e($basket->getOrder()->id . ' складає ' . $ordersum); ?> <?php $__env->startTranslation(); ?>('main.uah'.</p>
<p>Служба продажів, Foxtrot.</p>
<table>
    <tbody>
        <thead>
            <td>№ п.п.</td>
            <td>Найменування</td>
            <td>Кількість, шт.</td>
            <td>Ціна, <?php $__env->startTranslation(); ?>('main.uah'</td>
            <td>Вартість, <?php $__env->startTranslation(); ?>('main.uah'</td>
        </thead>
        <?php $__currentLoopData = $basket->getOrder()->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->index + 1); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->pivot->count); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->getPriceForCount()); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH D:\games\Laravel\foxtrot\resources\views/mail/order_created.blade.php ENDPATH**/ ?>