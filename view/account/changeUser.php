<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Đổi Mật Khẩu</h2>
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
                        <h3>Mật khẩu của bạn chưa đủ mạnh?<br> Hãy thay đổi nó! </h3>
                        <div class="validate_field success_field text-success" style="position: static" ></div>
                        <div class="validate_field error_field text-danger" style="position: static" ></div>
                        <form class="row contact_form user-ajax" enctype="multipart/form-data" action="../view/account/handleUser.php" method="post" data-type="change-pass" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="old_pass" name="old_pass" placeholder="Mật khẩu cũ (*)" required="">
                                <div class="validate_field error_old_pass text-danger"></div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Mật khẩu mới (*)" required="">
                                <div class="validate_field error_new_pass text-danger"></div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="new_pass_2" name="new_pass_2" placeholder="Nhập lại mật khẩu mới (*)" required="">
                                <div class="validate_field error_new_pass_2 text-danger"></div>
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
