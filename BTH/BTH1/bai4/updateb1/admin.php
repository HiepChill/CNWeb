<?php
include('crud.php');
include('data.php');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh sách hoa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        form {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Quản lý các loài hoa</h1>

    <!-- Form Thêm/Sửa -->
    <form action="admin.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="flower-id">
        <label for="name">Tên Hoa:</label><br>
        <input type="text" name="name" id="flower-name" required><br><br>

        <label for="description">Mô Tả:</label><br>
        <textarea name="description" id="flower-description" rows="4" required></textarea><br><br>

        <label for="image">Ảnh Hoa:</label><br>
        <input type="file" name="image" id="flower-image"><br><br>

        <button type="submit">Lưu</button>
    </form>

    <!-- Danh sách hoa -->
    <table>
        <thead>
            <tr>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th>Ảnh</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $index => $flower): ?>
                <tr>
                    <td><?php echo htmlspecialchars($flower['name']); ?></td>
                    <td><?php echo htmlspecialchars($flower['description']); ?></td>
                    <td>
                        <?php if (!empty($flower['image_path'])): ?>
                            <img src="<?php echo $flower['image_path']; ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>" width="100">
                        <?php endif; ?>
                    </td>
                    <td>
                        <button onclick="editFlower(<?php echo urlencode($flower['name']); ?>)">Sửa</button>
                        <a href="admin.php?delete=<?php echo urlencode($flower['name']); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        // Hàm để chỉnh sửa hoa
        function editFlower(id) {
            const flowers = <?php echo json_encode($flowers); ?>;
            const flower = flowers[id];
            document.getElementById('flower-id').value = id;
            document.getElementById('flower-name').value = flower.name;
            document.getElementById('flower-description').value = flower.description;
        }
    </script>
</body>

</html>