<?php

//Model
session_start();
require_once '../../../model/connect.php';
require_once '../../../model/catalog.php';
require_once '../../../model/product.php';
require_once '../../../model/comment.php';
require_once '../../../model/validate.php';
require_once '../../../model/news.php';
require_once '../../../model/cart.php';
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
//cart
$crCart = new Cart();
// <---End-News
//Controller
$type = $_REQUEST['type'];
switch ($type) {

    case 'pagination-bill':
        $mahd = $_GET['mahd'];
        $page = $_GET['page'];
        $limitBill = $crCart->get_bill_by_page($mahd, 5, $page);
        $output = '<thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">SĐT</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Email</th>
            <th scope="col">Ngày Mua</th>
            <th scope="col">Tổng Tiền</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>';

        foreach ($limitBill as $bill) {
            $output .= '<tbody><tr><td>' . $bill['mahd'] . '</td>
                        <td>' . $bill['tenkh'] . '</td>
                        <td>' .  $bill['sdt'] . '</td>
                        <td>' . $bill['diachi'] . '</td>
                        <td>' . $bill['email'] . '</td>
                        <td>' . $bill['ngaymua'] . '</td>
                        <td>' . $bill['tongtien'] . '</td>
                        <td>
                            '.$crCart->check_status_bill($bill['trangthai']).'
                        </td>
                        <td>
                        <a href="admin.php?act=billDetails&mahd=' . $bill['mahd'] . '" class="btn btn-danger btn-sm">Chi Tiết</a>
                        <a href="admin.php?act=delBills&mahd=' . $bill['mahd'] . '" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
                        </td>
                        </tr></tbody>';
        }
        echo json_encode($output);
        break;
    default:
        break;
}
//<---End-Controller--->
