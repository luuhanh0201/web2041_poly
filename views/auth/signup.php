<div class="min-h-screen flex items-center justify-center p-2">
    <div class="w-full max-w-md">

        <div class="text-center mb-2">
            <div
                class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl mb-4 shadow-lg">
                <i class="fas fa-store text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                Shop FPoly</h1>
            <p class="text-gray-500 text-sm">Tạo tài khoản mới</p>
        </div>


        <?php if (isset($_SESSION['success'])): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-2 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span><?= $_SESSION['success'] ?></span>
                </div>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="?act=signup"
            class="bg-white/80 backdrop-blur-sm p-4 rounded-2xl shadow-xl border border-white/20" id="signupForm">
            <h2 class="text-3xl font-bold mb-4 text-center text-gray-800">Đăng ký tài khoản</h2>

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700 text-sm">Họ và tên</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input type="text" name="name" required
                        class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white"
                        placeholder="Nhập họ và tên của bạn">
                </div>
            </div>

            <div class="mb-4">
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

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700 text-sm">Mật khẩu</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" required id="password"
                        class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white"
                        placeholder="Ít nhất 6 ký tự">
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-gray-700 text-sm">Xác nhận mật khẩu</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="confirm_password" required id="confirmPassword"
                        class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 focus:bg-white"
                        placeholder="Nhập lại mật khẩu">
                </div>

            </div>


            <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span><?= $_SESSION['error'] ?></span>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 font-semibold text-lg shadow-lg hover:shadow-xl">
                <i class="fas fa-user-plus mr-2"></i>
                Đăng ký tài khoản
            </button>

            <div class="flex items-center my-6">
                <div class="flex-1 border-t border-gray-200"></div>
                <span class="px-4 text-gray-500 text-sm">hoặc</span>
                <div class="flex-1 border-t border-gray-200"></div>
            </div>


            <div class="text-center mt-4">
                <p class="text-gray-600">
                    Đã có tài khoản?
                    <a href="?act=signin" class="text-blue-600 hover:text-blue-800 font-semibold">Đăng nhập ngay</a>
                </p>
            </div>
        </form>


    </div>
</div>