<h2 class="text-2xl font-bold text-gray-800 mb-6">Thêm danh mục mới</h2>

<form action="<?= BASE_URL ?>/?act=category-store" method="post"
    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-xl">
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Tên danh mục:</label>
        <input type="text" name="name" required
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Mô tả:</label>
        <textarea name="description"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:border-blue-500"></textarea>
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2">Danh mục cha (nếu có):</label>
        <input type="number" name="parent_id" placeholder="ID danh mục cha"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring focus:border-blue-500">
    </div>

    <div class="flex items-center justify-between">
        <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
            Lưu
        </button>
        <a href="?act=category" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
            Hủy
        </a>
    </div>
</form>