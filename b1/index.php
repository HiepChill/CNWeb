<?php
include("data.php");
include("add_product_model.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php
        include("header.php")
        ?>
    </div>
    <div class="container mt-5">
        <a href="#" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Thêm mới</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td class="text-center">
                            <a href="" class="btn btn-primary">
                                <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="" method="post" onsubmit="return confirm('Bạn có muốn xóa sản phẩm này?');">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form action="" method="post" class="mt-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" required>
                </div>
                <div class="col-md-4">
                    <input type="number" name="price" class="form-control" placeholder="Giá sản phẩm" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
                </div>
            </div>
        </form>

        <div class="text-center">
            <?php
            include_once 'footer.php';
            ?>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b1fec188f7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>