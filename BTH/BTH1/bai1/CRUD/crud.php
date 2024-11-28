<?php
// File JSON lưu danh sách hoa
$flowersFile = 'data/data.json';

// Kiểm tra và tải danh sách hoa từ file JSON
if (file_exists($flowersFile)) {
    $flowers = json_decode(file_get_contents($flowersFile), true);
} else {
    $flowers = [];
}

// Xử lý thêm mới hoặc cập nhật hoa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $imagePath = '';

    // Xử lý upload ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = 'images/';
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    // Thêm mới hoặc sửa thông tin hoa
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        // Sửa thông tin hoa
        $id = (int)$_POST['id'];
        $flowers[$id]['name'] = $name;
        $flowers[$id]['description'] = $description;
        if ($imagePath) {
            $flowers[$id]['image'] = $imagePath;
        }
    } else {
        // Thêm mới hoa
        $flowers[] = [
            'name' => $name,
            'description' => $description,
            'image' => $imagePath
        ];
    }

    // Lưu danh sách hoa vào file JSON
    file_put_contents($flowersFile, json_encode($flowers));
    header("Location: admin.php");
    exit();
}

// Xử lý xóa hoa
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if (isset($flowers[$id])) {
        unset($flowers[$id]);
        file_put_contents($flowersFile, json_encode($flowers));
    }
    header("Location: admin.php");
    exit();
}
