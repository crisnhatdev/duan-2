<div class="container" style="margin-top:110px">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>Cập Nhật Sản Phẩm</h3>
        </div>
        <div class="card-body">
            <form action="admin.php?act=update_product" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlSelect1">Danh mục</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="malh" required="required">
                                <?php
                                foreach ($cataList as $cata) {
                                    echo '<option value="' . $cata['malh'] . '"';
                                    if ($proId['malh'] == $cata['malh']) {
                                      echo ' selected';
                                    }
                                    echo '>' . $cata['tenlh'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="tensp" required="required"  value="<?= $proId['tensp'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlTextarea1">Mô tả</label>
                            <textarea class="form-control" id="mota" rows="3"name="mota" required><?php echo  $proId['mota']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Giá</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="gia" required="required" value="<?= $proId['gia'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Lượt xem</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="luotxem" value="<?= $proId['luotxem'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Đặc biệt</label>
                            <input type="number" class="form-control" name="dacbiet" value="<?= $proId['dacbiet'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Khuyến mãi</label>
                            <input type="number" class="form-control" name="khuyenmai" value="<?= $proId['khuyenmai'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Mã Màu Sắc</label>
                            <input type="number" class="form-control" name="mamausac" value="<?= $proId['mams'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Mã Mặt Hàng</label>
                            <input type="number" class="form-control" name="mamathang" value="<?= $proId['mamh'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Ngày nhập</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="ngaynhap" value="<?php echo date('Y-m-d', strtotime($proId['ngaynhap'])); ?>">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <label class="custom-file-label" for="exampleFormControlFile1">Hình ảnh</label>
                                <input type="file" class="custom-file-input" name="hinhanhsp">
                                <?php
                                if ($proId['hinhanhsp'] != "") {
                                    echo '<img src="../public/img/newproduct/upload/' . $proId['hinhanhsp'] . '" width="100px">';
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <input type="hidden" name="masp" value="<?= $_GET['id'] ?>">
                <input type="submit" class="btn btn-danger" name="add" value="Cập Nhật">
            </form>
        </div>
    </div>
</div>