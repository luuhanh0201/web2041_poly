<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="./app.css">
<?php
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';
require_once './controllers/CategoryController.php';


// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/CategoryModel.php';


// Route
$act = $_GET['act'] ?? '/';


match ($act) {
  '/' => (new ProductController())->Home(),


  'category' => (new CategoryController())->index(),
  'addCategory' => (new CategoryController())->create(),
  'editCategory' => (new CategoryController())->edit(),
  'deleteCategory' => (new CategoryController())->delete(),
 

  default => "404 - Page Not Found",
};

?>