<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* CSS cho navigation bar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <a href="?page=guest">Guest</a>
        <a href="?page=admin">Admin</a>
    </nav>

    <!-- Nội dung chính -->
    <div class="container">
        <?php
        // Kiểm tra trang được chọn
        $page = isset($_GET['page']) ? $_GET['page'] : 'guest';

        // Hiển thị nội dung dựa trên trang
        if ($page === 'guest') {
            include 'guest.php';
        } elseif ($page === 'admin') {
            include 'admin.php';
        } else {
            echo "<p>Trang không tồn tại.</p>";
        }
        ?>
    </div>
</body>

</html>