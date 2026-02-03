

<?php $__env->startSection('header', 'Order Details #' . $order->id); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Order Info -->
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow border">
                <h3 class="text-lg font-bold mb-4">Items</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="py-3 px-4">Product</th>
                                <th class="py-3 px-4">Size/Color</th>
                                <th class="py-3 px-4">Price</th>
                                <th class="py-3 px-4">Qty</th>
                                <th class="py-3 px-4">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-white border-b">
                                    <td class="py-4 px-4 font-medium text-gray-900">
                                        <?php echo e($item->product->name); ?>

                                    </td>
                                    <td class="py-4 px-4">
                                        <?php echo e($item->size ?? '-'); ?> / <?php echo e($item->color ?? '-'); ?>

                                    </td>
                                    <td class="py-4 px-4">$<?php echo e(number_format($item->price, 2)); ?></td>
                                    <td class="py-4 px-4"><?php echo e($item->quantity); ?></td>
                                    <td class="py-4 px-4">$<?php echo e(number_format($item->price * $item->quantity, 2)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Customer Info -->
            <div class="bg-white p-6 rounded-lg shadow border">
                <h3 class="text-lg font-bold mb-4">Customer Info</h3>
                <p><strong>Name:</strong> <?php echo e($order->user ? $order->user->name : 'Guest'); ?></p>
                <p><strong>Email:</strong> <?php echo e($order->user ? $order->user->email : 'N/A'); ?></p>
                <p><strong>Shipping Address:</strong><br><?php echo e($order->shipping_address); ?></p>
            </div>

            <!-- Order Summary -->
            <div class="bg-white p-6 rounded-lg shadow border">
                <h3 class="text-lg font-bold mb-4">Summary</h3>
                <div class="flex justify-between mb-2">
                    <span>Payment Method:</span>
                    <span class="font-medium uppercase"><?php echo e($order->payment_method); ?></span>
                </div>
                <div class="flex justify-between mb-4">
                    <span>Total Amount:</span>
                    <span class="text-xl font-bold text-green-600">$<?php echo e(number_format($order->total_amount, 2)); ?></span>
                </div>

                <form action="<?php echo e(route('admin.orders.update', $order->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Update Status</label>
                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-4">
                        <?php $__currentLoopData = ['pending', 'processing', 'shipped', 'delivered', 'cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status); ?>" <?php echo e($order->status === $status ? 'selected' : ''); ?>>
                                <?php echo e(ucfirst($status)); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update Status</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ems\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>