<?php

//Model
session_start();
require_once '../model/connect.php';
require_once '../model/catalog.php';
require_once '../model/product.php';
require_once '../model/banner.php';
require_once '../model/color.php';
//<---Model-End--->
//
//Banner
$crBanner = new Banner();
$bannerList = $crBanner->getBanner();
//<---Banner-End--->
//Catalog
$crCata = new Catalog();
$cataList = $crCata->getCata(); //array catalog
//<---Catalog-End--->
//Product
$crPro = new Product();
$proList = $crPro->getPro(0, 0, 0, 1, 12); //array 12 product
//<---Product-End--->
//
//Control
require_once '../view/layout/header.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        //page
        case 'home':
            require_once '../view/layout/content.php';
            break;
        case 'about':
            require_once '../view/pages/about.php';
            break;
        case 'contact':
            require_once '../view/pages/contact.php';
            break;
        //blog
        case 'blog':
            require_once '../view/blog/blog.php';
            break;
        //shop
        case 'catalog':
            $proByCata = $crPro->getPro($_GET['malh']); //tất cả sản phẩm theo mã lh
            $limitProByCata = $crCata->proByPage($_GET['malh'], 3, 1); //mảng sản phẩm giới hạn theo trang

            if (isset($_GET['type'])) {
                $mams = (isset($_GET['mams'])) ? $_GET['mams'] : 0;
                $mamh = (isset($_GET['mamh'])) ? $_GET['mamh'] : 0;

                $proByCata_ft = $crPro->getPro($_GET['malh'], 0, 0, 1, 0, $mams, $mamh); //tất cả sản phẩm theo mã loại hàng, ma màu, mã mặt hàng
                $limitProByCata_ft = $crCata->proByPage($_GET['malh'], 3, 1, '', $mams, $mamh); //mảng sản phẩm giới hạn theo trang
            }

            require_once '../view/shop/catalog.php';
            break;
        case 'product':
            require_once '../view/shop/product.php';
            break;
        case 'product-detail':
            require_once '../view/shop/product-detail.php';
            break;
        //account
        case 'account':
            require_once '../view/account/account.php';
            break;
        default:
            require_once '../view/layout/content.php';
            break;
    }
} else {
    require_once '../view/layout/content.php';
}

require_once '../view/layout/footer.php';
//<---End--->
?>