<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'home':
                require_once '../view/home.php';
                break;
            case 'about':
                require_once '../view/about.php';
                break;
            case 'product':
                require_once '../view/product.php';
                break;
            case 'blog':
                require_once '../view/blog.php';
                break;
            case 'contact':
                require_once '../view/contact.php';
                break;
            default:
                require_once '../view/home.php';
                break;
        }
    }
    else{
        require_once '../view/home.php';
    }
?>