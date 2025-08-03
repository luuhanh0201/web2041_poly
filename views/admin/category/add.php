<div class="bg-white rounded-lg shadow-xl max-w-md w-full">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Thêm Category Mới</h3>
    </div>
    <form class="p-6" method="post">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Tên danh mục <span class="text-red-500">*</span>
            </label>
            <input type="text"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Nhập tên category" name="name">
            <?php if (!empty($error)): ?>
                <p class="text-red-500 text-sm mt-1"><?= $error ?></p>
            <?php endif; ?>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="?act=category"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Hủy
            </a>
            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700">
                Thêm Category
            </button>
        </div>
    </form>
</div>