<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Cập Nhật Tài khoản</h2>
                        <!--<p>Home <span>-</span> Tracking Order</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->


<!--================login_part Area =================-->
<section class="login_part">
    <div class="container">
        <div class="row align-items-center login_relative">
            <div class="col-lg-12 col-md-12 ">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Cập nhật thông tin của bạn ngay bây giờ! </h3>
                        <!--<div class="validate_field none success_field text-success"></div>-->
                        <!--<div class="validate_field none error_field text-danger"></div>-->
                        <form class="row contact_form user-ajax" enctype="multipart/form-data" action="../view/account/handleUser.php" method="post" data-type="update" novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>"
                                       placeholder="Email" readonly="">
                                <!--<div class="validate_field error_email text-danger"></div>-->
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" maxlength="10" class="form-control" id="phone" name="phone" value="<?= $user['sdt'] ?>"
                                       placeholder="Số điện thoại" readonly="">
                                <!--<div class="validate_field error_phone text-danger"></div>-->
                            </div>
                            <div class="col-md-6 form-group p_star validate-input" data-validate="Bạn không được bỏ trống hoặc sử dụng ký tự đặc biệt">
                                <input type="text" class="form-control validate-form-control" id="name" name="name" value="<?= $user['tenkh'] ?>"
                                       placeholder="Họ và tên">
                                <!--<div class="validate_field error_name text-danger"></div>-->
                            </div>
                            <div class="col-md-6 form-group p_star validate-input" data-validate="Bạn không được sử dụng ký tự đặc biệt">
                                <input type="text" data-type="optional" class="form-control validate-form-control" id="address" name="address" value="<?= $user['diachi'] ?>"
                                       placeholder="Địa chỉ" required="">
                                <!--<div class="validate_field error_address text-danger"></div>-->
                            </div>
                            <div class="col-md-6 form-group p_star validate-input" data-validate="Bạn không được sử dụng ký tự đặc biệt">
                                <input type="text" data-type="optional" class="form-control validate-form-control" id="introduce" name="introduce" value="<?= $user['gioithieu'] ?>"
                                       placeholder="Giới thiệu bản thân">
                                <!--<div class="validate_field error_introduce text-danger"></div>-->
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="file" class="form-control" id="picture" name="picture" value=""
                                       placeholder="Hình ảnh cá nhân">
                                <!--<div class="validate_field error_picture text-danger"></div>-->
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                    Cập nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->
