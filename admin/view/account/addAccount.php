<div class="container" style="margin-top:110px">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>Thêm Tài Khoản</h3>
        </div>
        <div class="card-body">
            <?php
                
            ?>
            <form method="post" action="admin.php?act=addAcc" enctype="multipart/form-data" style="padding: 30px 0">
                <div class="form-row mb-3">
                    <div class="col">
                        <input type="text" class="border-danger form-control  mb-3" placeholder="Tên Khách Hàng" name="tenkh" required="">
                    </div>
                    <div class="col">
                        <input type="text" class="border-danger form-control " placeholder="Email" name="email" required="">
                    </div>
                    <div class="col">
                        <input type="text" class="border-danger form-control " placeholder="Số Điện Thoại" name="phone" required="">
                    </div>

                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <input type="text" class="border-danger form-control  mb-3" placeholder="Mật Khẩu" name="password" required="">
                    </div>
                    <div class="col">
                        <input type="text" class="border-danger form-control " placeholder="Địa Chỉ" name="address" required="">
                    </div>

                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <select class="custom-select border-danger" id="inputGroupSelect01" name="gioitinh" required="">
                            <option selected value="Giới Tính" disabled="">Giới Tính</option>
                            <option value="nam">Nam</option>
                            <option value="nu">Nữ</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="custom-select border-danger  mb-3" id="inputGroupSelect01" name="phanquyen" required="">
                            <option selected disabled="">Phân Quyền</option>
                            <option value="boss">Boss</option>
                            <option value="admin">Admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>

                </div>
                <div class="form-row mb-3">
                    <div class="col d-flex bd-highlight flex-row-reverse justify-content-around">
                        <label class="" for="exampleFormControlFile1">Hình ảnh</label>
                        <input type="file" class="custom-file-input p-2" name="hinhanhkh" required="required">
                    </div>
                    <div class="col">
                        <textarea name="gioithieu" id="" cols="71" rows="3" placeholder="Giới Thiệu Bản Thân"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <input type="submit" class="btn btn-danger" name="submit" value="Thêm Tài Khoản">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>