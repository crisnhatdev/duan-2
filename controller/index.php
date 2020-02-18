<?php

//Model
require_once '../model/connect.php';
require_once '../model/catalog.php';
require_once '../model/product.php';
require_once '../model/banner.php';
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
$proList = $crPro->getPro(0, 0, 0, 1, 12); //array product
$newList = array_filter($proList, function($pro) {
    return $pro['khuyenmai'] == 0;
}); //sp mới nhất không sale || sp đặc biệt
$bestList = array_filter($proList, function($pro) {
    return $pro['dacbiet'] == 1 && $pro['khuyenmai'] == 0;
}); //sp đặc biệt không sale
$saleList = array_filter($proList, function($pro) {
    return $pro['khuyenmai'] > 0;
}); //sp sale
//<---Product-End--->
//
//Control
require_once '../view/header.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        //page
        case 'home':
            require_once '../view/content.php';
            break;
        case 'about':
            require_once '../view/about.php';
            break;
        case 'contact':
            require_once '../view/contact.php';
            break;
        //blog
        case 'blog':
            require_once '../view/blog.php';
            break;
        //shop
        case 'product':
            require_once '../view/product.php';
            break;
        //account
        case 'account':
            require_once '../view/account.php';
            break;
        default:
            require_once '../view/content.php';
            break;
    }
} else {
    require_once '../view/content.php';
}

require_once '../view/footer.php';
//<---End--->
?>