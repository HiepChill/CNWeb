<?php
// Tự động load các controller và model
require_once 'controllers/ProductController.php';
require_once 'models/Product.php';

// Load file routes
$routes = require 'config/routes.php';

// Lấy thông tin action từ URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Kiểm tra action trong routes
if (isset($routes[$action])) {
    $controllerName = $routes[$action]['controller'];
    $methodName = $routes[$action]['action'];

    // Khởi tạo controller và gọi phương thức
    $controller = new $controllerName();
    $controller->$methodName();
} else {
    echo "404 - Hành động không hợp lệ!";
}
