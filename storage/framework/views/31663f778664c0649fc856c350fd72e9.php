

<?php $__env->startSection('header', 'Products'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">All Products</h2>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Product</a>
    </div>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Image</th>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Category</th>
                    <th scope="col" class="py-3 px-6">Brand</th>
                    <th scope="col" class="py-3 px-6">Price</th>
                    <th scope="col" class="py-3 px-6">Stock</th>
                    <th scope="col" class="py-3 px-6">Priority</th>
                    <th scope="col" class="py-3 px-6">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="py-4 px-6">
                            <?php if($product->images->first()): ?>
                                <img src="<?php echo e(asset('storage/' . $product->images->first()->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="w-12 h-12 object-cover rounded">
                            <?php else: ?>
                                <span class="text-gray-400">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap"><?php echo e($product->name); ?></td>
                        <td class="py-4 px-6"><?php echo e($product->category->name); ?></td>
                        <td class="py-4 px-6"><?php echo e($product->brand->name); ?></td>
                        <td class="py-4 px-6">$<?php echo e(number_format($product->price, 2)); ?></td>
                        <td class="py-4 px-6">
                            <span class="<?php echo e($product->stock > 0 ? 'text-green-600' : 'text-red-600'); ?>">
                                <?php echo e($product->stock); ?>

                            </span>
                        </td>
                        <td class="py-4 px-6"><?php echo e($product->priority); ?></td>
                        <td class="py-4 px-6 flex space-x-2">
                            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="font-medium text-blue-600 hover:underline">Edit</a>
                            <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ems\resources\views/admin/products/index.blade.php ENDPATH**/ ?>