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



switch ($act) {
  case 'category':
    (new CategoryController())->index();
    break;
  case 'category-create':
    (new CategoryController())->create();
    break;
  case 'category-store':
    (new CategoryController())->store();
    break;
  case 'category-delete':
    (new CategoryController())->delete();
    break;
  case 'category-edit':
    (new CategoryController())->edit();
    break;
  case 'category-update':
    (new CategoryController())->update();
    break;
  // Thêm các hành động khác nếu có
}



