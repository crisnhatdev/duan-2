<div class="container" style="margin-top:100px">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="admin.php?act=updateBlog" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh mục bài viết</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="malbv" required="required">
                                <?php
                                foreach ($newsCataList as $danhmucbv) {
                                    echo '<option value="' . $danhmucbv['malbv'] . '" ';
                                    if ($danhmucbv['malbv'] == $getBlogId['malbv']) {
                                        echo 'selected';
                                    }
                                    echo '>' . $danhmucbv['tenlbv'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tài khoản</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="matk" required="required">
                                <?php
                                foreach ($dstaikhoan as $taikhoan) {
                                    echo '<option value="' . $taikhoan['matk'] . '" ';
                                    if ($taikhoan['matk'] == $getBlogId['matk']) {
                                        echo 'selected';
                                    }
                                    echo '>' . $taikhoan['tenkh'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ngày đăng</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="ngaydang" value="<?php echo date('Y-m-d', strtotime($getBlogId['ngaydang'])); ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Lượt xem</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="luotxem" value="<?php echo $getBlogId['luotxem']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" name="tenbv" value="<?php echo $getBlogId['tenbv']; ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mô tả bài viết</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="motabv" required="required"><?php echo $getBlogId['motabv']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleFormControlFile1">Hình ảnh</label>
                                <input type="file" class="custom-file-input" name="hinhanhbv">
                            </div>
                            <?php
                            if ($getBlogId['hinhanhbv'] != "") {
                                echo '<img src="../public/img/blog/upload/' . $getBlogId['hinhanhbv'] . '" width="80px">';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group col-md-9">
                    <label for="exampleFormControlTextarea1">Nội dung bài viết</label>
                        <div class="form-group">
                            <textarea class="form-control" id="noidungbv" rows="3" name="noidungbv"><?php echo $getBlogId['noidungbv']; ?></textarea>
                            <script>
                                CKEDITOR.replace('noidungbv', {
                                    filebrowserBrowseUrl: '../admin/layout/ckfinder/ckfinder.html',
                                    filebrowserImageBrowseUrl: '../admin/layout/ckfinder/ckfinder.html?type=Images',
                                    filebrowserFlashBrowseUrl: '../admin/layout/ckfinder/ckfinder.html?type=Flash',
                                    filebrowserUploadUrl: '../admin/layout/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                    filebrowserImageUploadUrl: '../admin/layout/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                    filebrowserFlashUploadUrl: '../admin/layout/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-danger" name="update" value="Cập nhật bài viết">
                <input type="hidden" name="mabv" value="<?= $_GET['id'] ?>">
            </form>
        </div>
    </div>
</div>