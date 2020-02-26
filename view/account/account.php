<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Tài khoản</h2>
                        <!--<p>Home <span>-</span> Tracking Order</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->


<!--================login_part Area =================-->
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center login_relative">
            <div class="col-lg-6 col-md-6 register-form">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>ĐĂNG KÝ! <br>Hãy đăng ký ngay bây giờ</h3>
                        <div class="validate_field none success_field text-success"></div>
                        <div class="validate_field none error_field text-danger"></div>
                        <form class="row contact_form user-ajax" action="../view/account/handleUser.php" method="post" data-type="register" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control" id="email" name="email" value=""
                                       placeholder="Email (*)" required="">
                                <div class="validate_field error_email text-danger"></div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                       placeholder="Mật khẩu (*)" required="">
                                <div class="validate_field error_password text-danger"></div>

                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password_2" name="password_2" value=""
                                       placeholder="Nhập lại mật khẩu (*)" required="">
                                <div class="validate_field error_password_2 text-danger"></div>

                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name" value=""
                                       placeholder="Họ và tên (*)" required="">
                                <div class="validate_field error_name text-danger"></div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" maxlength="10" class="form-control" id="phone" name="phone" value=""
                                       placeholder="Số điện thoại (*)" required="">
                                <div class="validate_field error_phone text-danger"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                    Đăng Ký
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 login-form">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Chào mừng bạn quay trở lại ! <br>
                            Hãy đăng nhập ngay nào</h3>
                        <?php
                        $user = @$crAcc->get_user_by('email', $_GET['email']);
                        if ($user['kichhoat'] === '0') {
                            $crAcc->update_user_by('kichhoat', 1, 'email', $user['email']);
                            echo '<p class="text-center text-success">Bạn đã kích hoạt tài khoản thành công.</p>';
                        }
                        ?>
                        <div class="validate_field none success_field_lg text-success"></div>
                        <div class="validate_field none error_field_lg text-danger"></div>
                        <form class="row contact_form user-ajax" action="../view/account/handleUser.php" method="post" data-type="login" novalidate="novalidate">

                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control" id="email_lg" name="email_lg" value="<?= ($crAcc->checkCookie('user-email')) ? $_COOKIE['user-email'] : '' ?>"
                                       placeholder="Email (*)">
                                <div class="validate_field error_email_lg text-danger"></div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="psw_lg" name="psw_lg" value=""
                                       placeholder="Mật khẩu (*)">
                                <div class="validate_field error_psw_lg text-danger"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="rememberme" <?= ($crAcc->checkCookie('user-email')) ? 'checked' : '' ?>>
                                    <label for="f-option">Ghi nhớ đăng nhập</label>
                                </div>
                                <input type="hidden" name="location" value="<?= (isset($_GET['location'])) ? '?' . explode('?', $_GET['location'])[1] : '.' ?>">
                                <button type="submit" value="submit" class="btn_3">
                                    Đăng nhập
                                </button>
                                <a class="lost_pass" href=".?act=acc-forgot">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center register_part_text">
                    <div class="login_part_text_iner">
                        <h2>Bạn là khách hàng mới?</h2>
                        <p>Hãy gia nhập vào đại gia đình nội thất của chúng tôi. Chúng tôi sẽ đem đến những sự mới mẻ cho ngôi nhà của bạn</p>
                        <a href="#/" class="btn_3 register-btn">Tạo tài khoản</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Bạn đã quay trở lại?</h2>
                        <p>Hãy đăng nhập ngay bây giờ để cập nhật những xu hướng nội thất mới nhất</p>
                        <a href="#/" class="btn_3 login-btn">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->
