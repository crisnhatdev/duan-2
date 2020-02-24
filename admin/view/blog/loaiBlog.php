<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="card">
            <div class="cart-header card-header-primary">
                <h4 class="pb-4">Danh Mục Bài Viết</h4>
                <?php if (isset($_GET['id'])) {
                ?>
                    <form method="post" action="admin.php?act=updateCataBlog" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <div class="form-group" id="tenlbv">
                                <label for="exampleFormControlSelect1"> Tiêu đề danh mục</label>
                                <input type="text" class="form-control" name="tenlbv" required="required" value="<?= $getCataNewsId['tenlbv'] ?>">
                            </div>
                            <!-- <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"> Tiêu đề danh mục</label>
                                    <input type="file" class="custom-file-input" name="hinhanhlbv">
                                    <
                                    <?php
                                    // if ($getCataNewsId['hinhanhlbv'] != "") {
                                    //     echo '<img src="../public/img/blog/upload' . $cataListById['hinhanhlh'] . '" width="100px">';
                                    // }
                                    ?>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <input type="hidden" name="malbv" value="<?= $getCataNewsId['malbv'] ?>">
                                <input type="submit" class="btn btn-danger" name="add" value="Cập Nhật danh mục">
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <form method="post" action="admin.php?act=addCataBlog" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <div class="form-group" id="tenlbv">
                                <label for="exampleFormControlSelect1"> Tiêu đề Danh Mục</label>
                                <input type="text" class="form-control mt-2" name="tenlbv" required="required">
                            </div>
                            <!-- <div class="form-group">
                                <div class="form-group">
                                    <input type="file" class="custom-file-input" name="hinhanhlbv" required="required" value="Hình Ảnh">
                                </div>
                            </div> -->
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
                            <!-- <th scope="col">Hình ảnh</th> -->
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($newsCataList as $key => $news) {
                        ?>
                            <tr>
                                <td><?= $news['malbv'] ?></td>
                                <td><?= $news['tenlbv'] ?></td>
                                <!-- <td><img src="../public/img/blog/upload/<?= $news['hinhanh'] ?>" style="width:75px;height:75px;border-radius:50%"></td> -->
                                <td>
                                    <a href="<?php echo 'admin.php?act=updateCataBlogKey&id=' . $news['malbv'] . ''; ?>" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a><br>
                                    <a href="<?php echo 'admin.php?act=delCataBlog&malbv=' . $news['malbv'] . ''; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
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