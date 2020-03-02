<?= ($crAcc->checkSs('cart')) ? '' : header('location: .') ?>
<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Thanh Toán</h2>
                        <!--<p>Home <span>-</span> Shop Single</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->
<!--================Checkout Area =================-->
<section class="checkout_area padding_top">
    <div class="container">
        <?php
        if (!$crAcc->checkSs('user')) {
            ?>
            <div class="returning_customer">
                <div class="check_title">
                    <h2>
                        Bạn là khách hàng cũ?
                        <a data-toggle="collapse" href="#loginForm" >Nhấn vào đây để đăng nhập</a>
                    </h2>
                </div>
                <p>
                </p>
                <div class="validate_field none error_field_lg text-danger"></div>
                <form class="row contact_form user-ajax collapse" id="loginForm" action="../view/account/handleUser.php" method="post" data-type="login" novalidate="novalidate">
                    <div class="col-md-12 form-group p_star validate-input" data-validate="Email không đúng định dạng">
                        <input type="email" class="form-control validate-form-control" id="email_lg" name="email_lg" value="<?= ($crAcc->checkCookie('user-email')) ? $_COOKIE['user-email'] : '' ?>" placeholder="Email (*)">
                    </div>
                    <div class="col-md-12 form-group p_star validate-input" data-validate="Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)">
                        <input type="password" class="form-control validate-form-control" id="psw_lg" name="psw_lg" value="" placeholder="Mật khẩu (*)">
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="creat_account d-flex align-items-center">
                            <input type="checkbox" id="f-option" name="rememberme" <?= ($crAcc->checkCookie('user-email')) ? 'checked' : '' ?>>
                            <label for="f-option">Ghi nhớ đăng nhập</label>
                        </div>
                        <a class="lost_pass text-right" href=".?act=acc-forgot">Quên mật khẩu?</a>
                        <input type="hidden" name="location" value=".?act=checkout">
                        <button type="submit" value="submit" class="btn_3">
                            Đăng nhập
                        </button>
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
        <!--        <div class="cupon_area">
                    <div class="check_title">
                        <h2>
                            Have a coupon?
                            <a href="#">Click here to enter your code</a>
                        </h2>
                    </div>
                    <input type="text" placeholder="Enter coupon code" />
                    <a class="tp_btn" href="#">Apply Coupon</a>
                </div>-->
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-7">
                    <h3>Thông Tin Mua Hàng</h3>
                    <form id="order_form" class="row contact_form" novalidate="novalidate">
                        <div class="col-md-12 form-group validate-input" data-validate="Bạn không được để trống hoặc dùng ký tự đặc biệt">
                            <input type="text" class="form-control validate-form-control" id="name" name="name" value="<?= $user['tenkh'] ?>" placeholder="Tên của bạn (*)" <?= ($crAcc->checkSs('user')) ? 'readonly' : '' ?>/>
                        </div>
                        <div class="col-md-12 form-group validate-input" data-validate="Bạn không được để trống hoặc dùng ký tự đặc biệt">
                            <input type="text" class="form-control validate-form-control" maxlength="10" id="phone" name="phone" value="<?= $user['sdt'] ?>" placeholder="Số điện thoại (*)" <?= ($crAcc->checkSs('user')) ? 'readonly' : '' ?>/>
                        </div>
                        <div class="col-md-12 form-group validate-input" data-validate="Bạn không được để trống hoặc dùng ký tự đặc biệt">
                            <input type="text" class="form-control validate-form-control" id="address" name="address" value="<?= $user['diachi'] ?>" placeholder="Địa chỉ (*)" <?= ($user['diachi'] !== "") ? '' : '' ?>/>
                        </div>
                        <div class="col-md-12 form-group validate-input" data-validate="Bạn không được dùng ký tự đặc biệt">
                            <textarea class="form-control validate-form-control" data-type="optional" id="note" name="note" rows="5" placeholder="Ghi chú"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="order_box">
                        <h2>Danh Sách Sản Phẩm</h2>
                        <ul class="list">
                            <li>
                                <a href="#/">Tên SP
                                    <span>Tổng</span>
                                </a>
                            </li>
                            <?php
                            foreach ($cartList as $key => $item) {
                                ?>
                                <li>
                                    <a href=".?act=product&masp=<?= $item['masp'] ?>"><?= $item['tensp'] ?>
                                        <span class="middle">x <?= $item['soluong'] ?></span>
                                        <span class="last"><?= number_format($crCart->checkKm($item['gia'] * $item['soluong'], $item['khuyenmai']), 0, '', '.') ?> VNĐ</span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <ul class="list list_2">
                            <li>
                                <a href="#/">Tạm Tính
                                    <span><?= number_format($crCart->tongtien(), '0', '', '.') ?> VNĐ</span>
                                </a>
                            </li>
                            <li>
                                <a href="#/">Shipping
                                    <span><?= ($crCart->tongtien() > 1000000) ? 'Free Ship' : number_format(30000, '0', '', '.') . ' VNĐ' ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="#/">Tổng Cộng
                                    <span><?= number_format($crCart->tongtien(), '0', '', '.') ?> VNĐ</span>
                                </a>
                            </li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector" checked=""/>
                                <label for="f-option5">Ship COD</label>
                                <div class="check"></div>
                            </div>
                            <p>
                                Nhận hàng và thanh toán tại địa điểm giao hàng
                            </p>
                        </div>
                        <div class="creat_account">
                        </div>
                        <a class="btn_3" href="#/" id="place_order" data-type="<?= ($crAcc->checkSs('user') ? 'checkout' : 'checkout-no-lg') ?>">Thanh Toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->


