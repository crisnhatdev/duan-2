<?php
$user = @get_user_by('email', $_GET['email']);
if (bcrypt_verify($_GET['token'], $user['token'])) {
    ?>
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Đổi Mật Khẩu Mới</h2>
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
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-12 col-md-12 login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Mau chóng thay đổi mật khẩu mới và tiếp tục mua sắm nào!</h3>
                            <div class="validate_field none error_field text-danger"></div>
                            <form class="row contact_form user-ajax" enctype="multipart/form-data" action="../view/account/handleUser.php" method="post" data-type="change-pass-forgot" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star validate-input" data-validate="Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)">
                                    <input type="password" class="form-control validate-form-control" id="new_pass" name="new_pass" placeholder="Mật khẩu mới (*)" required="">
                                </div>
                                <div class="col-md-12 form-group p_star validate-input" data-validate="Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)">
                                    <input type="password" class="form-control validate-form-control" id="new_pass_2" name="new_pass_2" placeholder="Nhập lại mật khẩu mới (*)" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="hidden" name="token" value="<?= $_GET['token'] ?>"/>
                                    <input type="hidden" name="email" value="<?= $_GET['email'] ?>"/>
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
    <?php
} else {
    header('location: .');
}
?>