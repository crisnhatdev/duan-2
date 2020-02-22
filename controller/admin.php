<?php

//Model
require_once '../model/connect.php';
require_once '../model/catalog.php';
require_once '../model/product.php';

//<---End--->
//
//Global Var
$crCata = new Catalog();
$cataList = $crCata->getCata();
$crPro = new Product();
$proList = $crPro->getPro();
//<---End--->
//
//Control

require_once '../admin/view/header.php';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            require_once '../admin/view/content.php';
            break;
            //catalog
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
        case 'qlyProduct':                                                         //product
            $crPro = new Product();
            $proList = $crPro->getPro(0, 0, 0, 0, 0, 0, 0);
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
            $updateProduct= new Product();
            $updateProduct->updatePro($masp, $tensp, $gia, $luotxem, $mota, $mamausac, $mamathang, $khuyenmai, $dacbiet, $ngaynhap, $hinhanhsp, $trangthai, $malh);
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
        case 'blog':
            require_once '../admin/view/blog.php';
            break;
        case 'contact':
            require_once '../admin/view/contact.php';
            break;
        default:
            require_once '../admin/view/content.php';
            break;
    }
} else {
    require_once '../admin/view/content.php';
}
require_once '../admin/view/footer.php'; 

//<---End--->
