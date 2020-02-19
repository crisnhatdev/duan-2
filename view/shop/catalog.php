<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2><?= $proByCata[0]['tenlh'] ?></h2>
<!--                        <p>Home <span>-</span> Shop Category</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Category Product Area =================-->
<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Danh mục nội thất</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <?php
                                foreach ($cataList as $cata) {
                                    ?>
                                    <li>
                                        <a href=".?act=catalog&malh=<?= $cata['malh'] ?>"><?= $cata['tenlh'] ?></a>
                                        <span>(<?= count($crPro->getPro($cata['malh'])) ?>)</span>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Lọc sản phẩm</h3>
                        </div>
                        <div class="widgets_inner">
                            <!--                            <ul class="list">
                                                            <li>
                                                                <a href="#">Apple</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Asus</a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="#">Gionee</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Micromax</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Samsung</a>
                                                            </li>
                                                        </ul>
                                                        <ul class="list">
                                                            <li>
                                                                <a href="#">Apple</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Asus</a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="#">Gionee</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Micromax</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Samsung</a>
                                                            </li>
                                                        </ul>-->
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Lọc Theo Màu</h3>
                        </div>
                        <div class="widgets_inner">
                            <!--                            <ul class="list">
                                                            <li>
                                                                <a href="#">Black</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Black Leather</a>
                                                            </li>
                                                            <li class="active">
                                                                <a href="#">Black with red</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Gold</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Spacegrey</a>
                                                            </li>
                                                        </ul>-->
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets price_rangs_aside">
                        <div class="l_w_title">
                            <h3>Lọc Theo Giá</h3>
                        </div>
                        <div class="widgets_inner">
                            <div class="range_item">
                                <!-- <div id="slider-range"></div> -->
                                <input type="text" class="js-range-slider" value="" />
                                <div class="d-flex">
                                    <div class="price_text">
                                        <p>Giá :</p>
                                    </div>
                                    <div class="price_value d-flex justify-content-center">
                                        <input style="" type="text" class="js-input-from" id="amount" readonly />
                                        <span>-</span>
                                        <input type="text" class="js-input-to" id="amount" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                <p><span><?= count($proByCata) ?> </span> Sản Phẩm</p>
                            </div>
                            <div class="single_product_menu d-flex">
                                <h5>Sắp xếp theo : </h5>
                                <select>
                                    <option data-display="Select">name</option>
                                    <option value="1">price</option>
                                    <option value="2">product</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center latest_product_inner">
                    <?php
                    foreach ($proByCata as $pro) {
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <img src="../public/img/newproduct/upload/<?= $pro['hinhanhsp'] ?>" alt="">
                                <div class="single_product_text">
                                    <h4><?= $pro['tensp'] ?></h4>
                                    <?= ($pro['khuyenmai'] > 0) ? "<del>" . number_format($pro['gia'], 0, '', '.') . "VNĐ</del> - <b>" . $pro['khuyenmai'] . "%</b>" : '' ?>
                                    <h3><?= number_format($crPro->checkKm($pro['gia'], $pro['khuyenmai']), 0, '', '.') ?></h3>
                                    <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-lg-12">
                        <div class="pageination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center" data-malh = '<?= (isset($_GET['malh'])) ? $_GET['malh'] : 0 ?>' data-kyw="<?= (isset($_GET['kyw'])) ? $_GET['kyw'] : '' ?>" data-filter="<?php (isset($_GET['type']) && $_GET['type'] === 'filter') ? $_GET['priceFrom'] . '-' . $_GET['priceTo'] : '' ?>">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <i class="ti-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <!--                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                                        <li class="page-item"><a class="page-link" href="#">6</a></li>-->
                                    <?php
                                    $pages = $crCata->calcPage($proByCata, 3);
                                    for ($i = 0; $i < $pages; $i++) {
                                        echo "<li class='page-item'><a class='page-link' href='#/'>" . ($i + 1) . "</a></li>";
                                    }
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <i class="ti-angle-double-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

<!-- product_list part start-->
<!--<section class="product_list best_seller">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Best Sellers <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <div class="single_product_item">
                        <img src="img/product/product_1.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_2.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_3.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_4.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_5.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- product_list part end-->