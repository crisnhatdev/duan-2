<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Lịch sử mua hàng</h2>
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
                            <th scope="col">Mã HĐ</th>
                            <th scope="col">Thời Gian</th>
                            <th scope="col">Tổng</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="shop_table cart">
                        <?php
                        foreach ($listBill as $b) {
                            ?>
                            <tr>
                                <td><?= $b['mahd'] ?></td>
                                <td><?= $b['ngaymua'] ?></td>
                                <td><?= number_format($b['tongtien'], 0, '', '.') ?> VNĐ</td>
                                <td><?= $crCart->check_st($b['trangthai']) ?></td>
                                <td>
                                    <a href="#/" class="bill-detail">Xem chi tiết</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</section>
<!--================End Cart Area =================-->
