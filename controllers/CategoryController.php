<?php
require_once './models/CategoryModel.php';
require_once './views/layout/headerAdminLayout.php';

class CategoryController
{
    public $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
    }


    public function index()
    {
        $categories = $this->modelCategory->getAllCategories();
        require_once './views/admin/category/index.php';
    }


    public function create()
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? null;

            if (trim($name) === '') {
                $error = "Vui lòng nhập tên danh mục!";
            } else {
                $this->modelCategory->insertCategory(name: $name);
                header('Location: ?act=category');
                exit;
            }
        }
        require_once './views/admin/category/add.php';

    }
    public function edit()
    {
        $category = $this->modelCategory->getCategoryById($_GET['id']);
        $error = null;
        require_once './views/admin/category/edit.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? null;
            if (trim($name) === '') {
                $error = "Vui lòng nhập tên danh mục!";
            } else {
                $this->modelCategory->updateCategory(
                    $_POST['id'],
                    $_POST['name'],
                );
                header('Location: ?act=category');
            }

        }
        exit;
    }


    public function update()
    {

    }

    public function delete()
    {
        $this->modelCategory->deleteCategory($_GET['id']);
        header('Location: ?act=category');
    }
}
