<?php
$user = $_SESSION['user'] ?? null;
$avatar = $user && $user['image']
    ? $user['image']
    : 'https://ui-avatars.com/api/?name=' . urlencode($user['name'] ?? 'Guest') . '&background=3b82f6&color=fff';
?>

<!-- Top Bar -->
<div class="bg-gradient-to-r from-slate-800 to-slate-900 text-white">
    <div class="container mx-auto px-4 py-2">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center text-sm space-y-2 sm:space-y-0">
            <div class="flex flex-wrap items-center gap-4">
                <span class="flex items-center">
                    <i class="fas fa-phone mr-2 text-blue-400"></i>
                    <a href="tel:0399095138" class="hover:text-blue-300 transition">0399095138</a>
                </span>
                <span class="flex items-center">
                    <i class="fas fa-envelope mr-2 text-blue-400"></i>
                    <a href="mailto:luuhanh0201@gmail.com"
                        class="hover:text-blue-300 transition">luuhanh0201@gmail.com</a>
                </span>
            </div>

            <div class="flex items-center space-x-4">
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="flex items-center space-x-3">
                        <img src="<?= $avatar ?>" alt="Avatar" class="w-6 h-6 rounded-full border border-blue-400">
                        <span class="text-gray-300">Xin chào, <strong
                                class="text-white"><?= $user['name'] ?></strong></span>
                        <a href="?act=logout" class="text-red-400 hover:text-red-300 transition ml-2">
                            <i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất
                        </a>
                    </div>
                <?php else: ?>
                    <a href="?act=signin" class="text-gray-300 hover:text-white transition">
                        <i class="fas fa-sign-in-alt mr-1"></i>Đăng nhập
                    </a>
                    <span class="text-gray-500">|</span>
                    <a href="?act=signup" class="text-gray-300 hover:text-white transition">
                        <i class="fas fa-user-plus mr-1"></i>Đăng ký
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="bg-white shadow-lg border-b">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between gap-4">
            <!-- Logo -->
            <div class="flex items-center flex-shrink-0">
                <a href="/" class="flex items-center group">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white mr-3 group-hover:scale-105 transition-transform">
                        <i class="fas fa-store text-xl"></i>
                    </div>
                    <div class="hidden sm:block">
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            Shop FPoly</h1>
                        <p class="text-xs text-gray-500">Cửa hàng trực tuyến</p>
                    </div>
                </a>
            </div>

            <!-- Search Bar -->
            <div class="flex-1 max-w-2xl mx-4">
                <form class="relative group">
                    <input type="text" placeholder="Tìm kiếm sản phẩm, thương hiệu..."
                        class="w-full pl-4 pr-14 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all group-hover:border-gray-300">
                    <button type="submit"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-blue-500 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Actions -->
            <div class="flex items-center space-x-3 flex-shrink-0">
                <!-- Wishlist -->
                <a href="/wishlist"
                    class="relative p-2 text-gray-600 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all group">
                    <i class="fas fa-heart text-xl group-hover:scale-110 transition-transform"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center animate-pulse">0</span>
                </a>

                <!-- Cart -->
                <a href="/cart"
                    class="relative p-2 text-gray-600 hover:text-blue-500 hover:bg-blue-50 rounded-lg transition-all group">
                    <i class="fas fa-shopping-cart text-xl group-hover:scale-110 transition-transform"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-blue-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </a>

                <!-- Mobile Menu Toggle -->
                <button onclick="toggleMobileMenu()"
                    class="lg:hidden p-2 text-gray-600 hover:text-blue-500 hover:bg-blue-50 rounded-lg transition-all">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Navigation -->
<nav class="bg-gradient-to-r from-blue-600 via-blue-700 to-purple-700 text-white shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            <!-- Categories Dropdown -->
            <div class="relative">
                <button onclick="toggleCategories()"
                    class="flex items-center px-6 py-4 bg-black/20 hover:bg-black/30 transition-all rounded-r-lg backdrop-blur-sm">
                    <i class="fas fa-th-large mr-3"></i>
                    <span class="font-medium">Danh mục</span>
                    <i class="fas fa-chevron-down ml-3 transition-transform" id="categories-icon"></i>
                </button>

                <div id="categories-dropdown"
                    class="absolute top-full left-0 bg-white text-gray-800 min-w-72 shadow-xl z-50 rounded-lg border hidden">
                    <div class="py-2">
                        <?php
                        require_once './models/CategoryModel.php';
                        $categoryModel = new CategoryModel();
                        $categories = $categoryModel->getAllCategories();

                        foreach ($categories as $category):
                            ?>
                            <a href="/category/<?= $category['id'] ?>"
                                class="flex items-center px-4 py-3 hover:bg-blue-50 transition-colors border-b border-gray-100 last:border-b-0 group">
                                <i class="fas fa-tag mr-3 text-blue-500 group-hover:text-blue-600"></i>
                                <span class="font-medium"><?= htmlspecialchars($category['name']) ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->
            <ul class="hidden lg:flex items-center space-x-8">
                <li>
                    <a href="/" class="flex items-center py-4 hover:text-blue-200 transition-colors relative group">
                        <i class="fas fa-home mr-2"></i>
                        <span>Trang chủ</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-200 group-hover:w-full transition-all"></span>
                    </a>
                </li>
                <li>
                    <a href="/products"
                        class="flex items-center py-4 hover:text-blue-200 transition-colors relative group">
                        <i class="fas fa-box mr-2"></i>
                        <span>Sản phẩm</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-200 group-hover:w-full transition-all"></span>
                    </a>
                </li>
                <li>
                    <a href="/about"
                        class="flex items-center py-4 hover:text-blue-200 transition-colors relative group">
                        <i class="fas fa-info-circle mr-2"></i>
                        <span>Giới thiệu</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-200 group-hover:w-full transition-all"></span>
                    </a>
                </li>
                <li>
                    <a href="/contact"
                        class="flex items-center py-4 hover:text-blue-200 transition-colors relative group">
                        <i class="fas fa-phone mr-2"></i>
                        <span>Liên hệ</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-200 group-hover:w-full transition-all"></span>
                    </a>
                </li>
            </ul>

            <!-- Promotion Badge -->
            <div class="hidden lg:flex items-center">
                <span
                    class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-medium animate-pulse shadow-lg">
                    <i class="fas fa-fire mr-2"></i>
                    Khuyến mãi HOT
                </span>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu"
    class="lg:hidden bg-gradient-to-r from-blue-600 to-purple-700 text-white border-t border-blue-500 hidden">
    <div class="container mx-auto px-4 py-4 space-y-1">
        <a href="/" class="flex items-center py-3 px-3 hover:bg-white/10 rounded-lg transition-colors">
            <i class="fas fa-home mr-3 w-5"></i>
            <span>Trang chủ</span>
        </a>
        <a href="/products" class="flex items-center py-3 px-3 hover:bg-white/10 rounded-lg transition-colors">
            <i class="fas fa-box mr-3 w-5"></i>
            <span>Sản phẩm</span>
        </a>
        <a href="/about" class="flex items-center py-3 px-3 hover:bg-white/10 rounded-lg transition-colors">
            <i class="fas fa-info-circle mr-3 w-5"></i>
            <span>Giới thiệu</span>
        </a>
        <a href="/contact" class="flex items-center py-3 px-3 hover:bg-white/10 rounded-lg transition-colors">
            <i class="fas fa-phone mr-3 w-5"></i>
            <span>Liên hệ</span>
        </a>
        <div class="pt-3 border-t border-white/20">
            <span
                class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-medium inline-flex items-center">
                <i class="fas fa-fire mr-2"></i>
                Khuyến mãi HOT
            </span>
        </div>
    </div>
</div>

<script>
    // Toggle Categories Dropdown
    function toggleCategories() {
        const dropdown = document.getElementById('categories-dropdown');
        const icon = document.getElementById('categories-icon');

        dropdown.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }

    // Toggle Mobile Menu
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function (e) {
        const categoriesDropdown = document.getElementById('categories-dropdown');
        const mobileMenu = document.getElementById('mobile-menu');

        // Close categories dropdown
        if (!e.target.closest('[onclick="toggleCategories()"]') && !e.target.closest('#categories-dropdown')) {
            categoriesDropdown.classList.add('hidden');
            document.getElementById('categories-icon').classList.remove('rotate-180');
        }

        // Close mobile menu
        if (!e.target.closest('[onclick="toggleMobileMenu()"]') && !e.target.closest('#mobile-menu')) {
            mobileMenu.classList.add('hidden');
        }
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Search functionality
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();
        const searchTerm = this.querySelector('input').value.trim();
        if (searchTerm) {
            window.location.href = `/search?q=${encodeURIComponent(searchTerm)}`;
        }
    });
</script>

<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

    /* Custom animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #categories-dropdown:not(.hidden) {
        animation: fadeInDown 0.2s ease-out;
    }

    #mobile-menu:not(.hidden) {
        animation: fadeInDown 0.3s ease-out;
    }

    /* Smooth transitions */
    * {
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }

    /* Custom gradient hover effects */
    .hover-gradient:hover {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
    }
</style>