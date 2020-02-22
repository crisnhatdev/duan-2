<div class="container" style="margin-top:100px">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>Danh Sách Sản Phẩm</h3>
            <a href="admin.php?act=add_product_key" class="btn btn-primary">Thêm Sản Phẩm</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table text-center" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Danh Mục</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá </th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($proList as $key => $pro) {
                    ?>
                        <tr>
                            <td><?= $pro['masp'] ?></td>
                            <td><?= $pro['tenlh'] ?></td>
                            <td><?= $pro['tensp'] ?></td>
                            <td><img src="../public/img/newproduct/upload/<?= $pro['hinhanhsp'] ?>" style="width:75px;height:75px;border-radius:50%"></td>
                            <td><?= $pro['gia'] ?></td>
                            <td><?= $pro['mota'] ?></td>
                            <td><?= $pro['malh'] ?></td>
                            <td>
                                <a href="<?php echo 'admin.php?act=update_product_key&id=' . $pro['masp'] . ''; ?>" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a><br>
                                <a href="<?php echo 'admin.php?act=delete_product&id=' . $pro['masp'] . ''; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
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
