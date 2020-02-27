<?php

//Model
session_start();
ob_start();
require_once '../model/connect.php';
require_once '../model/catalog.php';
require_once '../model/product.php';
require_once '../model/banner.php';
require_once '../model/color.php';
require_once '../model/account.php';
require_once '../model/comment.php';
require_once '../model/news.php';
require_once '../model/cart.php';
//<---Model-End--->
//session_destroy();
//Banner
$crBanner = new Banner();
$bannerList = $crBanner->getBanner();
//<---Banner-End--->
//
//Catalog
$crCata = new Catalog();
$cataList = $crCata->getCata(); //array catalog
//<---Catalog-End--->
//
//Product
$crPro = new Product();
$proList = $crPro->getPro(0, 0, 0, 1); //array products
//<---Product-End--->
//
//Comments
$crComm = new Comment(); // khởi tạo comments
//<---Comments-End--->
//
//Account
$crAcc = new Account(); // khởi tạo account
//<---Account-End--->
//
//News
$crNews = new News(); // khởi tạo news
$newsCataList = $crNews->getCataNews();
($crAcc->checkCookie('recent-news')) ? $threeRecentNews = array_slice($_COOKIE['recent-news'], -3, 3) : $threeRecentNews = []; // nếu có cookie recent news thì cắt 3 bài viết cuối
//<---News-End--->
//
//Cart
$crCart = new Cart();
// <---End-Cart--->
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
        //news
        case 'news':
            $malbv = (isset($_GET['malbv'])) ? $_GET['malbv'] : 0;
            $newsList = $crNews->getNews($malbv);
            require_once '../view/news/news.php';
            break;
        case 'news-detail':
            $mabv = $_GET['mabv']; //mã bài viết
            $news = $crNews->getNews(0, $mabv)[0]; //lấy dữ liệu theo mã bv
            $prevNews = @$crNews->getNews(0, $mabv - 1)[0]; //lấy tin tức cũ hơn
            $nextNews = @$crNews->getNews(0, $mabv + 1)[0]; //lấy tin tức mới hơn
            $cmtsList = $crComm->getCmt('binhluanbv', 'mabv', $mabv); //các cmt của bv
            $crPro->upView('baiviet', 'mabv', $mabv); //tăng view

            $crAcc->addCookie("recent-news[$mabv]", $mabv, 30); // thêm bài viết vừa xem vào cookie

            require_once '../view/news/news-detail.php';
            break;
        case 'find-news':
            $search = trim(htmlspecialchars(addslashes($_GET['value'])));
            $newsList = $crNews->findNews($search); //tất cả sản phẩm theo mã lh
            require_once '../view/news/findNews.php';
            break;
        //shop
        case 'catalog':
            $malh = $_GET['malh'];
            $proByCata = $crPro->getPro($malh); //tất cả sản phẩm theo mã lh
            $limitProByCata = $crCata->proByPage($malh, 3, 1); //mảng sản phẩm giới hạn theo trang

            if (isset($_GET['type'])) {
                $mams = (isset($_GET['mams'])) ? $_GET['mams'] : 0;
                $mamh = (isset($_GET['mamh'])) ? $_GET['mamh'] : 0;

                $proByCata_ft = $crPro->getPro($_GET['malh'], 0, 0, 1, 0, $mams, $mamh); //tất cả sản phẩm theo mã loại hàng, mã màu, mã mặt hàng
                $limitProByCata_ft = $crCata->proByPage($_GET['malh'], 3, 1, '', $mams, $mamh); //mảng sản phẩm giới hạn theo trang
            }

            require_once '../view/shop/catalog.php';
            break;
        case 'product':
            $masp = $_GET['masp'];
            $productDt = $crPro->getPro(0, $masp)[0]; // chi tiết sản phẩm
            $crPro->upView('sanpham', 'masp', $masp); // tăng lượt xem khi có người nhấp vào sp || bv

            $relativePros = $crPro->getPro($productDt['malh']); //các sản phẩm liên quan cùng mã lh

            $cmtsList = $crComm->getCmt('binhluansp', 'masp', $masp); // lấy tổng cmt theo mã sp
            require_once '../view/shop/product.php';
            break;
        case 'find-product':
            $search = trim(htmlspecialchars(addslashes($_GET['value'])));
            $proBySearch = $crPro->findProduct($search); //tất cả sản phẩm theo mã lh
            $limitProBySearch = $crCata->proByPage(0, 3, 1, $search); //mảng sản phẩm giới hạn theo trang

            require_once '../view/shop/findProduct.php';
            break;
        case 'view-cart':
            $cartList = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
            require_once '../view/shop/viewCart.php';
            break;
        case 'checkout':
            require_once '../view/shop/viewCart.php';
            break;
        //account
        case 'account':
            require_once '../view/account/account.php';
            break;
        case 'acc-update':
            $user = $crAcc->get_user_by('matk', $_SESSION['user']['id']);
            require_once '../view/account/updateUser.php';
            break;
        case 'acc-change':
            require_once '../view/account/changeUser.php';
            break;
        case 'acc-forgot':
            require_once '../view/account/forgotUser.php';
            break;
        case 'acc-change-forgot':
            require_once '../view/account/changeForgotUser.php';
            break;
        default:
            require_once '../view/layout/content.php';
            break;
    }
} else {
    require_once '../view/layout/content.php';
}

require_once '../view/layout/footer.php';
//ob_end_flush();
//<---End--->
?>