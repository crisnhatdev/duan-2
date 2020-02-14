<!doctype html>
<html lang="zxx">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>aranoz</title>
        <link rel="icon" href="img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="../public/css/animate.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../public/css/owl.carousel.min.css">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="../public/css/all.css">
        <!-- flaticon CSS -->
        <link rel="stylesheet" href="../public/css/flaticon.css">
        <link rel="stylesheet" href="../public/css/themify-icons.css">
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="../public/css/magnific-popup.css">
        <!-- swiper CSS -->
        <link rel="stylesheet" href="../public/css/slick.css">
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
                            <a class="navbar-brand" href=".?"> <img src="../public/img/logo.png" alt="logo"> </a>
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
                                        <a class="nav-link dropdown-toggle" href=".?act=blog" id="navbarDropdown_1"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Cửa hàng
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                            <?php
                                            foreach ($cataList as $cata) {
                                                ?>
                                                <a class="dropdown-item" href=".?act=home"><?= $cata['tenlh'] ?></a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <!--                                <li class="nav-item dropdown">
                                                                        <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                                                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            pages
                                                                        </a>
                                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                                                            <a class="dropdown-item" href="login.html"> login</a>
                                                                            <a class="dropdown-item" href="tracking.html">tracking</a>
                                                                            <a class="dropdown-item" href="checkout.html">product checkout</a>
                                                                            <a class="dropdown-item" href="cart.html">shopping cart</a>
                                                                            <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                                                            <a class="dropdown-item" href="elements.html">elements</a>
                                                                        </div>
                                                                    </li>-->
                                    <li class="nav-item">
                                        <a class="nav-link" href=".?act=blog" id="navbarDropdown_2"
                                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tin Tức
                                        </a>
                                        <!--<div class="dropdown-menu" aria-labelledby="navbarDropdown_2">-->
                                        <!--<a class="dropdown-item" href="blog.html"> blog</a>-->
                                        <!--<a class="dropdown-item" href="single-blog.html">Single blog</a>-->
                                        <!--</div>-->
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href=".?act=contact">Liên hệ</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href=".?act=account">Tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="hearer_icon d-flex">
                                <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                                <a href=""><i class="ti-heart"></i></a>
                                <div class="dropdown cart">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cart-plus"></i>
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
                        <input type="text" class="form-control" id="search_input" placeholder="Tìm kiếm">
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Đóng tìm kiếm"></span>
                    </form>
                </div>
            </div>
        </header>
