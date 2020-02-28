<div class="container" style="margin-top:100px">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="admin.php?act=addBlog" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh mục bài viết</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="malbv" required="required">
                                <?php
                                foreach ($newsCataList as $danhmucbv) {
                                    echo '<option value="' . $danhmucbv['malbv'] . '">' . $danhmucbv['tenlbv'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tài khoản</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="matk" required="required">
                                <?php
                                foreach ($getTaikhoan as $taikhoan) {
                                    echo '<option value="' . $taikhoan['matk'] . '">' . $taikhoan['tenkh'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ngày đăng</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="ngaydang">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" name="tenbv" required="required">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <div class="custom-file d-flex -">
                                <label class="custom-file-label" for="exampleFormControlFile1">Hình ảnh</label>
                                <input type="file" class="custom-file-input" name="hinhanhbv" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mô tả bài viết</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="motabv" required="required"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlTextarea1">Nội dung bài viết</label>
                        <div class="form-group">
                            <textarea class="form-control" id="noidungbv" rows="3" name="noidungbv" required="required"></textarea>
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
                <input type="submit" class="btn btn-danger" name="add" value="Thêm bài viết">
            </form>
        </div>
    </div>
</div>
</div>
</div>