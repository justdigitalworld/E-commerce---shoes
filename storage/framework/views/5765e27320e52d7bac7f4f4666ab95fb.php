

<?php $__env->startSection('content'); ?>
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Checkout</h1>
            
            <form action="<?php echo e(route('checkout.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Billing Details -->
                    <div class="w-full md:w-2/3">
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Billing Details</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                                    <input type="text" id="first_name" name="first_name" value="<?php echo e(Auth::check() ? explode(' ', Auth::user()->name)[0] : ''); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div>
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
                                    <input type="email" id="email" name="email" value="<?php echo e(Auth::user()->email ?? ''); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                                    <input type="text" id="phone" name="phone" value="<?php echo e(Auth::user()->phone ?? ''); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                                    <input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div>
                                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900">Town / City</label>
                                    <input type="text" id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div>
                                    <label for="zip" class="block mb-2 text-sm font-medium text-gray-900">ZIP Code</label>
                                    <input type="text" id="zip" name="zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="notes" class="block mb-2 text-sm font-medium text-gray-900">Order Notes (Optional)</label>
                                    <textarea id="notes" name="notes" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Review -->
                    <div class="w-full md:w-1/3">
                        <div class="bg-white shadow rounded-lg p-6 mb-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Your Order</h2>
                            <div class="flow-root">
                                <ul role="list" class="-my-4 divide-y divide-gray-200">
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="flex py-4">
                                            <div class="flex-1">
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3><?php echo e($item['name']); ?></h3>
                                                    <p class="ml-4">$<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">Qty <?php echo e($item['quantity']); ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="border-t border-gray-200 mt-6 pt-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Total</p>
                                    <p>$<?php echo e(number_format($total, 2)); ?></p>
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Payment Method</h3>
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="cod" name="payment_method" type="radio" value="cod" checked class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                        <label for="cod" class="ml-3 block text-sm font-medium text-gray-700">Cash on Delivery</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="card" name="payment_method" type="radio" value="card" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                        <label for="card" class="ml-3 block text-sm font-medium text-gray-700">Credit Card (Stripe - Demo)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="w-full bg-blue-600 border border-transparent rounded-md py-3 px-8 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.shop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ems\resources\views/frontend/checkout/index.blade.php ENDPATH**/ ?>