
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2><?= $productDt['tensp'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div data-thumb="../public/img/newproduct/upload/<?= $productDt['hinhanhsp'] ?>">
                            <img src="../public/img/newproduct/upload/<?= $productDt['hinhanhsp'] ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text">
                    <!--<h5>previous <span>|</span> next</h5>-->
                    <h3><?= $productDt['tensp'] ?></h3>
                    <?= ($productDt['khuyenmai'] > 0) ? "<del style='color: #000'>" . number_format($productDt['gia'], 0, '', '.') . "VNĐ</del> - <b>" . $productDt['khuyenmai'] . "%</b>" : '' ?>
                    <h2><?= number_format($crPro->checkKm($productDt['gia'], $productDt['khuyenmai']), 0, '', '.') ?> VNĐ</h2>
                    <ul class="list">
                        <li>
                            <a class="active" href=".?act=catalog&malh=<?= $productDt['malh'] ?>">
                                <span>Khu </span> : <?= $productDt['tenlh'] ?></a>
                        </li>
                        <li>
                            <a href="#"> <span>Mặt Hàng</span> : <?= $productDt['tenmh'] ?></a>
                        </li>
                    </ul>
                    <p>
                        <?= $productDt['mota'] ?>
                    </p>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <div class="product_count">
                            <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                            <input class="input-number" type="text" value="1" min="0" max="10">
                            <span class="number-increment"> <i class="ti-plus"></i></span>
                        </div>
                        <a href="#" class="btn_3">Thêm Vào Giỏ</a>
                        <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true">Mô Tả</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                   aria-selected="false">Chính Sách Giao Hàng</a>
            </li>
            <!--            <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                               aria-selected="false">Comments</a>
                        </li>-->
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                   aria-selected="false">Đánh Giá</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                    <?= $productDt['mota'] ?>
                </p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Width</h5>
                                </td>
                                <td>
                                    <h5>128mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Height</h5>
                                </td>
                                <td>
                                    <h5>508mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Depth</h5>
                                </td>
                                <td>
                                    <h5>85mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>52gm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quality checking</h5>
                                </td>
                                <td>
                                    <h5>yes</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>When packeting</h5>
                                </td>
                                <td>
                                    <h5>Without touch of hand</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row total_rate" style="margin-bottom: 30px">
                            <div class="col-6">
                                <div class="box_total">
                                    <h5>Điểm Đánh Giá</h5>
                                    <h4 class="box-score"><?php
                                        if ($cmtsList) {
                                            $total = 0;
                                            foreach ($cmtsList as $cmt) {
                                                $total += $cmt['sao'];
                                            }
                                            $total = number_format(($total / count($cmtsList)), 2);
                                            echo $total;
                                        } else {
                                            echo 0;
                                        }
                                        ?></h4>
                                    <h6>(<span class="box-count-cmts"><?= count($cmtsList) ?></span> Đánh Giá)</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list">
                                    <h3>Dựa trên <span class="box-count-cmts"><?= count($cmtsList) ?></span> đánh giá</h3>
                                    <ul class="list">
                                        <li>
                                            <a href="#">5 Sao
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <?=
                                                count($crComm->getStarFromCmt($cmtsList, 5))
                                                ?> </a>
                                        </li>
                                        <li>
                                            <a href="#">4 Sao
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> </a>
                                            <i class="fa fa-star"></i> <?=
                                            count($crComm->getStarFromCmt($cmtsList, 4))
                                            ?>
                                        </li>
                                        <li>
                                            <a href="#">3 Sao
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i></a>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <?=
                                            count($crComm->getStarFromCmt($cmtsList, 3))
                                            ?>
                                        </li>
                                        <li>
                                            <a href="#">2 Sao
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> </a>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <?=
                                            count($crComm->getStarFromCmt($cmtsList, 2))
                                            ?>
                                        </li>
                                        <li>
                                            <a href="#">1 Sao
                                                <i class="fa fa-star"></i> </a>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <?=
                                            count($crComm->getStarFromCmt($cmtsList, 4))
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="review_list">
                            <div></div>
                            <?php
                            $threeCmts = array_slice($cmtsList, 0, 3);
                            foreach ($threeCmts as $cmt) {
                                ?>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img style="height: 60px; width: 60px; border-radius: 100%; object-fit: cover" src="../public/img/user/<?= $cmt['hinhanhkh'] ?>" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <h4><?= $cmt['tenkh'] ?></h4>
                                            <?php
                                            for ($i = 0; $i < $cmt['sao']; $i++) {
                                                echo '<i class = "fa fa-star"></i> ';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <p><?= $cmt['noidung'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <?=
                        (count($cmtsList) >= 3) ? '<div class="grey pagination-cmts-product" data-masp ="' . $masp . '" style="cursor: pointer; text-align:right">Xem Bình Luận Cũ</div>' : '';
                        ?>
                    </div>

                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Đánh giá sản phẩm</h4>
                            <span class="grey">Yêu thích:</span>
                            <p class="stars">
                                <a class="1">1</a>
                                <a class="2">2</a>
                                <a class="3">3</a>
                                <a class="4">4</a>
                                <a class="5">5</a> 
                            </p>
                            <form class="row contact_form comment-product-ajax">
                                <div class="col-md-12">
                                    <div class="form-group" data-validate="Đã xảy ra lỗi cú pháp">
                                        <textarea class="form-control validate-form-control" name="message" id="message" cols="30" rows="9"
                                                  placeholder="Đánh giá" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <input type="hidden" name="rating" id="rating" value="5">
                                    <input type="hidden" name="masp" value="<?= $masp ?>">
                                    <button type="submit" value="submit" class="btn_3">
                                        Nhập
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->

<!-- product_list part start-->
<section class="product_list best_seller">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    foreach ($relativePros as $pro) {
                        ?>
                        <div class="single_product_item">
                            <a href=".?act=product&masp=<?= $pro['masp'] ?>">
                                <img src="../public/img/newproduct/upload/<?= $pro['hinhanhsp'] ?>" alt="">
                            </a>
                            <div class="single_product_text">
                                <h4><?= $pro['tensp'] ?></h4>
                                <?=
                                ($pro['khuyenmai'] > 0) ? '<del>' . number_format($pro['gia'], 0, '', '.') . 'VNĐ</del> - <b>' . $pro['khuyenmai'] . '%</b>' : ''
                                ?>
                                <h3><?= number_format($crPro->checkKm($pro['gia'], $pro['khuyenmai']), 0, '', '.') ?> VNĐ</h3>
                                <a href="#" class="add_cart">+ Thêm vào giỏ<i class="ti-heart"></i></a>
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
