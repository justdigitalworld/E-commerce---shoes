

<?php $__env->startSection('header', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Stats Card 1 -->
        <div class="bg-blue-600 text-white p-6 rounded-xl shadow-md border-b-4 border-blue-800">
            <div class="flex items-center">
                <div class="p-3 bg-blue-700 rounded-lg mr-4">
                    <i class="fas fa-users text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-medium opacity-80">Total Users</h3>
                    <p class="text-3xl font-bold"><?php echo e($totalUsers); ?></p>
                </div>
            </div>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="mt-4 block text-sm font-medium hover:underline">View all users →</a>
        </div>

        <!-- Stats Card 2 -->
        <div class="bg-emerald-600 text-white p-6 rounded-xl shadow-md border-b-4 border-emerald-800">
            <div class="flex items-center">
                <div class="p-3 bg-emerald-700 rounded-lg mr-4">
                    <i class="fas fa-box text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-medium opacity-80">Total Products</h3>
                    <p class="text-3xl font-bold"><?php echo e($totalProducts); ?></p>
                </div>
            </div>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="mt-4 block text-sm font-medium hover:underline">Manage products →</a>
        </div>

        <!-- Stats Card 3 -->
        <div class="bg-amber-600 text-white p-6 rounded-xl shadow-md border-b-4 border-amber-800">
            <div class="flex items-center">
                <div class="p-3 bg-amber-700 rounded-lg mr-4">
                    <i class="fas fa-shopping-cart text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-medium opacity-80">Total Orders</h3>
                    <p class="text-3xl font-bold"><?php echo e($totalOrders); ?></p>
                </div>
            </div>
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="mt-4 block text-sm font-medium hover:underline">View orders →</a>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-10">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Quick Actions</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="<?php echo e(route('admin.products.create')); ?>" class="flex items-center p-4 bg-white rounded-lg shadow border border-gray-100 hover:border-blue-400 hover:shadow-md transition-all group">
                <div class="p-3 bg-blue-100 text-blue-600 rounded-lg group-hover:bg-blue-600 group-hover:text-white transition-colors mr-4">
                    <i class="fas fa-plus"></i>
                </div>
                <span class="font-semibold text-gray-700">Add Product</span>
            </a>

            <a href="<?php echo e(route('admin.categories.create')); ?>" class="flex items-center p-4 bg-white rounded-lg shadow border border-gray-100 hover:border-green-400 hover:shadow-md transition-all group">
                <div class="p-3 bg-green-100 text-green-600 rounded-lg group-hover:bg-green-600 group-hover:text-white transition-colors mr-4">
                    <i class="fas fa-folder-plus"></i>
                </div>
                <span class="font-semibold text-gray-700">Add Category</span>
            </a>

            <a href="<?php echo e(route('admin.orders.index')); ?>" class="flex items-center p-4 bg-white rounded-lg shadow border border-gray-100 hover:border-amber-400 hover:shadow-md transition-all group">
                <div class="p-3 bg-amber-100 text-amber-600 rounded-lg group-hover:bg-amber-600 group-hover:text-white transition-colors mr-4">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <span class="font-semibold text-gray-700">Manage Orders</span>
            </a>

            <a href="<?php echo e(route('home')); ?>" target="_blank" class="flex items-center p-4 bg-white rounded-lg shadow border border-gray-100 hover:border-purple-400 hover:shadow-md transition-all group">
                <div class="p-3 bg-purple-100 text-purple-600 rounded-lg group-hover:bg-purple-600 group-hover:text-white transition-colors mr-4">
                    <i class="fas fa-eye"></i>
                </div>
                <span class="font-semibold text-gray-700">View Shop</span>
            </a>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Activity</h3>
        <p class="text-gray-600">No recent activity found.</p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ems\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>