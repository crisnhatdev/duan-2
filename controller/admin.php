<?php
session_start();
ob_start();
//Model
require_once '../model/connect.php';
require_once '../model/catalog.php';
require_once '../model/product.php';
require_once '../model/news.php';
require_once '../model/account.php';
require_once '../model/comment.php';
require_once '../model/banner.php';
//<---End--->
//
//Global Var
$crCata = new Catalog();
$cataList = $crCata->getCata();
$crPro = new Product();
$proList = $crPro->getPro();
$crNews = new News(); // khởi tạo news
$newsCataList = $crNews->getCataNews();
$crAcc = new Account();
$crBanner = new Banner();
//<---End--->
//
//Control
if (isset($_SESSION['user']) && $_SESSION['user']['level'] == 1) {
    require_once '../admin/view/header.php';
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'home':
                require_once '../admin/view/content.php';
                break;
                // ------------------------------------------------------------CATALOG-------------------------------------------
            case 'qlyCata':
                require_once '../admin/view/catalog/loaihang.php';
                break;
            case 'add_cata':
                //addCata
                $tenlh = $_POST['tenlh'];
                $hinhanhlh = $_FILES['hinhanhlh']['name'];
                if ($_FILES['hinhanhlh']['name'] != "") {
                    $dir = "../public/img/catalog/";
                    $url = $dir . $hinhanhlh;
                    move_uploaded_file($_FILES['hinhanhlh']['tmp_name'], $url);
                }
                $addCata = new Catalog();
                $addCata->insertCata($tenlh, $hinhanhlh);
                //capnhatlai 
                $crCata = new Catalog();
                $cataList = $crCata->getCata();
                require_once '../admin/view/catalog/loaihang.php';
                break;
            case 'update_cata_form':
                $crCata = new Catalog();
                $id = $_GET['id'];
                $cataListById = $crCata->getCataId($id);
                require_once '../admin/view/catalog/loaihang.php';
                break;
            case 'update_cata':
                //update cata
                $tenlh = $_POST['tenlh'];
                $malh = $_POST['malh'];
                $hinhanhlh = $_FILES['hinhanhlh']['name'];
                $dir = "../public/img/catalog/";
                $url = $dir . $hinhanhlh;
                move_uploaded_file($_FILES['hinhanhlh']['tmp_name'], $url);
                $updateCata = new Catalog();
                $updateCata->updateCata($malh, $tenlh, $hinhanhlh);
                //capnhatlai
                $crCata = new Catalog();
                $cataList = $crCata->getCata();
                require_once '../admin/view/loaihang.php';
                break;
            case 'delete_cata':
                //deleteCata
                if (isset($_GET['malh'])) {
                    $id = $_GET['malh'];
                    $deleteCata = new Catalog();
                    $deleteCata->delCata($id);
                    //capnhatlai
                    $crCata = new Catalog();
                    $cataList = $crCata->getCata();
                }
                require_once '../admin/view/catalog/loaihang.php';
                break;
                // ----------------------------------------------------------------BANNER----------------------------------------------
            case 'qlyBanner':
                $getBannerList = $crBanner->getBanner();
                require_once '../admin/view/banner/qlyBanner.php';
                break;
            case 'addBanner':
                $tieudebn = $_POST['tieudebn'];
                $noidungbn = $_POST['noidungbn'];
                $hinhanhbn = $_FILES['hinhanhbn']['name'];
                if ($_FILES['hinhanhbn']['name'] != "") {
                    $dir = "../public/img/banner/";
                    $url = $dir . $hinhanhbn;
                    move_uploaded_file($_FILES['hinhanhbn']['tmp_name'], $url);
                }
                $crBanner->insertBanner($tieudebn, $noidungbn, $hinhanhbn, 0);
                $getBannerList = $crBanner->getBanner();
                require_once '../admin/view/banner/qlyBanner.php';
                break;
            case 'updateBannerKey':
                $id = $_GET['id'];
                $getBannerId = $crBanner->getBannerId($id);
                $getBannerList = $crBanner->getBanner();
                require_once '../admin/view/banner/qlyBanner.php';
                break;
            case 'updateBanner':
                $mabn = $_POST['mabn'];
                $tieudebn = $_POST['tieudebn'];
                $noidungbn = $_POST['noidungbn'];
                $hinhanhbn = $_FILES['hinhanhbn']['name'];
                if ($_FILES['hinhanhbn']['name'] != "") {
                    $dir = "../public/img/banner/";
                    $url = $dir . $hinhanhbn;
                    move_uploaded_file($_FILES['hinhanhbn']['tmp_name'], $url);
                }
                $getBannerId = $crBanner->updateBanner($mabn, $tieudebn, $noidungbn, $hinhanhbn, Null);
                $getBannerList = $crBanner->getBanner();
                require_once '../admin/view/banner/qlyBanner.php';
                break;
            case 'delBanner':
                $mabn = $_GET['mabn'];
                $crBanner->deleBanner($mabn);
                $getBannerList = $crBanner->getBanner();
                require_once '../admin/view/banner/qlyBanner.php';
                break;
                // ---------------------------------------------------------------------PRODUCT-------------------------------------------
            case 'qlyProduct':
                $crPro = new Product();
                $proList = $crPro->getPro(0, 0, 0, 0, 0, 0, 0);
                $crCata = new Catalog();
                $proListLimit = $crCata->proByPage(0, 5, 1);
                require_once '../admin/view/product/product.php';
                break;
            case 'add_product_key':
                require_once '../admin/view/product/addProduct.php';
                break;
            case 'add_product':
                //addCata
                $malh = $_POST['malh'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['gia'];
                $mota = $_POST['mota'];
                $khuyenmai = $_POST['khuyenmai'];
                $dacbiet = $_POST['dacbiet'];
                $ngaynhap = date('Y-m-d H:m:s');
                $trangthai = NULL;
                $hinhanhsp = $_FILES['hinhanhsp']['name'];
                if ($_FILES['hinhanhsp']['name'] != "") {
                    $dir = "../public/img/newproduct/upload/";
                    $url = $dir . $hinhanhsp;
                    move_uploaded_file($_FILES['hinhanhsp']['tmp_name'], $url);
                }
                $luotxem = $_POST['luotxem'];
                $mamausac = $_POST['mamausac'];
                $mamathang = $_POST['mamathang'];
                $addProduct = new Product();
                $addProduct->insertPro($tensp, $gia, $luotxem, $mota, $mamausac, $mamathang, $khuyenmai, $dacbiet, $ngaynhap, $hinhanhsp, $trangthai, $malh);
                //capnhatlai 
                $crPro = new Product();
                $proList = $crPro->getPro();
                require_once '../admin/view/product/product.php';
                break;
            case 'update_product_key':
                $masp = $_GET['id'];
                $crPro = new Product();
                $proId = $crPro->getProId($masp);
                require_once '../admin/view/product/updateProduct.php';
                break;
            case 'update_product':
                //update cata
                $masp = $_POST['masp'];
                $malh = $_POST['malh'];
                $tensp = $_POST['tensp'];
                $gia = $_POST['gia'];
                $mota = $_POST['mota'];
                $khuyenmai = $_POST['khuyenmai'];
                $dacbiet = $_POST['dacbiet'];
                $ngaynhap = date('Y-m-d H:m:s');
                $hinhanhsp = $_FILES['hinhanhsp']['name'];
                if ($_FILES['hinhanhsp']['name'] != "") {
                    $dir = "../public/img/newproduct/upload/";
                    $url = $dir . $hinhanhsp;
                    move_uploaded_file($_FILES['hinhanhsp']['tmp_name'], $url);
                }
                $luotxem = $_POST['luotxem'];
                $mamausac = $_POST['mamausac'];
                $mamathang = $_POST['mamathang'];
                $updateProduct = new Product();
                $updateProduct->updatePro($masp, $tensp, $gia, $luotxem, $mota, $mamausac, $mamathang, $khuyenmai, $dacbiet, $ngaynhap, $hinhanhsp, $malh);
                //capnhatlai
                $crPro = new Product();
                $proList = $crPro->getPro();
                require_once '../admin/view/product/product.php';
                break;
            case 'delete_product_key':
                require_once '../admin/view/product/product.php';
                break;
            case 'delete_product':
                //deleteCata
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $deletePro = new Product();
                    $deletePro->delePro($id);
                    //capnhatlai
                    $proList = $crPro->getPro();
                }
                require_once '../admin/view/product/product.php';
                break;
                // -------------------------------------------------------------------LOẠI BLOG-----------------------------------------
            case 'qlyCataBlog':
                $crNews = new News();
                $getCataNewsId = $crNews->getCataNews();
                require_once '../admin/view/blog/loaiBlog.php';
                break;
                //them
            case 'addCataBlog':
                $crNews = new News();
                $tenloai = $_POST['tenlbv'];
                $hinhanh = '';
                $crNews->them_danhmucbv($tenloai, $hinhanh);
                //capnhat lai
                $newsCataList = $crNews->getCataNews();
                require_once '../admin/view/blog/loaiBlog.php';
                break;
                //xoa
            case 'delCataBlog':
                $crNews = new News();
                if (isset($_GET['malbv']) && $_GET['malbv']) {
                    $malbv = $_GET['malbv'];
                    $crNews->xoa_danhmucbv($malbv);
                }
                //capnhat lai
                $getCataNewsId = $crNews->getCataNews();
                require_once '../admin/view/blog/loaiBlog.php';
                break;
                //sua
            case 'updateCataBlogKey':
                $crNews = new News();
                $id = $_GET['id'];
                $getCataNewsId = $crNews->getCataNewsId($id);
                require_once '../admin/view/blog/loaiBlog.php';
                break;
            case 'updateCataBlog':
                $malbv = $_POST['malbv'];
                $tenloai = $_POST['tenlbv'];
                $hinhanh = '';
                $crNews = new News();
                $crNews->capnhat_danhmucbv($tenloai, $hinhanh, $malbv);
                //capnhat lai
                $crNews = new News();
                $newsCataList = $crNews->getCataNews();
                require_once '../admin/view/blog/loaiBlog.php';
                break;
                // -----------------------------------------------------------------------BLOG----------------------------------------
            case 'qlyBlog':
                $crCata = new Catalog();
                $qlyBlog = $crNews->getNews();
                $blogLimit = $crNews->newsByPage(0, 5, 1);
                require_once '../admin/view/blog/qlyBlog.php';
                break;
            case 'addBlogKey':
                $crAcc = new Account();
                $getTaikhoan = $crAcc->all_user();
                require_once '../admin/view/blog/addBlog.php';
                break;
            case 'addBlog':
                $crNews = new News();
                $tenbv = $_POST['tenbv'];
                $motabv = $_POST['motabv'];
                $noidungbv = $_POST['noidungbv'];
                $luotxem = $_POST['luotxem'];
                $ngaydang = date('Y-m-d H:m:s');
                $matk = $_POST['matk'];
                $malbv = $_POST['malbv'];
                $hinhanhbv = $_FILES['hinhanhbv']['name'];
                if ($_FILES['hinhanhbv']['name'] != "") {
                    $dir = "../public/img/blog/";
                    $url = $dir . $hinhanhbv;
                    move_uploaded_file($_FILES['hinhanhbv']['tmp_name'], $url);
                    $qlyBlog = $crNews->inserBlog($tenbv, $motabv, $noidungbv, $luotxem, $hinhanhbv, $ngaydang, $matk, $malbv);
                }
                //capnhatlai
                $crNews = new News();
                $qlyBlog = $crNews->getNews();
                require_once '../admin/view/blog/qlyBlog.php';
                break;
            case 'delBlog':
                $id = $_GET['mabv'];
                $crNews = new News();
                $crNews->deleteBlog($id);
                //capnhatlai
                $crNews = new News();
                $qlyBlog = $crNews->getNews();
                require_once '../admin/view/blog/qlyBlog.php';
                break;
            case 'updateBlogKey':
                $id = $_GET['id'];
                $getBlogId = $crNews->getBlogId($id);
                $dstaikhoan = $crNews->getNews();
                require_once '../admin/view/blog/updateBlog.php';
                break;
            case 'updateBlog':
                $mabv = $_POST['mabv'];
                $getBlogId = $crNews->getBlogId($mabv);
                $crNews = new News();
                $mabv = $_POST['mabv'];
                $tenbv = $_POST['tenbv'];
                $motabv = $_POST['motabv'];
                $noidungbv = $_POST['noidungbv'];
                $luotxem = $_POST['luotxem'];
                $ngaydang = date('Y-m-d H:m:s');
                $matk = $_POST['matk'];
                $malbv = $_POST['malbv'];
                $hinhanhbv = $_FILES['hinhanhbv']['name'];
                if ($_FILES['hinhanhbv']['name'] != "") {
                    $dir = "../public/img/blog/";
                    $url = $dir . $hinhanhbv;
                    move_uploaded_file($_FILES['hinhanhbv']['tmp_name'], $url);
                    $qlyBlog = $crNews->updateBlog($mabv, $tenbv, $motabv, $noidungbv, $luotxem, $hinhanhbv, $ngaydang, $matk, $malbv);
                }
                //capnhatlai
                $crNews = new News();
                $qlyBlog = $crNews->getNews();
                require_once '../admin/view/blog/qlyBlog.php';
                break;
                // ---------------------------------------------------------------------COMMENT----------------------------------------------
            case 'cmtBlog':
                $crCmt = new Comment();
                $cmtBlog = $crCmt->getCmtBv();
                require_once '../admin/view/comment/qlyCommentBlog.php';
                break;
            case 'cmtProduct':
                $crCmt = new Comment();
                $cmtPro = $crCmt->getCmtPro();
                require_once '../admin/view/comment/commentPro.php';
                break;
            case 'delCmtPro':
                $crCmt = new Comment();
                $stt = $_GET['stt'];
                $crCmt->delCmtPro($stt);
                //capnhat
                $crCmt = new Comment();
                $cmtPro = $crCmt->getCmtPro();
                require_once '../admin/view/comment/CommentPro.php';
                break;
            case 'delCmtBlog':
                $crCmt = new Comment();
                $stt = $_GET['stt'];
                $crCmt->delCmtBlog($stt);
                $cmtBlog = $crCmt->getCmtBv();
                require_once '../admin/view/comment/qlyCommentBlog.php';
                break;
                // -------------------------------------------------------------------------TAI KHOAN-----------------------------------------------
            case 'qlyAcc':
                $crAcc = new Account();
                $getAcc = $crAcc->all_user();
                require_once '../admin/view/account/qlyAccount.php';
                break;
            case 'add_Acc_Key':
                require_once '../admin/view/account/addAccount.php';
                break;
            case 'addAcc':
                $crAcc = new Account();
                $name = $_POST['tenkh'];
                $phone = $_POST['phone'];
                $pass = $_POST['password'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $gioithieu = $_POST['gioithieu'];
                $hinhanhkh = $_FILES['hinhanhkh']['name'];
                if ($_FILES['hinhanhkh']['name'] != "") {
                    $dir = "../public/img/blog/";
                    $url = $dir . $hinhanhkh;
                    move_uploaded_file($_FILES['hinhanhkh']['tmp_name'], $url);
                }
                $getPhanquyen = $_POST['phanquyen'];
                if ($getPhanquyen = 'boss') {
                    $phanquyen = 1;
                } else if ($getPhanquyen = 'admin') {
                    $phanquyen = 2;
                } else if ($getPhanquyen = 'user') {
                    $phanquyen = 3;
                }
                $crAcc->dangkytaikhoan($name, $phone, $pass, $address, $email, $gioithieu, $phanquyen, $hinhanhkh);
                //capnhat
                $getAcc = $crAcc->all_user();
                require_once '../admin/view/account/qlyAccount.php';
                break;
            case 'updateAccKey':
                $matk = $_GET['matk'];
                $crAcc = new Account();
                $getAcc = $crAcc->all_user();
                $getAccById = $crAcc->info_acc($matk);
                require_once '../admin/view/account/updateAccount.php';
                break;
            case 'updateAcc':
                $crAcc = new Account();
                $matk = $_POST['matk'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $gioithieu = $_POST['gioithieu'];
                $email = $_POST['email'];
                $hinhanhkh = $_FILES['hinhanhkh']['name'];
                if ($_FILES['hinhanhkh']['name'] != "") {
                    $dir = "../public/img/account/";
                    $url = $dir . $hinhanhkh;
                    move_uploaded_file($_FILES['hinhanhkh']['tmp_name'], $url);
                }
                $phanquyen = $_POST['phanquyen'];
                $crAcc->update_info($matk, $phone, $address, $email, $gioithieu, $hinhanhkh, $phanquyen);
                $getAcc = $crAcc->all_user();
                require_once '../admin/view/account/qlyAccount.php';
                break;
            case 'delAcc':
                $crAcc = new Account();
                $matk = $_GET['matk'];
                $crAcc->del_acc($matk);
                //capnhat
                $getAcc = $crAcc->all_user();
                require_once '../admin/view/account/qlyAccount.php';
                break;
            case 'profileAcc':
                $crAcc = new Account();
                require_once '../admin/view/account/profile.php';
                break;
            case 'logout':
                unset($_SESSION['user']);
                header("Location: ../index.php");
                break;
            default:
                require_once '../admin/view/content.php';
                break;
        }
    } else {
        require_once '../admin/view/content.php';
    }
    require_once '../admin/view/footer.php';
} else {
    header("Location: ../index.php");
}
//<---End--->
