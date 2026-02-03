

<?php $__env->startSection('content'); ?>
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Shopping Cart</h1>

            <?php if(count($cart) > 0): ?>
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Cart Items -->
                    <div class="w-full md:w-3/4">
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full object-cover" src="<?php echo e($item['image'] ? asset('storage/' . $item['image']) : 'https://via.placeholder.com/50'); ?>" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900"><?php echo e($item['name']); ?></div>
                                                        <div class="text-sm text-gray-500"><?php echo e($item['size']); ?> / <?php echo e($item['color']); ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                $<?php echo e(number_format($item['price'], 2)); ?>

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form action="<?php echo e(route('cart.update', $key)); ?>" method="POST" class="flex items-center">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" class="w-16 text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                                    <button type="submit" class="ml-2 text-blue-600 hover:text-blue-900 text-sm">Update</button>
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                $<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?>

                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="<?php echo e(route('cart.destroy', $key)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="w-full md:w-1/4">
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-lg font-bold text-gray-900 mb-4">Order Summary</h2>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">$<?php echo e(number_format($total, 2)); ?></span>
                            </div>
                            <div class="flex justify-between mb-4 border-b pb-4">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-medium">Free</span>
                            </div>
                            <div class="flex justify-between mb-6">
                                <span class="text-lg font-bold text-gray-900">Total</span>
                                <span class="text-lg font-bold text-green-600">$<?php echo e(number_format($total, 2)); ?></span>
                            </div>
                            <a href="<?php echo e(route('checkout.index')); ?>" class="w-full block text-center bg-blue-600 border border-transparent rounded-md py-3 px-8 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                     <p class="text-gray-500 text-lg mb-6">Your cart is empty.</p>
                     <a href="<?php echo e(route('shop.index')); ?>" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 font-medium">Start Shopping</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.shop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ems\resources\views/frontend/cart/index.blade.php ENDPATH**/ ?>