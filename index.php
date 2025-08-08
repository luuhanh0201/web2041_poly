<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
  integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./app.css">
<?php
session_start();

// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';
require_once './controllers/CategoryController.php';
require_once './controllers/AuthController.php';


// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/CategoryModel.php';
require_once './models/AuthModel.php';


// Route
$act = $_GET['act'] ?? '/';


match ($act) {
  '/' => (new ProductController())->index(),

  // Auths
  'signin' => (new AuthController())->signIn(),
  'signup' => (new AuthController())->signUp(),
  'logout' => (new AuthController())->logout(),

  // Cate
  'category' => (new CategoryController())->index(),
  'addCategory' => (new CategoryController())->create(),
  'editCategory' => (new CategoryController())->edit(),
  'deleteCategory' => (new CategoryController())->delete(),

  // Products
  'products' => (new ProductController())->index(),
  'addProduct' => (new ProductController())->create(),
  'editProduct' => (new ProductController())->edit(),
  'deleteProduct' => (new ProductController())->delete(),


  default => include 'views/errors/404.php',
};

?>