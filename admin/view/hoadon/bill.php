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
                            <th scope="col">ID</th>
                            <th scope="col">Tên Khách Hàng</th>
                            <th scope="col">SĐT</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ngày Mua</th>
                            <th scope="col">Tổng Tiền</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allBill as $key => $bill) {
                        ?>
                            <tr>
                                <td><?= $bill['mahd'] ?></td>
                                <td><?= $bill['tenkh'] ?></td>
                                <td><?= $bill['sdt'] ?></td>
                                <td><?= $bill['diachi'] ?></td>
                                <td><?= $bill['email'] ?></td>
                                <td><?= $bill['ngaymua'] ?></td>
                                <td><?= $bill['tongtien'] ?></td>
                                <td>
                                    <a href="<?php echo 'admin.php?act=billDetails&mahd=' . $bill['mahd'] . ''; ?>" class="btn btn-danger btn-sm">Chi Tiết</a>
                                    <a href="<?php echo 'admin.php?act=delBills&mahd=' . $bill['mahd'] . ''; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
                                </td>
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