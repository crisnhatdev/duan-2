<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="card">
            <div class="cart-header card-header-primary">
                <h4 class="pb-4">Quản Lí Banner</h4>
                <?php if (isset($_GET['id'])) {
                ?>
                    <form method="post" action="admin.php?act=updateBanner" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <div class="form-group" id="tieude">
                                <label for="exampleFormControlSelect1"> Tiêu đề </label>
                                <input type="text" class="form-control" name="tieudebn" required="required" value="<?= $getBannerId['tieude'] ?>">
                            </div>
                            <div class="form-group" id="noidung">
                                <label for="exampleFormControlTextarea1">Nội dung </label>
                                <textarea class="form-control" id="noidungbn" rows="2" name="noidungbn" required="required"><?= $getBannerId['noidung'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"> Hình Ảnh</label>
                                    <input type="file" class="custom-file-input" name="hinhanhbn">
                                    <input type="hidden" name="mabn" value="<?= $getBannerId['mabn'] ?>">
                                    <?php
                                    if ($getBannerId['hinhanhbn'] != "") {
                                        echo '<img src="../public/img/banner/' . $getBannerId['hinhanhbn'] . '" width="100px">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" name="add" value="Cập Nhật Banner">
                            </div>
                        </div>
                    </form>
                <?php } else { ?>
                    <form method="post" action="admin.php?act=addBanner" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <div class="form-group" id="tenlh">
                                <label for="exampleFormControlSelect1"> Tiêu đề </label>
                                <input type="text" class="form-control mt-2" name="tieudebn" required="required">
                            </div>
                            <div class="form-group" id="noidung">
                                <label for="exampleFormControlTextarea1">Nội dung </label>
                                <textarea class="form-control" id="noidungbn" rows="2" name="noidungbn" required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="file" class="custom-file-input" name="hinhanhbn" required="required" value="Hình Ảnh">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" name="add" value="Thêm Banner">
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
                            <th scope="col">Tiêu Đề </th>
                            <th scope="col">Nội Dung</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Kích Hoạt</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($getBannerList as $key => $banner) {
                        ?>
                            <tr>
                                <td><?= $banner['mabn'] ?></td>
                                <td><?= $banner['tieude'] ?></td>
                                <td><?= $banner['noidung'] ?></td>
                                <td><img src="../public/img/banner/<?= $banner['hinhanhbn'] ?>" style="width:75px;height:75px;border-radius:50%"></td>
                                <td>
                                    <?php
                                    if ($banner['active'] == 1) {
                                    ?>
                                        <a href="admin.php?act=activeBanner&mabn=<?= $banner['mabn'] ?>">ON</a>
                                    <?php
                                    } else { ?>
                                        <a href="admin.php?act=deActiveBanner&mabn=<?= $banner['mabn'] ?>">OFF</a>
                                    <?php }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo 'admin.php?act=updateBannerKey&id=' . $banner['mabn'] . ''; ?>" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a><br>
                                    <a href="<?php echo 'admin.php?act=delBanner&mabn=' . $banner['mabn'] . ''; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
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