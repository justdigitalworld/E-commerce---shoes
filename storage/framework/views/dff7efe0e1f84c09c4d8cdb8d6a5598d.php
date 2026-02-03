

<?php $__env->startSection('content'); ?>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="w-full md:w-1/4 space-y-8">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Categories</h3>
                        <ul class="space-y-2">
                            <li><a href="<?php echo e(route('shop.index')); ?>" class="text-gray-600 hover:text-blue-600 <?php echo e(!request('category') ? 'font-bold text-blue-600' : ''); ?>">All Categories</a></li>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('shop.index', ['category' => $category->slug])); ?>" 
                                       class="text-gray-600 hover:text-blue-600 <?php echo e(request('category') == $category->slug ? 'font-bold text-blue-600' : ''); ?>">
                                        <?php echo e($category->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Brands</h3>
                        <ul class="space-y-2">
                             <li><a href="<?php echo e(route('shop.index')); ?>" class="text-gray-600 hover:text-blue-600 <?php echo e(!request('brand') ? 'font-bold text-blue-600' : ''); ?>">All Brands</a></li>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('shop.index', array_merge(request()->all(), ['brand' => $brand->slug]))); ?>" 
                                       class="text-gray-600 hover:text-blue-600 <?php echo e(request('brand') == $brand->slug ? 'font-bold text-blue-600' : ''); ?>">
                                        <?php echo e($brand->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="w-full md:w-3/4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="group relative bg-white border border-gray-200 rounded-lg flex flex-col overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-64">
                                     <img src="<?php echo e($product->images->first() ? asset('storage/' . $product->images->first()->image_path) : 'https://via.placeholder.com/300'); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-64 object-cover object-center">
                                </div>
                                <div class="flex-1 p-4 flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">
                                            <a href="<?php echo e(route('shop.show', $product->id)); ?>">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                <?php echo e($product->name); ?>

                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500"><?php echo e($product->category->name); ?></p>
                                    </div>
                                    <div class="mt-2 flex items-center justify-between">
                                        <p class="text-lg font-bold text-gray-900">$<?php echo e(number_format($product->price, 2)); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-span-full text-center py-12 text-gray-500">
                                No products found.
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mt-8">
                        <?php echo e($products->withQueryString()->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.shop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ems\resources\views/frontend/shop/index.blade.php ENDPATH**/ ?>