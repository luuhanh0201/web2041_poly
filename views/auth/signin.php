<div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8 flex items-center">
            <div>
                <a href="?act=/"
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl mb-4 shadow-lg">
                    <i class="fas fa-store text-white text-2xl"></i>
                </a>
                <h1
                    class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Shop FPoly</h1>
                <p class="text-gray-500 text-sm">Đăng nhập vào tài khoản của bạn</p>
            </div>
        </div>
        <form method="POST" action="?act=signin"
            class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl border border-white/20">
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Đăng nhập</h2>
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-gray-700 text-sm">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" name="email" required
                        class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white"
                        placeholder="example@email.com">
                </div>
            </div>
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-gray-700 text-sm">Mật khẩu</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" required id="password"
                        class="w-full pl-10 pr-12 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white"
                        placeholder="••••••••">
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors" id="toggleIcon"></i>
                    </button>
                </div>
            </div>


            <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span><?= $_SESSION['error'] ?></span>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <div class="flex items-center justify-between mb-6">
                <a href="?act=forgot-password" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Quên mật
                    khẩu?</a>
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Đăng nhập
            </button>

            <div class="flex items-center my-6">
                <div class="flex-1 border-t border-gray-200"></div>
                <span class="px-4 text-gray-500 text-sm">hoặc</span>
                <div class="flex-1 border-t border-gray-200"></div>
            </div>


            <div class="text-center mt-8">
                <p class="text-gray-600">
                    Chưa có tài khoản?
                    <a href="?act=signup" class="text-blue-600 hover:text-blue-800 font-semibold">Đăng ký ngay</a>
                </p>
            </div>
        </form>


    </div>
</div>