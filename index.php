<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
  integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./app.css">
<?php
session_start();


require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

require_once './controllers/ProductController.php';
require_once './controllers/CategoryController.php';
require_once './controllers/AuthController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/CategoryModel.php';
require_once './models/AuthModel.php';

function isLoggedIn()
{
  return isset($_SESSION['user']);
}

function isAdmin()
{
  return isLoggedIn() && isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin';
}

function toSignin()
{
  header('Location: index.php?act=signin');
  exit();
}

// Route
$act = $_GET['act'] ?? '/';

match ($act) {
  // Public route
  '/' => (new ProductController())->Home(),
  'products' => (new ProductController())->index(),

  'signin' => (new AuthController())->signIn(),
  'signup' => (new AuthController())->signUp(),
  'logout' => (new AuthController())->logout(),



  // Private route
  'admin/dashboard' => isAdmin() ? include 'views/admin/index.php' : toSignin(),
  'admin/users' => isAdmin() ? (new AuthController())->showUsers() : toSignin(),

  'admin/category' => isAdmin() ? (new CategoryController())->index() : toSignin(),
  'admin/addCategory' => isAdmin() ? (new CategoryController())->create() : toSignin(),
  'admin/editCategory' => isAdmin() ? (new CategoryController())->edit() : toSignin(),
  'admin/deleteCategory' => isAdmin() ? (new CategoryController())->delete() : toSignin(),

  'admin/products' => isAdmin() ? (new ProductController())->index() : toSignin(),
  'admin/addProduct' => isAdmin() ? (new ProductController())->create() : toSignin(),
  'admin/editProduct' => isAdmin() ? (new ProductController())->edit() : toSignin(),
  'admin/deleteProduct' => isAdmin() ? (new ProductController())->delete() : toSignin(),

  // 404
  default => include 'views/errors/404.php',
};

?>