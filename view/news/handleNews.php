<?php

//Model
session_start();
require_once '../../model/connect.php';
require_once '../../model/catalog.php';
require_once '../../model/product.php';
require_once '../../model/comment.php';
require_once '../../model/validate.php';
require_once '../../model/news.php';
//<---End-Model---->
date_default_timezone_set("Asia/Ho_Chi_Minh");

//Catalog
$crCata = new Catalog();
// <---End-Catalog--->
//Product
$crPro = new Product();
// <---End-Product--->
//Comment
$crComm = new Comment();
// <---End-Comment--->
//Validate
$crValid = new Validate();
// <---End-Validate--->
//News
$crNews = new News();
// 
//Controller
$type = $_REQUEST['type'];
$errArr = array();

if ($type) {
    switch ($type) {
        case 'comments-news':
            $bang = 'binhluanbv';
            $tenCot = 'mabv';
            $cmt = $crValid->valid_value_insert($_REQUEST['arrData'][0]['value']); //nội dung đánh giá
            $sao = 5; //lấy giá trị index = 0 trong mảng arrDat và string đầu tiên (i = 0)
            $ngaydang = date("Y:m:d H:i:s"); //ngày
            $matk = 77; // mã tk đánh giá
//            $matk = $_SESSION['user']['idaccount'];// mã tk đánh giá
            $mabv = $_REQUEST['arrData'][1]['value'];

            if ($crValid->valid_text($cmt) && $cmt != '') {
                $crComm->upCmt($bang, $tenCot, $cmt, $sao, $ngaydang, $matk, $mabv); //up cmt mới lên database

                $cmtsList = $crComm->getCmt($bang, $tenCot, $mabv); //lấy tổng số cmt ra để tính tổng cmts
                $newCmt = $cmtsList[0]; //lấy cmt mới nhất trong cmtList

                $output = '<div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="../public/img/user/' . $newCmt['hinhanhkh'] . '" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                ' . $newCmt['noidung'] . '
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#/">' . $newCmt['tenkh'] . '</a>
                                                    </h5>
                                                    <p class="date">' . date("d-m-Y | H:i:s", strtotime($newCmt['ngaydang'])) . ' </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                echo json_encode(array($output, count($cmtsList)));
            }
            break;
        case 'pagination-news':
            $bang = 'baiviet';
            $tenCot = 'malbv';
            $malbv = $_REQUEST['malbv'];
            $page = $_REQUEST['page'];

            $limitNews = $crComm->paginationCmts($bang, $tenCot, 3, $page, $malbv); //tên bảng, tên cột, cmt giới hạn, trang, mã bv || mã sp


            $output = '';
            foreach ($limitNews as $news) {
                $output .= '<article class="blog_item">
                            <div class="blog_item_img">
                                <!--<img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">-->
                                <a href="#" class="blog_item_date">
                                    <h3>' . date("d", strtotime($news['ngaydang'])) . '</h3>
                                    <p>' . date("M", strtotime($news['ngaydang'])) . '</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href=".?act=news-detail&mabv=' . $news['mabv'] . '">
                                    <h2>' . $news['tenbv'] . '</h2>
                                </a>
                                <p>' . $news['motabv'] . '</p>
                                <ul class="blog-info-link">
                                    <li><a href="#/"><i class="far fa-user"></i> ' . $news['tenkh'] . '</a></li>
                                    <li><a href="#/"><i class="far fa-comments"></i>' . count($crComm->getCmt('binhluanbv', 'mabv', 14)) . ' Comments</a></li>
                                </ul>
                            </div>
                        </article>';
            }

            echo json_encode($output);
            break;
        case 'pagination-cmts-news':
            $bang = 'binhluanbv';
            $tenCot = 'mabv';
            $mabv = $_REQUEST['mabv'];
            $page = $_REQUEST['page'];

            $limitCmtsNews = $crComm->paginationCmts($bang, $tenCot, 3, $page, $mabv); //tên bảng, tên cột, cmt giới hạn, trang, mã bv

            $output = '';
            foreach ($limitCmtsNews as $cmt) {
                $output .= '<div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="../public/img/user/' . $cmt['hinhanhkh'] . '" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                ' . $cmt['noidung'] . '
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#/">' . $cmt['tenkh'] . '</a>
                                                    </h5>
                                                    <p class="date">' . date("d-m-Y | H:i:s", strtotime($cmt['ngaydang'])) . ' </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }

            echo json_encode($output);
            break;
        default:
            break;
    }
}
?>