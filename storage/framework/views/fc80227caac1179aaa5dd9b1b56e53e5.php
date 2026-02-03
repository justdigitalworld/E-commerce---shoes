

<?php $__env->startSection('header', 'User Management'); ?>

<?php $__env->startSection('content'); ?>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                <tr>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Email</th>
                    <th scope="col" class="py-3 px-6">Phone</th>
                    <th scope="col" class="py-3 px-6">Joined Date</th>
                    <th scope="col" class="py-3 px-6">Orders</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="py-4 px-6 font-medium text-gray-900"><?php echo e($user->name); ?></td>
                        <td class="py-4 px-6"><?php echo e($user->email); ?></td>
                        <td class="py-4 px-6"><?php echo e($user->phone ?? 'N/A'); ?></td>
                        <td class="py-4 px-6"><?php echo e($user->created_at->format('M d, Y')); ?></td>
                        <td class="py-4 px-6">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                <?php echo e($user->orders->count()); ?> Orders
                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php echo e($users->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ems\resources\views/admin/users/index.blade.php ENDPATH**/ ?>