<?php

$user = $_SESSION['user'] ?? null;
$avatar = $user && $user['image']
    ? $user['image']
    : 'https://ui-avatars.com/api/?name=' . urlencode($user['name'] ?? 'Admin');
?>

<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo và Navigation -->
            <div class="flex items-center space-x-8">
                <div class="flex-shrink-0">
                    <h1 class="text-xl font-bold text-gray-900">Admin Panel</h1>
                </div>
                <nav class="hidden md:flex space-x-4">
                    <a href="index.php"
                        class="text-blue-600 hover:text-blue-800 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Home
                    </a>
                    <a href="?act=category"
                        class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Category
                    </a>
                    <a href="?act=products"
                        class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Products
                    </a>
                    <a href="?act=users"
                        class="text-gray-600 hover:text-gray-800 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Users
                    </a>
                </nav>
            </div>

            <!-- User Avatar + Info -->
            <?php if ($user): ?>
                <div class="flex items-center">
                    <div class="relative">
                        <button
                            class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-full p-1">
                            <img class="h-8 w-8 rounded-full object-cover border-2 border-gray-200" src="<?= $avatar ?>"
                                alt="Avatar">
                            <span class="text-sm font-medium"><?= htmlspecialchars($user['name']) ?></span>
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>