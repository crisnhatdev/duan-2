<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="card">
            <div class="cart-header card-header-primary">
                <h4 class="pb-4">Danh Mục Sản Phẩm</h4>
                <?php if (isset($_GET['id'])) {
                ?>
                    <form method="post" action="admin.php?act=update_cata" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <div class="form-group" id="tenlh">
                                <label for="exampleFormControlSelect1"> Tiêu đề danh mục</label>
                                <input type="text" class="form-control" name="tenlh" required="required" value="<?= $cataListById['tenlh'] ?>">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"> Tiêu đề danh mục</label>
                                    <input type="file" class="custom-file-input" name="hinhanhlh">
                                    <input type="hidden" name="malh" value="<?= $cataListById['malh'] ?>">
                                    <?php
                                    if ($cataListById['hinhanhlh'] != "") {
                                        echo '<img src="../public/img/catalog/' . $cataListById['hinhanhlh'] . '" width="100px">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" name="add" value="Cập Nhật danh mục">
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <form method="post" action="admin.php?act=add_cata" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <div class="form-group" id="tenlh">
                                <label for="exampleFormControlSelect1"> Tiêu đề danh mục</label>
                                <input type="text" class="form-control mt-2" name="tenlh" required="required">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="file" class="custom-file-input" name="hinhanhlh" required="required" value="Hình Ảnh">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" name="add" value="Thêm danh mục">
                            </div>
                        </div>
                    </form>

                <?php } ?>
            </div>
            <div class="card-body table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên loại</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cataList as $key => $cata) {
                        ?>
                            <tr>
                                <td><?= $cata['malh'] ?></td>
                                <td><?= $cata['tenlh'] ?></td>
                                <td><img src="../public/img/catalog/<?= $cata['hinhanhlh'] ?>" style="width:75px;height:75px;border-radius:50%"></td>
                                <td>
                                    <a href="<?php echo 'admin.php?act=update_cata_form&id=' . $cata['malh'] . ''; ?>" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a><br>
                                    <a href="<?php echo 'admin.php?act=delete_cata&malh=' . $cata['malh'] . ''; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center pt-3">
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