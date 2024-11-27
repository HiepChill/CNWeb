<?php
$products = [
    ["name" => "Coca", "price" => 8000],
    ["name" => "Coca", "price" => 8000],
    ["name" => "Coca", "price" => 8000],
    ["name" => "Coca", "price" => 8000],
];


// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['price'])) {
//     $newProductName = htmlspecialchars($_POST['name']);
//     $newProductPrice = (float)$_POST['price'];

//     // Tạo id mới cho sản phẩm
//     // $newProductId = count($products) > 0 ? end($products)['id'] + 1 : 1;

//     // Thêm sản phẩm vào danh sách
//     $products[] = [
//         'name' => $newProductName,
//         'price' => $newProductPrice,
//     ];
// }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $newProductName = $_POST['name'];
    $newProductPrice = $_POST['price'];

    $products[] = [
        'name' => $newProductName,
        'price' => $newProductPrice
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_product'])) {
        $productIdToDelete = $_POST['delete_product'];

        foreach ($products as $index => $product) {
            if ($product['$index'] == $productIdToDelete) {
                unset($products[$index]);
                break;
            }
        }
        $products = array_values($products);
    }
}



// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
//     $productIdToDelete = $_POST['delete_product'];

//     // Xóa sản phẩm khỏi danh sách
//     foreach ($products as $index => $product) {
//         if ($product['id'] == $productIdToDelete) {
//             unset($products[$index]); // Xóa sản phẩm
//             break;
//         }
//     }

//     // Reset lại chỉ số mảng (nếu cần)
//     $products = array_values($products);
// }


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_POST['edit_product_id'])) {
//         $editProductId = $_POST['edit_product_id'];
//         $editProductName = $_POST['edit_product_name'];
//         $editProductPrice = $_POST['edit_product_price'];

//         // Cập nhật thông tin sản phẩm
//         foreach ($products as &$product) {
//             if ($product['id'] == $editProductId) {
//                 $product['name'] = $editProductName;
//                 $product['price'] = $editProductPrice;
//                 break;
//             }
//         }
//     }
// }
