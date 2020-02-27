<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Giỏ Hàng</h2>
                        <!--<p>Home <span>-</span>Cart Products</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Cart Area =================-->
<section class="cart_area padding_top">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã SP</th>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Tổng</th>
                        </tr>
                    </thead>
                    <tbody class="shop_table cart">

                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($cartList as $item) {
                                ?>
                                <tr>
                                    <td><?= $item['masp'] ?></td>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <a href=".?act=product&masp=<?= $item['masp'] ?>"><img style="width: 160px" src="../public/img/newproduct/upload/<?= $item['hinhanhsp'] ?>" alt="" /></a>
                                            </div>
                                            <div class="media-body">
                                                <a href=".?act=product&masp=<?= $item['masp'] ?>"><p><?= $item['tensp'] ?></p></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?= ($item['khuyenmai'] > 0) ? "<del style='color: #000'>" . number_format($item['gia'], 0, '', '.') . " VNĐ</del> - <b>" . $item['khuyenmai'] . "%</b>" : '' ?>
                                        <h5><b><?= number_format($crPro->checkKm($item['gia'], $item['khuyenmai']), 0, '', '.') ?> VNĐ</b></h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <span class="input-number-decrement"> <i class="ti-angle-down qty_btn" style="widows: 100%"></i></span>
                                            <input class="input-number qty_input" type="text" value="<?= $item['soluong'] ?>" min="1" max="5" onchange="(this.value > 5) ? console.log(this.value) : this.value">
                                            <span class="input-number-increment"> <i class="ti-angle-up qty_btn" style="width: 100%"></i></span>
                                        </div>
                                    </td>
                                    <td>
                                        <h5><?= number_format($crPro->checkKm($item['gia'], $item['khuyenmai']) * $item['soluong'], 0, '', '.') ?> VNĐ</h5>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Tổng Cộng: </h5>
                                </td>
                                <td>
                                    <h5><?= number_format($crCart->tongtien(), '0', '', '.') ?> VNĐ</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Shipping: </h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li class="active">
                                                <a href="#/">Ship COD: <?= ($crCart->tongtien() > 1000000) ? 'Free Ship' : number_format(30000, '0', '', '.') . ' VNĐ' ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        } else {
                            echo '<tr><td colspan="6"><h1 class="text-center text-danger">Giỏ hàng trống<h1></td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href=".">Tiếp tục mua sắm</a>
                    <a class="btn_1 checkout_btn_1" href=".?act=checkout">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
</section>
<!--================End Cart Area =================-->
