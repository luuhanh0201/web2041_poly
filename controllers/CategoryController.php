<?php
require_once './models/CategoryModel.php';

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
        require_once './views/category/index.php';
    }


    public function create()
    {
        require_once './views/category/create.php';
    }


    public function store()
    {
        $this->modelCategory->insertCategory(
            $_POST['name'],
            $_POST['description'],
            $_POST['parent_id'] !== '' ? $_POST['parent_id'] : null
        );
        header('Location: http://localhost/shop_fpoly/?act=category');
    }


    public function edit()
    {
        $category = $this->modelCategory->getCategoryById($_GET['id']);
        require_once './views/category/edit.php';
    }


    public function update()
    {
        $this->modelCategory->updateCategory(
            $_POST['id'],
            $_POST['name'],
            $_POST['description'],
            $_POST['parent_id'] !== '' ? $_POST['parent_id'] : null

        );
        header('Location: ?act=category');
    }

    public function delete()
    {
        $this->modelCategory->deleteCategory($_GET['id']);
        header('Location: ?act=category');
    }
}
