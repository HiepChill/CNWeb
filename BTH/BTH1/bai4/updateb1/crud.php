<?php
// File JSON lưu danh sách hoa
include('db.php');


// Xử lý thêm mới hoặc cập nhật hoa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $imagePath = $_POST['image_path'] ?? '';

    // Xử lý upload ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = 'images/';
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    // Thêm mới hoặc sửa thông tin hoa
    $sql = "INSERT INTO flowers (name, description, image_path) VALUES ('$name', '$description', '$imagePath')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?admin.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

//Xử lý sửa hoa


// Xử lý xóa hoa
if (isset($_GET['name'])) {

    $name = urldecode($_GET['name']);
    $sql = "DELETE FROM flowers WHERE name='$name'";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
