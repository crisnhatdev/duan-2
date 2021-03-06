<?php
$newList = array_filter($proList, function($pro) {
    return $pro['khuyenmai'] == 0;
}); //sp mới nhất không sale
$bestList = array_filter($proList, function($pro) {
    return $pro['dacbiet'] == 1 && $pro['khuyenmai'] == 0;
}); //sp đặc biệt không sale
$saleList = array_filter($proList, function($pro) {
    return $pro['khuyenmai'] > 0;
}); //sp sale
?>
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">
                    <?php
                    foreach ($bannerList as $banner) {
                        ?>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1><?= $banner['tieude'] ?></h1>
                                            <p><?= $banner['noidung'] ?></p>
                                            <!--<a href="#" class="btn_2">Mua Ngay</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="../public/img/banner/<?= $banner['hinhanhbn'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_tittle text-center">
                    <h2>Không Gian Nội Thất</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <?php
            foreach ($cataList as $key => $cata) {
                ?>
                <div class="col-lg-<?= ($key === 0 || $key === 3) ? 7 : 5 ?> col-sm-6">
                    <div style="background-image: url('../public/img/catalog/<?= $cata['hinhanhlh'] ?>'); background-size: cover; background-position: center;" class="single_feature_post_text">
                        <p>Hàng cao cấp</p>
                        <h3><?= $cata['tenlh'] ?></h3>
                        <a href=".?act=catalog&malh=<?= $cata['malh'] ?>" class="feature_btn">Khám phá ngay <i class="fas fa-play"></i></a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->

<!-- product_list start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Mẫu mã mới nhất</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    foreach ($newList as $pro) {
                        ?>
                        <div class="single_product_item">
                            <a href=".?act=product&masp=<?= $pro['masp'] ?>">
                                <img src="../public/img/newproduct/upload/<?= $pro['hinhanhsp'] ?>" alt="">
                            </a>
                            <div class="single_product_text">
                                <h4><?= $pro['tensp'] ?></h4>
                                <h3><?= number_format($pro['gia'], 0, '', '.') ?> VNĐ</h3>
                                <input type="hidden" name="masp" value="<?= $pro['masp'] ?>"/>
                                <a href="#" class="add_cart add_to_cart_button">+ Thêm vào giỏ<i class="ti-heart"></i></a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part start-->

<!-- awesome_shop start-->
<section class="our_offer section_padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6">
                <div class="offer_img">
                    <img src="../public/img/offer_img.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="offer_text">
                    <h2>Tuần lễ khuyễn mãi lên đến 60%</h2>
                    <div class="date_countdown">
                        <div id="timer">
                            <div id="days" class="date"></div>
                            <div id="hours" class="date"></div>
                            <div id="minutes" class="date"></div>
                            <div id="seconds" class="date"></div>
                        </div>
                    </div>
                    <div class="validate_field none success_subscribe text-success"></div>
                    <div class="validate_field none error_subscribe text-danger"></div>
                    <form class="input-group subscribe-form-ajax form-group">
                        <input type="email" class="form-control validate-form-control" placeholder="Nhập email của bạn"
                               aria-label="Nhập email của bạn" aria-describedby="basic-addon3" name="subscribe-mail" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Nhập email của bạn'" required="">
                        <div class="input-group-append">
                            <button value="submit" type="submit" class="input-group-text btn_2" id="basic-addon3">Đăng ký ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- awesome_shop part start-->

<!-- product_list part start-->
<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Mặt hàng đặc biệt</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    foreach ($bestList as $pro) {
                        ?>
                        <div class="single_product_item">
                            <a href=".?act=product&masp=<?= $pro['masp'] ?>">
                                <img src="../public/img/newproduct/upload/<?= $pro['hinhanhsp'] ?>" alt="">
                            </a>
                            <div class="single_product_text">
                                <h4><?= $pro['tensp'] ?></h4>
                                <h3><?= number_format($pro['gia'], 0, '', '.') ?> VNĐ</h3>
                                <input type="hidden" name="masp" value="<?= $pro['masp'] ?>"/>
                                <a href="#" class="add_cart add_to_cart_button">+ Thêm vào giỏ<i class="ti-heart"></i></a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->

<!-- subscribe_area part start-->
<section class="subscribe_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="subscribe_area_text text-center">
                    <h5>Cập nhật tin tức</h5>
                    <h2>Hãy đăng ký nhận tin tức về các hoạt động sắp tới của chúng tôi </h2>
                    <div class="validate_field none success_subscribe text-success"></div>
                    <div class="validate_field none error_subscribe text-danger"></div>
                    <form class="input-group subscribe-form-ajax form-group">
                        <input type="email" class="form-control validate-form-control" placeholder="Nhập email của bạn"
                               aria-label="Nhập email của bạn" aria-describedby="basic-addon2" name="subscribe-mail" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Nhập email của bạn'" required="">
                        <div class="input-group-append">
                            <button value="submit" type="submit" class="input-group-text btn_2" id="basic-addon2">Đăng ký ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->

<!-- sale_product_list part start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Mặt hàng khuyến mãi</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    foreach ($saleList as $pro) {
                        ?>
                        <div class="single_product_item">
                            <a href=".?act=product&masp=<?= $pro['masp'] ?>">
                                <img src="../public/img/newproduct/upload/<?= $pro['hinhanhsp'] ?>" alt="">
                            </a>
                            <div class="single_product_text">
                                <h4><?= $pro['tensp'] ?></h4>
                                <del><?= number_format($pro['gia'], 0, '', '.') ?> VNĐ</del> - <b><?= $pro['khuyenmai'] ?>%</b>
                                <h3><?= number_format($crPro->checkKm($pro['gia'], $pro['khuyenmai']), 0, '', '.') ?> VNĐ</h3>
                                <input type="hidden" name="masp" value="<?= $pro['masp'] ?>"/>
                                <a href="#" class="add_cart add_to_cart_button">+ Thêm vào giỏ<i class="ti-heart"></i></a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- sale_product_list part end-->

<!-- subscribe_area part start-->
<section class="client_logo padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_1.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_2.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_4.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_5.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_1.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_2.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_3.png" alt="">
                </div>
                <div class="single_client_logo">
                    <img src="../public/img/client_logo/client_logo_4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->
