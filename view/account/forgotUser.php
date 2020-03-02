<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Tìm lại mật khẩu</h2>
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
                        <h3>Quên mật khẩu? <br>Mong chóng tìm lại nhanh nào</h3>
                        <!--<div class="validate_field none success_field text-success"></div>-->
                        <div class="validate_field none error_field text-danger"></div>
                        <form class="row contact_form user-ajax" action="../view/account/handleUser.php" method="post" data-type="forgot" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star validate-input" data-validate="Email không đúng định dạng">
                                 <input type="email" class="form-control validate-form-control" id="email" name="email" value=""
                                   placeholder="Email (*)" required="">
                                <div class="validate_field error_email text-danger"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                    TÌm Mật Khẩu
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
