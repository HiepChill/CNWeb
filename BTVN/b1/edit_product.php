<?php foreach ($products as $product): ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="editProductModal<?php echo $product['id']; ?>" tabindex="-1" aria-labelledby="editProductModalLabel<?php echo $product['id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel<?php echo $product['id']; ?>">Sửa sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="edit_product_id" value="<?php echo $product['id']; ?>">
                        <div class="mb-3">
                            <label for="editProductName<?php echo $product['id']; ?>" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="editProductName<?php echo $product['id']; ?>" name="edit_product_name" value="<?php echo $product['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editProductPrice<?php echo $product['id']; ?>" class="form-label">Giá thành</label>
                            <input type="number" class="form-control" id="editProductPrice<?php echo $product['id']; ?>" name="edit_product_price" value="<?php echo $product['price']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>