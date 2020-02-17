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
        case 'about':
            require_once '../admin/view/about.php';
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
?>