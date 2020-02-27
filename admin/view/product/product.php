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
                        <th scope="col">Giá </th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col">Mã Loại</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // print_r($proList);
                    foreach ($proListLimit as $key => $pro) {
                    ?>
                        <tr id="catalog_page">
                            <td><?= $pro['masp'] ?></td>
                            <td><?= $pro['tenlh'] ?></td>
                            <td><?= $pro['tensp'] ?></td>
                            <td><?= $pro['gia'] ?></td>
                            <td><img src="../public/img/newproduct/upload/<?= $pro['hinhanhsp'] ?>" style="width:75px;height:75px;border-radius:50%"></td>
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
            <div class="col-lg-12">
                <div class="pageination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" data-malh = '<?= (isset($_GET['malh'])) ? $_GET['malh'] : 0 ?>' data-mams="<?= (isset($_GET['mams'])) ? $_GET['mams'] : 0 ?>" data-mamh="<?= (isset($_GET['mamh'])) ? $_GET['mamh'] : 0 ?>">
                            <?php
                            $pages = $crCata->calcPage($proList, 5);
                            for ($i = 0; $i < $pages; $i++) {
                                $active = ($i === 0) ? " active" : "";
                                echo "<li class='page-item" . $active . "'><a class='page-link' href='#/'>" . ($i + 1) . "</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>