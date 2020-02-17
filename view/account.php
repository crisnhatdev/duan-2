<?php require_once '../view/header.php'; ?>
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
        <div class="row align-items-center" style="position: relative;">
            <div class="col-lg-6 col-md-6 register-form">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>ĐĂNG KÝ! <br>
                            Hãy đăng ký ngay bây giờ</h3>
                        <form class="row contact_form" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="username" name="username" value=""
                                       placeholder="Tên đăng nhập hoặc số điện thoại" required="">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                       placeholder="Mật khẩu" required="">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password_2" name="password_2" value=""
                                       placeholder="Nhập lại mật khẩu" required="">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name" value=""
                                       placeholder="Họ và tên" required="">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="email" class="form-control" id="email" name="email" value=""
                                       placeholder="Email" required="">
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
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="username-login" name="username" value=""
                                       placeholder="Tên đăng nhập hoặc số điện thoại">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password-login" name="password" value=""
                                       placeholder="Mật khẩu">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Ghi nhớ đăng nhập</label>
                                </div>
                                <button type="submit" value="submit" class="btn_3">
                                    Đăng nhập
                                </button>
                                <a class="lost_pass" href="#">Quên mật khẩu?</a>
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

<?php require_once '../view/footer.php'; ?>
