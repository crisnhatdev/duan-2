<!doctype html>
<html lang="zxx">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sweet House</title>
        <link rel="icon" href="../public/img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="../public/css/animate.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../public/css/owl.carousel.min.css">
        <!-- nice select CSS -->
        <link rel="stylesheet" href="../public/css/nice-select.css">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="../public/css/all.css">
        <!-- flaticon CSS -->
        <link rel="stylesheet" href="../public/css/flaticon.css">
        <link rel="stylesheet" href="../public/css/themify-icons.css">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="../public/css/magnific-popup.css">
        <link rel="stylesheet" href="../public/css/font-awesome.min.css">
        <!-- swiper CSS -->
        <link rel="stylesheet" href="../public/css/slick.css">
        <link rel="stylesheet" href="../public/css/price_rangs.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="../public/css/style.css">
    </head>

    <body>
        <!--::header part start::-->
        <header class="main_menu home_menu">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href=".?"> <img src="../public/img/logo1.png" alt="logo" style="width: 80px;"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="menu_icon"><i class="fas fa-bars"></i></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href=".?">Trang chủ</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#catalog" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Cửa hàng
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                            <?php
                                            foreach ($cataList as $cata) {
                                                ?>
                                                <a class="dropdown-item" href=".?act=catalog&malh=<?= $cata['malh'] ?>"><?= $cata['tenlh'] ?></a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href=".?act=news" id="navbarDropdown_2" role="button" aria-haspopup="true" aria-expanded="false">
                                            Tin Tức
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href=".?act=contact">Liên hệ</a>
                                    </li>

                                    <?php
                                    if ($crAcc->checkSs('user')) {
                                        if (isset($_SESSION['user']) && $_SESSION['user']['level'] == 1) {
                                            ?>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#account" id="navbarDropdown_2">Tài khoản</a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                                    <a class="dropdown-item" href=".?act=acc-admin">Quản Trị</a>
                                                    <a class="dropdown-item" href=".?act=acc-update">Cập nhật thông tin</a>
                                                    <a class="dropdown-item" href=".?act=acc-change">Đổi mật khẩu</a>
                                                    <a class="dropdown-item logout" href="#">Thoát</a>
                                                </div>
                                            </li>
                                        <?php } else {
                                            ?>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#account" id="navbarDropdown_2">Tài khoản</a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                                    <a class="dropdown-item" href=".?act=acc-update">Cập nhật thông tin</a>
                                                    <a class="dropdown-item" href=".?act=acc-change">Đổi mật khẩu</a>
                                                    <!--<a class="dropdown-item" href=".?act=acc-bill">Lịch sử mua hàng</a>-->
                                                    <a class="dropdown-item logout" href="#">Thoát</a>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href=".?act=account" id="navbarDropdown_2">Tài khoản</a>
                                        </li>

                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="hearer_icon d-flex">
                                <a id="search_1" href="javascript:void(0)"><i class="ti-search" title="Tìm Kiếm"></i></a>
                                <a href=".?act=<?= ($crAcc->checkSs('user')) ? 'acc-bill' : 'acc-bill-no-lg' ?>"><i title="Lịch Sử Mua Hàng" class="fas fa-history"></i></a>
                                <div class="cart">
                                    <a href=".?act=view-cart" id="navbarDropdown3" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i title="Giỏ Hàng" class="fas fa-cart-plus"  data-cart="<?= ($crAcc->checkSs('cart')) ? count($_SESSION['cart']) : 0 ?>"></i>
                                    </a>
                                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="single_product">
            
                                            </div>
                                        </div> -->

                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="search_input" id="search_input_box">
                <div class="container ">
                    <form class="d-flex justify-content-between search-inner">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
        </header>
        <div class="modal fade" id="modal_cart">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h3 class="modal-title text-center" id="modal-title-cart">Đặt hàng thành công</h3>
                    </div>
                    <div class="modal-body text-center" id="modal-body-cart">
                        Chúng tôi sẽ liên hệ trong thời gian sớm nhất. Sweet House xin cám ơn
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-bill" class="modal fade bs-example-modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title-bill">
                            Hóa đơn chi tiết
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="table-bill" class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Tên SP</td>
                                    <td>Giá</td>
                                    <td>Số Lượng</td>
                                    <td>Tổng</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
