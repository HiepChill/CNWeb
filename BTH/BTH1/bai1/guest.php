<?php
// Đường dẫn đến file JSON
$flowersFile = 'data/data.json';

// Đọc dữ liệu từ file JSON
$flowers = [];
if (file_exists($flowersFile)) {
    $flowers = json_decode(file_get_contents($flowersFile), true);
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Các Loài Hoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .flower {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .flower img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .flower h2 {
            margin: 10px 0;
            color: #333;
        }

        .flower p {
            margin: 10px 0;
            color: #555;
        }
    </style>
</head>

<body>
    <h1>Danh Sách Các Loài Hoa</h1>

    <!-- Hiển thị danh sách hoa -->
    <?php if (!empty($flowers)): ?>
        <?php foreach ($flowers as $flower): ?>
            <div class="flower">
                <h2><?php echo htmlspecialchars($flower['name']); ?></h2>
                <?php if (!empty($flower['image'])): ?>
                    <img src="<?php echo htmlspecialchars($flower['image']); ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>">
                <?php endif; ?>
                <p><?php echo htmlspecialchars($flower['description']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Chưa có dữ liệu về các loài hoa.</p>
    <?php endif; ?>
</body>

</html>