<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="card">
            <div class="cart-header card-header-primary">
                <h4 class="pb-4">Danh Sách Bình Luận</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table text-center" id="myBill">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên Khách Hàng</th>
                            <th scope="col">SĐT</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ngày Mua</th>
                            <th scope="col">Tổng Tiền</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($billLimit as $key => $bill) {
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
                                    <?php

                                    if ($bill['trangthai'] == 1) {
                                        echo 'Đã xác nhận';
                                    } else if ($bill['trangthai'] == 2) {
                                        echo 'Đã lấy hàng';
                                    } else if ($bill['trangthai'] == 3) {
                                        echo 'Đã giao hàng';
                                    } else if ($bill['trangthai'] == 4) {
                                        echo 'Khách hủy';
                                    } else if ($bill['trangthai'] == 5) {
                                        echo 'Hệ thống hủy';
                                    } else {
                                        echo 'Chờ xác nhận';
                                    }
                                    ?>
                                </td>
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
                <div class="col-lg-12">
                    <div class="pageination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center"  data-mahd='<?= (isset($_GET['mahd'])) ? $_GET['mahd'] : 0 ?>'>
                                <?php
                                $pages = $crCata->calcPage($allBill, 5);
                                for ($i = 0; $i < $pages; $i++) {
                                    $active = ($i === 0) ? " active" : "";
                                    echo "<li class='page-item-bill" . $active . "'><a class='page-link' href='#/'>" . ($i + 1) . "</a></li>";
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>