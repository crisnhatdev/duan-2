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
            require_once '../admin/view/loaihang.php';
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
            require_once '../admin/view/loaihang.php'; 
            break;
        case 'update_cata':
            //update cata
            if (isset($_POST['update']) && $_POST['update']) {
                $tenlh = $_POST['tenlh'];
                $malh = $_POST['malh'];
                $hinhanhlh = $_FILES['hinhanhlh']['name'];
                if ($_FILES['hinhanhlh']['name'] != "") {
                    $dir = "../public/img/catalog/";
                    $url = $dir . $hinhanhlh;
                    move_uploaded_file($_FILES['hinhanhlh']['tmp_name'], $url);
                    $updateCata = new Catalog();
                    $updateCata->updateCata($malh, $tenlh, $hinhanhlh);
                }
                echo '<script>
                alert("cập nhật thành công !");
                </script';
            }
            require_once '../admin/view/loaihang.php';
            break;
        case 'delete_cata':
            //deleteCata
            if (isset($_GET['del']) && $_GET['del'] == 1) {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $deleteCata = new Catalog();
                    $deleteCata->delCata($id);
                    header('Location: admin.php?act=qlyCata');
                }
            }
            break;
        case 'product':
            require_once '../admin/view/product.php';
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
