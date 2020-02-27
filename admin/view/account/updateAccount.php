<div class="container" style="margin-top:110px">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>Cập Nhật Tài Khoản</h3>
        </div>
        <div class="card-body">
            <form method="post" action="admin.php?act=updateAcc" enctype="multipart/form-data" style="padding: 30px 0">
                <div class="form-row mb-3">
                    <div class="col">
                        <input type="text" readonly class="border-danger form-control text-success  mb-3" value="<?= $getAccById['tenkh'] ?>" placeholder="Tên Khách Hàng" name="tenkh" required="">
                    </div>
                    <div class="col">
                        <input type="text" class="border-danger form-control " value="<?= $getAccById['email'] ?>" placeholder="Email" name="email" required="">
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <input type="text" class="border-danger form-control " value="<?= $getAccById['diachi'] ?>" placeholder="Địa Chỉ" name="address" required="">
                    </div>
                    <div class="col">
                        <select class="custom-select border-danger  mb-3" id="inputGroupSelect01" name="phanquyen" required="required">
                            <?php
                                foreach ($getAcc as $key => $acc) {
                                    echo '<option value="' .$acc['phanquyen']. '"';
                                    if($acc['phanquyen'] == $getAccById['phanquyen']){
                                        echo 'selected';
                                    }
                                    echo '>' . $acc['phanquyen'].
                                    '</option>';
                                }
                            ?>
                            <!-- <option selected disabled="">Phân Quyền</option>
                            <option value="boss">Boss</option>
                            <option value="admin">Admin</option>
                            <option value="user">user</option> -->
                        </select>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <input type="text" class="border-danger form-control " value="<?= $getAccById['sdt'] ?>" placeholder="Số Điện Thoại" name="phone" required="">
                    </div>
                    <div class="col d-flex bd-highlight flex-row-reverse justify-content-center">
                        <label class="" for="exampleFormControlFile1">Hình ảnh</label>
                        <input type="file" class="custom-file-input p-2" name="hinhanhkh">
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <textarea name="gioithieu" id="" cols="55" rows="3" placeholder="Giới Thiệu Bản Thân"></textarea>
                    </div>
                    <div class="col">
                        <img src="../public/img/account/<?= $getAccById['hinhanhkh'] ?>" alt="" style="width:80px">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="hidden" name="matk" value="<?= $getAccById['matk'] ?>">
                        <input type="submit" class="btn btn-danger" name="submit" value="Cập Nhật Tài Khoản">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>