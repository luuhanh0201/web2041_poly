<h2 class="text-2xl font-bold text-gray-800 mb-6">Danh sách danh mục</h2>

<a href="<?= BASE_URL ?>/?act=category-create"
   class="inline-block mb-4 bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded">
   + Thêm danh mục
</a>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100 text-gray-700 font-semibold">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Tên danh mục</th>
                <th class="px-4 py-2 border">Mô tả</th>
                <th class="px-4 py-2 border">Danh mục cha</th>
                <th class="px-4 py-2 border">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $cat): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border text-center"><?= $cat['category_id'] ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($cat['name']) ?></td>
                        <td class="px-4 py-2 border"><?= htmlspecialchars($cat['description']) ?></td>
                        <td class="px-4 py-2 border text-center"><?= $cat['parent_id'] ?? 'Không có' ?></td>
                        <td class="px-4 py-2 border text-center">
                            <a href="<?= BASE_URL ?>/?act=category-edit&id=<?= $cat['category_id'] ?>"
                               class="text-blue-600 hover:underline mr-2">Sửa</a>
                            <a href="<?= BASE_URL ?>/?act=category-delete&id=<?= $cat['category_id'] ?>"
                               onclick="return confirm('Xóa?')"
                               class="text-red-600 hover:underline">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">Không có danh mục nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
