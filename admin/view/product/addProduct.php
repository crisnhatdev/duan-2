<div class="container" style="margin-top:110px">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>Thêm Sản Phẩm</h3>
        </div>
        <div class="card-body">
            <form action="admin.php?act=add_product" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlSelect1">Danh mục</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="malh" required="required">
                                <?php
                                foreach ($cataList as $cata) {
                                    echo '<option value="' . $cata['malh'] . '">' . $cata['tenlh'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="form-control-label" for="exampleFormControlInput1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="tensp" required="required">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlTextarea1">Mô tả</label>
                            <textarea class="form-control" id="mota" rows="3" name="mota" required></textarea>
                        </div>
                        <!-- <script>
                            CKEDITOR.replace('mota', {
                                filebrowserBrowseUrl: 'admin/ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl: 'admin/ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl: 'admin/ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl: 'admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserImageUploadUrl: 'admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: 'admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                            });
                        </script> -->
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Giá</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="gia" required="required">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Lượt xem</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="luotxem">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Đặc biệt</label>
                            <input type="number" class="form-control" name="dacbiet">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Khuyến mãi</label>
                            <input type="number" class="form-control" name="khuyenmai">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Mã Màu Sắc</label>
                            <input type="number" class="form-control" name="mamausac">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Mã Mặt Hàng</label>
                            <input type="number" class="form-control" name="mamathang">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Ngày nhập</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="ngaynhap">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleFormControlFile1">Hình ảnh</label>
                                <input type="file" class="custom-file-input" name="hinhanhsp" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-danger" name="add" value="Thêm sản phẩm">
            </form>
        </div>
    </div>
</div>