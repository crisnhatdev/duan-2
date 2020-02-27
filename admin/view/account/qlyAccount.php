<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="card">
            <div class="cart-header card-header-primary">
                <h4 class="pb-4">Danh Sách Tài Khoản</h4>
                <a href="admin.php?act=add_Acc_Key" class="btn btn-primary">Thêm Tài Khoản</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên Khách Hàng</th>
                            <th scope="col">Giới Thiệu</th>
                            <th scope="col">Số Điện Thoại</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Email</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Phân Quyền</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($getAcc as $key => $acc) {
                        ?>
                            <tr>
                                <td><?= $acc['matk'] ?></td>
                                <td><?= $acc['tenkh'] ?></td>
                                <td><?= $acc['gioithieu'] ?></td>
                                <td><?= $acc['sdt'] ?></td>
                                <td><?= $acc['diachi'] ?></td>
                                <td><?= $acc['email'] ?></td>
                                <td><img src="../public/img/account/<?= $acc['hinhanhkh'] ?>" style="width:75px;height:75px;border-radius:50%"></td>
                                <td><?= $acc['phanquyen'] ?></td>
                                <td><a href="<?php echo 'admin.php?act=updateAccKey&matk=' . $acc['matk'] . ''; ?>" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a><br>
                                    <a href="<?php echo 'admin.php?act=delAcc&matk=' . $acc['matk'] . ''; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>