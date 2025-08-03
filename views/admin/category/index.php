<main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <!-- Page Title -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Quản Lý Category</h2>
        <p class="text-gray-600 mt-1">Danh sách các danh mục sản phẩm</p>
    </div>

    <!-- Add Category Button -->
    <div class="mb-4">
        <a href="/?act=addCategory"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            + Thêm Category
        </a>
    </div>

    <!-- Category Table -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tên Category
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Thao Tác
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?= $category['id'] ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <?= htmlspecialchars($category['name']) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="?act=editCategory&id=<?= $category['id'] ?>"
                                    class="text-blue-600 hover:text-blue-900 mr-3 transition-colors">Sửa</a>
                                <a href="?act=deleteCategory&id=<?= $category['id'] ?>"
                                    class="text-red-600 hover:text-red-900 transition-colors">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                            Không có danh mục nào.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>

            </tbody>
        </table>
    </div>


</main>