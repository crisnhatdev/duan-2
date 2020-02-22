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
// <---End-News
//Controller
$type = $_REQUEST['type'];
switch ($type) {
    case 'comments-product':
        $bang = 'binhluansp';
        $tenCot = 'masp';
        $cmt = $crValid->valid_value_insert($_REQUEST['arrData'][0]['value']); //nội dung đánh giá
        $sao = $_REQUEST['arrData'][1]['value']; //lấy giá trị index = 0 trong mảng arrDat và string đầu tiên (i = 0)
        $ngaydang = date("Y:m:d H:i:s"); //ngày
        $matk = 77; // mã tk đánh giá
//            $matk = $_SESSION['user']['idaccount'];// mã tk đánh giá
        $masp = $_REQUEST['arrData'][2]['value'];

        if ($crValid->valid_text($cmt) && $cmt != '') {
            $crComm->upCmt($bang, $tenCot, $cmt, $sao, $ngaydang, $matk, $masp); //up cmt mới lên database

            $cmtsList = $crComm->getCmt($bang, $tenCot, $masp); //lấy tổng số cmt ra để tính tổng cmts

            $total = 0;
            foreach ($cmtsList as $cmt) {
                $total += $cmt['sao'];
            }
            $total = $total / count($cmtsList); // tính điểm tổng cho sp

            $newCmt = $cmtsList[0]; //lấy cmt mới nhất trong cmtList
            $star = ''; // hiện thị số sao người dùng đã đánh giá
            for ($i = 0; $i < $newCmt['sao']; $i++) {
                $star .= '<i class = "fa fa-star"></i> ';
            }


            $output = '<div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="../public/img/product/single-product/review-3.png" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>' . $newCmt['tenkh'] . '</h4>' .
                    $star . '</div>
                                </div>
                                <p>' . $newCmt['noidung'] . '</p>
                            </div>';

            echo json_encode(array($output, $total, count($cmtsList)));
        }
        break;
    case 'pagination-cmts-product':
        $bang = 'binhluansp';
        $tenCot = 'masp';
        $mabv = $_REQUEST['masp'];
        $page = $_REQUEST['page'];

        $limitCmtsPro = $crComm->paginationCmts($bang, $tenCot, 3, $page, $mabv); //tên bảng, tên cột, cmt giới hạn, trang, mã bv

        $output = '';
        foreach ($limitCmtsPro as $cmt) {
            $star = ''; // hiện thị số sao người dùng đã đánh giá
            for ($i = 0; $i < $cmt['sao']; $i++) {
                $star .= '<i class = "fa fa-star"></i> ';
            }
            $output .= '<div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="../public/img/product/single-product/review-3.png" alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>' . $cmt['tenkh'] . '</h4>' .
                    $star . '</div>
                                </div>
                                <p>' . $cmt['noidung'] . '</p>
                            </div>';
        }

        echo json_encode($output);
        break;
//    case 'add':
//        $maspct = $_GET['maspct'];
//
//        $soluong = (isset($_GET['soluong'])) ? $_GET['soluong'] : 1;
//
//        add_item($maspct, $soluong);
//
//        $arr = load_cart();
//
//        echo json_encode($arr);
//        break;
//    case 'remove':
//        $maspct = $_GET['maspct'];
//
//        unset($_SESSION['cart'][$maspct]);
//
//        $arr = load_cart();
//
//        echo json_encode($arr);
//        break;
//    case 'update':
//        $maspct = $_GET['maspct'];
//
//        $soluong = $_GET['soluong'];
//
//        update_item($maspct, $soluong);
//
//        $arr = load_cart();
//
//        echo json_encode($arr);
//        break;
//    case 'choose':
//        $masp = $_GET['ma'][0];
//        $mams = $_GET['ma'][1];
//        $masz = $_GET['masz'];
//
//        $result = get_detailPro($masp, 0, $mams, $masz);
//
//        echo json_encode($result);
//        break;
//    case 'checkout':
//        $mahd = count(get_bill()) + 1;
//        $ngaymua = date('Y-m-d H:i:s');
//        $tongtien = tongtien('cart');
//        $ghichu = $_GET['note'];
//        $user = $_SESSION['user'];
//
//        if (!valid_text($ghichu)) {
//            echo json_encode("Không được sử dụng ký tự đặc biệt trong ghi chú. Xin cám ơn");
//            return;
//        }
//
//        add_bill($mahd, $ngaymua, $tongtien, $ghichu, $user['idaccount']);
//
//        $cartPros = $_SESSION['cart'];
//        $listCart = '';
//        foreach ($cartPros as $key => $pro) {
//            //xóa số lượng sp
//            del_qtt($pro['soluong'], $key);
//            //thêm hóa đơn chi tiết. giá là giá đã tính sẵn khuyến mãi
//            add_detail_bill($pro['soluong'], $pro['gia'], $mahd, $key);
//
//            $listCart .= '<tr class="item">
//                        <td style="display: flex; align-items: center;">
//                            <img src="https://trinhduy.com/view/images/shop/' . $pro['hinhanhsp'] . '" style="width:40px; height:40px; margin-right: 5px;">
//                            <span>   
//                                <b>' . $pro['tensp'] . ' x ' . $pro['soluong'] . '</b><br>
//                                Màu: <b>' . $pro['tenmau'] . '</b> - Size: <b>' . $pro['size'] . '</b>    
//                            </span>    
//                        </td>
//                        <td style="text-align: right;">
//                            ' . number_format($pro['gia'] * $pro['soluong'], 0, '', '.') . ' VNĐ
//                        </td>
//                    </tr>';
//        }
//
//
//        $title = 'Hóa đơn mua hàng';
//        $desc = '<!doctype html>
//                <html>
//                    <head>
//                        <meta charset="utf-8">
//
//                        <style>
//                            .invoice-box {
//                                max-width: 800px;
//                                margin: auto;
//                                padding: 30px;
//                                border: 1px solid #eee;
//                                box-shadow: 0 0 10px rgba(0, 0, 0, .15);
//                                font-size: 16px;
//                                line-height: 24px;
//                                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
//                                color: #555;
//                            }
//
//                            .invoice-box table {
//                                width: 100%;
//                                line-height: inherit;
//                                text-align: left;
//                            }
//
//                            .invoice-box table td {
//                                padding: 5px;
//                                vertical-align: top;
//                            }
//
//                            .invoice-box table tr td:nth-child(2) {
//                                text-align: right;
//                            }
//
//                            .invoice-box table tr.top table td {
//                                padding-bottom: 20px;
//                            }
//
//                            .invoice-box table tr.top table td.title {
//                                font-size: 45px;
//                                line-height: 45px;
//                                color: #333;
//                            }
//
//                            .invoice-box table tr.information table td {
//                                padding-bottom: 40px;
//                            }
//
//                            .invoice-box table tr.heading td {
//                                background: #eee;
//                                border-bottom: 1px solid #ddd;
//                                font-weight: bold;
//                            }
//
//                            .invoice-box table tr.details td {
//                                padding-bottom: 20px;
//                            }
//
//                            .invoice-box table tr.item td{
//                                border-bottom: 1px solid #eee;
//                            }
//
//                            .invoice-box table tr.item.last td {
//                                border-bottom: none;
//                            }
//
//                            .invoice-box table tr.total td:nth-child(2) {
//                                font-weight: bold;
//                            }
//
//                            .invoice-box table tr .textRight {
//                                text-align: right;
//                            }
//
//                            @media only screen and (max-width: 600px) {
//                                .invoice-box table tr.top table td {
//                                    width: 100%;
//                                    display: block;
//                                    text-align: center;
//                                }
//
//                                .invoice-box table tr.information table td {
//                                    width: 100%;
//                                    display: block;
//                                    text-align: center;
//                                }
//                            }
//
//                            /** RTL **/
//                            .rtl {
//                                direction: rtl;
//                                font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
//                            }
//
//                            .rtl table {
//                                text-align: right;
//                            }
//
//                            .rtl table tr td:nth-child(2) {
//                                text-align: left;
//                            }
//                        </style>
//                    </head>
//
//                    <body>
//                        <p>Xin cảm ơn quý khách đã tin tưởng và lựa chọn các sản phẩm của chúng tôi</p>
//                        <p>Dưới đây là hóa đơn của quý khách. Chúc quý khách có một ngày vui vẻ</p>
//                        <div class="invoice-box">
//                            <table cellpadding="0" cellspacing="0">
//                                <tr class="top">
//                                    <td colspan="2">
//                                        <table>
//                                            <tr>
//                                                <td class="title">
//                                                    <img src="https://trinhduy.com/view/images/logo.png" style="width:80%; max-width:150px;">
//                                                </td>
//
//                                                <td class="textRight">
//                                                    Số Hóa Đơn: ' . (count(get_bill()) + 1) . '<br>
//                                                    Ngày Tạo: ' . date('d-m-Y H:i') . '<br>
//                                                </td>
//                                            </tr>
//                                        </table>
//                                    </td>
//                                </tr>
//
//                                <tr class="information">
//                                    <td colspan="2">
//                                        <table>
//                                            <tr>
//                                                <td>
//                                                    Người gửi: Ftyler <br>
//                                                    Địa chỉ: Công viên Phần Mềm Quang Trung<br>
//                                                    Tô Ký, Quận 12
//                                                </td>
//
//                                                <td class="textRight">
//                                                    Xin chào: ' . $user['name'] . '<br>
//                                                    Email: ' . $user['email'] . '
//                                                </td>
//                                            </tr>
//                                        </table>
//                                    </td>
//                                </tr>
//
//                                <tr class="heading">
//                                    <td colspan="2">
//                                        Phương thức thanh toán
//                                    </td>
//                                </tr>
//
//                                <tr class="details">
//                                    <td colspan="2">
//                                        Thanh toán khi nhận hàng (COD)
//                                    </td>
//                                </tr>
//
//                                <tr class="heading">
//                                    <td>
//                                        Sản phẩm
//                                    </td>
//                                    <td class="textRight">
//                                        Giá
//                                    </td>
//                                </tr>
//                                ' . $listCart . '
//                                <tr class="total">
//                                    <td></td>
//
//                                    <td class="textRight">
//                                        Tổng Cộng: ' . number_format(tongtien(), 0, '', '.') . ' VNĐ
//                                    </td>
//                                </tr>
//                            </table>
//                        </div>
//                    </body>
//                </html>';
//        sendMail($title, $desc, $user['email']);
//
//        unset($_SESSION['cart']);
//
//        echo json_encode('Bạn đã đặt hàng thành công. Chúng tôi sẽ giao trong vòng 2-3 ngày.');
//        break;
    case 'pagination-catalog':
        $idCata = $_GET['idCata'];
        $page = $_GET['page'];
        $mams = $_GET['mams'];
        $mamh = $_GET['mamh'];
        $kyw = $_GET['kyw'];

        $limitPros = $crCata->proByPage($idCata, 3, $page, $kyw, $mams, $mamh);
        $output = '';

        foreach ($limitPros as $pro) {
            $promotion = ($pro['khuyenmai'] > 0) ? "<del>" . number_format($pro['gia'], 0, '', '.') . "VNĐ</del> - <b>" . $pro['khuyenmai'] . "%</b>" : '';
            $output .='<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <img src="../public/img/newproduct/upload/' . $pro['hinhanhsp'] . '" alt="">
                                <div class="single_product_text">
                                    <h4>' . $pro['tensp'] . '</h4>' . $promotion . '
                                    <h3>' . number_format($crPro->checkKm($pro['gia'], $pro['khuyenmai']), 0, '', '.') . ' VNĐ</h3>
                                    <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>';
        }
        echo json_encode($output);
        break;
    default:
        break;
}
//<---End-Controller--->
?>