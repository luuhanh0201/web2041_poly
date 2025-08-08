<?php
require_once './models/CategoryModel.php';
$categoryModel = new CategoryModel();
$categories = $categoryModel->getAllCategories();
?>
<div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-auto">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Sửa sản phẩm</h3>
    </div>

    <form class="p-6 space-y-4" method="post" enctype="multipart/form-data">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tên sản phẩm <span
                    class="text-red-500">*</span></label>
            <input value="<?= htmlspecialchars($product['name']) ?>" type="text" name="name"
                placeholder="Nhập tên sản phẩm"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Giá (VNĐ)</label>
            <input value="<?= htmlspecialchars($product['price']) ?>" type="number" name="price" placeholder="Nhập giá"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Hình ảnh</label>

            <?php if (!empty($product['image'])): ?>
                <div class="flex justify-center mb-3">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="Ảnh sản phẩm"
                        class="max-w-xs h-auto rounded shadow">
                </div>
            <?php endif; ?>

            <input type="file" name="image"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Danh mục</label>
            <select name="idCategory"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= (isset($product['idCategory']) && $cat['id'] == $product['idCategory']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Mô tả</label>
            <textarea name="description" rows="3"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Mô tả sản phẩm..."><?= htmlspecialchars($product['description']) ?></textarea>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="?act=products"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Hủy
            </a>
            <button type="submit"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700">
                Sửa sản phẩm
            </button>
        </div>
    </form>
</div>