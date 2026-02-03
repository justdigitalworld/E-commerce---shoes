<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Shoes Store')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="sticky top-0 z-50 transition-all duration-300 glass-card border-none">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="<?php echo e(route('home')); ?>" class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 tracking-tighter">
                                SHOES<span class="text-gray-900">STORE</span>
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-12 sm:flex">
                            <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center px-1 pt-1 <?php echo e(request()->routeIs('home') ? 'text-blue-600 font-bold border-b-2 border-blue-600' : 'text-gray-500 font-medium hover:text-blue-600'); ?> transition px-3 py-2 text-sm leading-5 focus:outline-none">
                                Home
                            </a>
                            <a href="<?php echo e(route('shop.index')); ?>" class="inline-flex items-center px-1 pt-1 <?php echo e(request()->routeIs('shop.*') ? 'text-blue-600 font-bold border-b-2 border-blue-600' : 'text-gray-500 font-medium hover:text-blue-600'); ?> transition px-3 py-2 text-sm leading-5 focus:outline-none">
                                Shop
                            </a>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-6">
                        <!-- Cart -->
                        <a href="<?php echo e(route('cart.index')); ?>" class="group flex items-center p-2 rounded-full hover:bg-blue-50 transition relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 group-hover:text-blue-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <!-- Cart Count -->
                            <?php if(session('cart') && count(session('cart')) > 0): ?>
                                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/4 -translate-y-1/4 bg-red-600 rounded-full animate-bounce">
                                    <?php echo e(count(session('cart'))); ?>

                                </span>
                            <?php endif; ?>
                        </a>

                        <!-- Auth Links -->
                        <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                                <div class="ml-3 relative group">
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 flex items-center justify-center text-white font-bold uppercase shadow-md">
                                            <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                                        </div>
                                        <div class="ml-2 hidden lg:block"><?php echo e(Auth::user()->name); ?></div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="hidden group-hover:block absolute right-0 mt-2 w-48 rounded-md shadow-2xl py-1 bg-white ring-1 ring-black ring-opacity-5 z-50 transform origin-top-right transition">
                                        <?php if(Auth::user()->role === 'admin'): ?>
                                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-medium">Admin Panel</a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('dashboard')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-medium">Profile</a>
                                        <?php endif; ?>
                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-medium">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition">Log in</a>
                                <?php if(Route::has('register')): ?>
                                    <a href="<?php echo e(route('register')); ?>" class="ml-4 px-5 py-2.5 rounded-full bg-gray-900 text-white font-medium hover:bg-gray-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">Register</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow">
            <?php if(session('success')): ?>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-r-lg shadow-md relative" role="alert">
                        <span class="block sm:inline font-medium"><?php echo e(session('success')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    <div class="col-span-1 md:col-span-1">
                        <h3 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400 mb-6 tracking-tight">SHOESSTORE</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-6">
                            Elevate your steps with our premium collection. Quality meets comfort in every pair we curate for you.
                        </p>
                        <div class="flex space-x-4">
                            <!-- Social Icons Placeholders -->
                            <a href="#" class="text-gray-400 hover:text-white transition"><span class="sr-only">Facebook</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg></a>
                            <a href="#" class="text-gray-400 hover:text-white transition"><span class="sr-only">Twitter</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg></a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-bold mb-6 text-white tracking-wider uppercase text-sm">Shop</h4>
                        <ul class="space-y-3 text-sm text-gray-400">
                            <li><a href="<?php echo e(route('shop.index')); ?>" class="hover:text-blue-400 transition flex items-center"><span class="mr-2">&rsaquo;</span> Men</a></li>
                            <li><a href="<?php echo e(route('shop.index')); ?>" class="hover:text-blue-400 transition flex items-center"><span class="mr-2">&rsaquo;</span> Women</a></li>
                            <li><a href="<?php echo e(route('shop.index')); ?>" class="hover:text-blue-400 transition flex items-center"><span class="mr-2">&rsaquo;</span> Kids</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-6 text-white tracking-wider uppercase text-sm">Support</h4>
                        <ul class="space-y-3 text-sm text-gray-400">
                            <li><a href="#" class="hover:text-blue-400 transition flex items-center"><span class="mr-2">&rsaquo;</span> Contact Us</a></li>
                            <li><a href="#" class="hover:text-blue-400 transition flex items-center"><span class="mr-2">&rsaquo;</span> FAQs</a></li>
                            <li><a href="#" class="hover:text-blue-400 transition flex items-center"><span class="mr-2">&rsaquo;</span> Shipping & Returns</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-6 text-white tracking-wider uppercase text-sm">Stay Connected</h4>
                         <p class="text-gray-400 text-sm mb-4">Subscribe for latest updates.</p>
                         <form class="flex flex-col space-y-2">
                             <input type="email" placeholder="Enter your email" class="px-4 py-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 border border-gray-700">
                             <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">Subscribe</button>
                         </form>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                    <p>&copy; <?php echo e(date('Y')); ?> ShoesStore. All rights reserved.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="hover:text-white transition">Privacy Policy</a>
                        <a href="#" class="hover:text-white transition">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
<?php /**PATH D:\ems\resources\views/layouts/shop.blade.php ENDPATH**/ ?>