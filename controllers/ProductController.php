<?php
require_once './models/CategoryModel.php';
class ProductController
{
    public $ProductModel;

    public function __construct()
    {
        $this->ProductModel = new ProductModel();
        require_once './views/layout/headerAdminLayout.php';

    }

    public function index()
    {
        $products = $this->ProductModel->getAllProduct();
        require_once './views/admin/product/index.php';
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $idCategory = $_POST['idCategory'] ?? null;
            $description = $_POST['description'] ?? '';

            $image = '';
            if (!empty($_FILES['image']['name'])) {
                $uploadDir = 'uploads/';
                $image = $uploadDir . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
            }

            $this->ProductModel->insertProduct($name, $image, $price, $idCategory, $description);
            header('Location: ?act=products');
            exit;
        }
        include_once "./views/admin/product/add.php";
    }
    public function delete()
    {
        $this->ProductModel->deleteProduct($_GET['id']);
        header('Location: ?act=products');
    }

    public function edit(): void
    {
        $id = $_GET['id'] ?? 0;
        $product = $this->ProductModel->getProductById(id: $id);
        $error = null;
        $imageName = $product['image'];
        if (!empty($_FILES['image']['name'])) {
            $uploadDir = 'uploads/';
            $image = $uploadDir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
            $imageName = $image;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (trim(string: $_POST['name']) === '' || trim(string: $_POST['price']) === '') {
                $error = "Vui lòng nhập đầy đủ tên và giá sản phẩm";
            }
            if (!is_numeric($_POST['price']) || $_POST['price'] < 0) {
                $error = "Giá sản phẩm phải là số dương";
            }
            if (!$error) {
                $this->ProductModel->updateProduct(
                    id: $id,
                    name: trim($_POST['name']),
                    price: (float) $_POST['price'],
                    image: $imageName,
                    idCategory: (int) $_POST['idCategory'],
                    description: trim($_POST['description'])
                );

                header('Location: ?act=products');
                exit;
            }
        }
        require_once './views/admin/product/edit.php';
    }
}
