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

//<---End--->
?>