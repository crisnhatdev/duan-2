<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="card">
            <div class="cart-header card-header-primary">
                <h4 class="pb-4">Danh Sách Bình Luận</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Đơn Giá</th>
                            <th scope="col">Mã Sản Phẩm</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($billDetails as $key => $bill) {
                        ?>
                            <tr>
                                <td><?= $bill['stt'] ?></td>
                                <td><?= $bill['soluong'] ?></td>
                                <td><?= $bill['dongia'] ?></td>
                                <td><?= $bill['masp'] ?></td>
                                <td><?= $bill['tensp'] ?></td>
                                <td><a href="<?php echo 'admin.php?act=delBillDetails&masp=' . $bill['masp'] . ''; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>