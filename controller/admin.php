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
            require_once '../admin/view/loaihang.php';
            break;
        case 'qlyProduct':                                                          //product
            $crPro = new Product();
            $proList = $crPro->getPro();
            require_once '../admin/view/product/product.php';
            break;

        case 'add_product_key':
            require_once '../admin/view/product/addProduct.php';
            break;
        case 'add_product':
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
            // case 'update_product':
            //     $crCata = new Catalog();
            //     $id = $_GET['id'];
            //     $cataListById = $crCata->getCataId($id);
            //     require_once '../admin/view/loaihang.php';
            //     break;

        case 'update_product_key':
            require_once '../admin/view/updateProduct.php';
            break;
        case 'update_product':
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
        case 'delete_product':
            //deleteCata
            if (isset($_GET['malh'])) {
                $id = $_GET['malh'];
                $deleteCata = new Catalog();
                $deleteCata->delCata($id);
                //capnhatlai
                $crCata = new Catalog();
                $cataList = $crCata->getCata();
            }
            require_once '../admin/view/loaihang.php';
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
