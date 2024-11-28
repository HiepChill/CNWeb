<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>

        <?php
        // Đường dẫn tới file CSV
        $filename = "data/dssv.csv";

        // Kiểm tra file tồn tại
        if (!file_exists($filename)) {
            echo "<div class='alert alert-danger'>Không tìm thấy file <strong>students.csv</strong>.</div>";
            exit;
        }

        // Mở file và đọc dữ liệu
        $sinhvien = [];
        if (($handle = fopen($filename, "r")) !== FALSE) {
            // Đọc tiêu đề
            $headers = fgetcsv($handle, 1000, ",");

            // Đọc từng dòng và lưu vào mảng
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $sinhvien[] = array_combine($headers, $data);
            }
            fclose($handle);
        }

        // Kiểm tra nếu không có dữ liệu
        if (empty($sinhvien)) {
            echo "<div class='alert alert-warning'>Không có dữ liệu sinh viên.</div>";
        } else {
            // Hiển thị dữ liệu
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead class='table-dark'>";
            echo "<tr>";
            foreach ($headers as $header) {
                echo "<th>{$header}</th>";
            }
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($sinhvien as $sv) {
                echo "<tr>";
                foreach ($sv as $value) {
                    echo "<td>{$value}</td>";
                }
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>