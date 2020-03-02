<?php

//Model
session_start();
require_once '../../model/connect.php';
require_once '../../model/catalog.php';
require_once '../../model/product.php';
require_once '../../model/comment.php';
require_once '../../model/validate.php';
require_once '../../model/news.php';
require_once '../../model/cart.php';
require_once '../../model/account.php';
require_once '../../model/phpmailer.php';
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
// <---End-News--->
//Cart
$crCart = new Cart();
// <---End-Cart--->
//Acc
$crAcc = new Account();
// <---End-Acc--->
//Mail
$crMail = new PHPMail();
// <---End-Mail--->
//Controller
$type = $_REQUEST['type'];
$errArr = array();
$succesArr = array();
switch ($type) {
    case 'comments-product':
        $bang = 'binhluansp';
        $tenCot = 'masp';
        $cmt = $crValid->valid_value_insert($_REQUEST['arrData'][0]['value']); //nội dung đánh giá
        $sao = $_REQUEST['arrData'][1]['value'][0]; //lấy giá trị index = 0 trong mảng arrDat và string đầu tiên (i = 0)
        $ngaydang = date("Y:m:d H:i:s"); //ngày
        $matk = $_SESSION['user']['id']; // mã tk đánh giá
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
                                        <img style="height: 60px; width: 60px; border-radius: 100%; object-fit: cover" src="../public/img/user/' . $newCmt['hinhanhkh'] . '" alt="" />
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
                                        <img style="height: 60px; width: 60px; border-radius: 100%; object-fit: cover" src="../public/img/user/' . $cmt['hinhanhkh'] . '" alt="" />
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
    case 'add':
        $masp = $_GET['masp'];

        $soluong = (isset($_GET['soluong'])) ? $_GET['soluong'] : 1;

        $crCart->add_item($masp, $soluong);

//        $arr = load_cart();

        echo json_encode(count($_SESSION['cart']));
        break;
//    case 'remove':
//        $maspct = $_GET['maspct'];
//
//        unset($_SESSION['cart'][$maspct]);
//
//        $arr = load_cart();
//
//        echo json_encode($arr);
//        break;
    case 'update':
        $masp = $_GET['masp'];

        $soluong = $_GET['soluong'];

        $crCart->update_item($masp, $soluong);

        $cartList = $_SESSION['cart'];
        $output = '';
        foreach ($cartList as $item) {
            $promotion = ($item['khuyenmai'] > 0) ? "<del style='color: #000'>" . number_format($item['gia'], 0, '', '.') . " VNĐ</del> - <b>" . $item['khuyenmai'] . "%</b>" : '';
            $output .= '<tr>
                    <td>' . $item['masp'] . '</td>
                    <td>
                        <div class="media">
                            <div class="d-flex">
                                <a href=".?act=product&masp=' . $item['masp'] . '"><img style="width: 160px" src="../public/img/newproduct/upload/' . $item['hinhanhsp'] . '" alt="" /></a>
                            </div>
                            <div class="media-body">
                                <a href=".?act=product&masp=' . $item['masp'] . '"><p>' . $item['tensp'] . '</p></a>
                            </div>
                        </div>
                    </td>
                    <td>
                        ' . $promotion . '
                        <h5><b>' . number_format($crPro->checkKm($item['gia'], $item['khuyenmai']), 0, '', '.') . ' VNĐ</b></h5>
                    </td>
                    <td>
                        <div class="product_count">
                            <span class="input-number-decrement"> <i class="ti-angle-down qty_btn "></i></span>
                            <input class="input-number qty_input" type="text" value="' . $item['soluong'] . '" min="1" max="5" onchange="(this.value > 5) ? this.value = 5 : this.value">
                            <span class="input-number-increment"> <i class="ti-angle-up qty_btn "></i></span>
                        </div>
                    </td>
                    <td>
                        <h5>' . number_format($crPro->checkKm($item['gia'], $item['khuyenmai']) * $item['soluong'], 0, '', '.') . ' VNĐ</h5>
                    </td>
                    <td  class="text-center" >
                        <i class="fa fa-trash" style="cursor: pointer" aria-hidden="true"></i>
                    </td>
                </tr>';
        }
        $ship = ($crCart->tongtien() > 1000000) ? 'Free Ship' : number_format(30000, '0', '', '.');
        $output .= '<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Tổng Cộng: </h5>
                            </td>
                            <td>
                                <h5>' . number_format($crCart->tongtien(), '0', '', '.') . ' VNĐ</h5>
                            </td>
                        </tr>
                        <tr class="shipping_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Shipping: </h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li class="active">
                                            <a href="#/">Ship COD:' . $ship . ' VNĐ</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>';

        if (count($cartList) === 0) {
            $output = '<tr><td colspan="6"><h1 class="text-center text-danger">Giỏ hàng trống<h1></td></tr>';
        }

        echo json_encode(array($output, count($cartList)));
        break;
    case 'checkout':
        //lấy địa chỉ và ghi chú
        $data = $_POST['orderForm'];
        $address = $crValid->valid_value_insert($data[2]['value']);
        $note = $crValid->valid_value_insert($data[3]['value']);
        //dữ liệu cần thiết
        $mahd = $crCart->get_bill() + 1;
        $ngaymua = date('Y-m-d H:i:s');
        $tongtien = $crCart->tongtien('cart');
        $user = $_SESSION['user'];
        //validate address
        if (!$crValid->valid_text($address) || $address === '') {
            $errArr['error_address'] = 'Bạn không được để trống hoặc có ký tự đặc biệt';
        }
        //validate note
        if (!$crValid->valid_text($note)) {
            $errArr['error_note'] = 'Bạn không được sử dụng ký tự đặc biệt';
        }

        if (count($errArr) === 0) {
            $crAcc->update_user_by('diachi', $address, 'matk', $user['id']); //update địa chỉ cho user

            $crCart->add_bill($mahd, $user['name'], $user['phone'], $user['email'], $user['address'], $ngaymua, $tongtien, $note, $user['id']); //thêm bill vào db

            $cartPros = $_SESSION['cart'];
            $listCart = '';
            foreach ($cartPros as $key => $pro) {
                //xóa số lượng sp
                $crCart->del_qtt($pro['soluong'], $key);
                //thêm hóa đơn chi tiết. giá là giá đã tính sẵn khuyến mãi
                $crCart->add_detail_bill($pro['soluong'], $crCart->checkKm($pro['gia'], $pro['khuyenmai']), $mahd, $key);

                $listCart .= '<tr class="item">
                        <td style="display: flex; align-items: center;">
                            <img src="localhost/php2/asm/public/img/newproduct/upload/' . $pro['hinhanhsp'] . '" style="width:40px; height:40px; margin-right: 5px;">
                            <span>   
                                <b>' . $pro['tensp'] . ' x ' . $pro['soluong'] . '</b><br>
                            </span>    
                        </td>
                        <td style="text-align: right;">
                            ' . number_format($crCart->checkKm($pro['gia'], $pro['khuyenmai']) * $pro['soluong'], 0, '', '.') . ' VNĐ
                        </td>
                    </tr>';
            }

            $title = 'Hóa đơn mua hàng';
            $desc = '<!doctype html>
                <html>
                    <head>
                        <meta charset="utf-8">

                        <style>
                            .invoice-box {
                                max-width: 800px;
                                margin: auto;
                                padding: 30px;
                                border: 1px solid #eee;
                                box-shadow: 0 0 10px rgba(0, 0, 0, .15);
                                font-size: 16px;
                                line-height: 24px;
                                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                                color: #555;
                            }

                            .invoice-box table {
                                width: 100%;
                                line-height: inherit;
                                text-align: left;
                            }

                            .invoice-box table td {
                                padding: 5px;
                                vertical-align: top;
                            }

                            .invoice-box table tr td:nth-child(2) {
                                text-align: right;
                            }

                            .invoice-box table tr.top table td {
                                padding-bottom: 20px;
                            }

                            .invoice-box table tr.top table td.title {
                                font-size: 45px;
                                line-height: 45px;
                                color: #333;
                            }

                            .invoice-box table tr.information table td {
                                padding-bottom: 40px;
                            }

                            .invoice-box table tr.heading td {
                                background: #eee;
                                border-bottom: 1px solid #ddd;
                                font-weight: bold;
                            }

                            .invoice-box table tr.details td {
                                padding-bottom: 20px;
                            }

                            .invoice-box table tr.item td{
                                border-bottom: 1px solid #eee;
                            }

                            .invoice-box table tr.item.last td {
                                border-bottom: none;
                            }

                            .invoice-box table tr.total td:nth-child(2) {
                                font-weight: bold;
                            }

                            .invoice-box table tr .textRight {
                                text-align: right;
                            }

                            @media only screen and (max-width: 600px) {
                                .invoice-box table tr.top table td {
                                    width: 100%;
                                    display: block;
                                    text-align: center;
                                }

                                .invoice-box table tr.information table td {
                                    width: 100%;
                                    display: block;
                                    text-align: center;
                                }
                            }

                            /** RTL **/
                            .rtl {
                                direction: rtl;
                                font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                            }

                            .rtl table {
                                text-align: right;
                            }

                            .rtl table tr td:nth-child(2) {
                                text-align: left;
                            }
                        </style>
                    </head>

                    <body>
                        <p>Xin cảm ơn quý khách đã tin tưởng và lựa chọn các sản phẩm của chúng tôi</p>
                        <p>Dưới đây là hóa đơn của quý khách. Chúc quý khách có một ngày vui vẻ</p>
                        <div class="invoice-box">
                            <table cellpadding="0" cellspacing="0">
                                <tr class="top">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td class="title">
                                                    <img src="localhost/php2/asm/public/img/logo.png" style="width:80%; max-width:150px;">
                                                </td>

                                                <td class="textRight">
                                                    Số Hóa Đơn: ' . ($crCart->get_bill() + 1) . '<br>
                                                    Ngày Tạo: ' . date('d-m-Y H:i') . '<br>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr class="information">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td>
                                                    Người gửi: Sweet House <br>
                                                    Địa chỉ: Công viên Phần Mềm Quang Trung<br>
                                                    Tô Ký, Quận 12
                                                </td>

                                                <td class="textRight">
                                                    Xin chào: ' . $user['name'] . '<br>
                                                    Email: ' . $user['email'] . '
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr class="heading">
                                    <td colspan="2">
                                        Phương thức thanh toán
                                    </td>
                                </tr>

                                <tr class="details">
                                    <td colspan="2">
                                        Thanh toán khi nhận hàng (COD)
                                    </td>
                                </tr>

                                <tr class="heading">
                                    <td>
                                        Sản phẩm
                                    </td>
                                    <td class="textRight">
                                        Giá
                                    </td>
                                </tr>
                                ' . $listCart . '
                                <tr class="total">
                                    <td></td>

                                    <td class="textRight">
                                        Tổng Cộng: ' . number_format($crCart->tongtien(), 0, '', '.') . ' VNĐ
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </body>
                </html>';
            $crMail->sendMail($title, $desc, $user['email']);
            unset($_SESSION['cart']);

            $succesArr['success_field'] = 'Chúng tôi sẽ liên hệ trong thời gian sớm nhất. Sweet House xin cám ơn';
            $succesArr['direct'] = '.';
            echo json_encode($succesArr);
        } else {
            echo json_encode($errArr);
        }
        break;
    case 'checkout-no-lg':
        //lấy địa chỉ, ghi chú, phone, tên
        $data = $_POST['orderForm'];
        $name = $crValid->valid_value_insert($data[0]['value']);
        $phone = $data[1]['value'];
        $address = $crValid->valid_value_insert($data[2]['value']);
        $note = $crValid->valid_value_insert($data[3]['value']);

        //dữ liệu cần thiết
        $mahd = $crCart->get_bill() + 1;
        $ngaymua = date('Y-m-d H:i:s');
        $tongtien = $crCart->tongtien('cart');
        $user = 0;

        //validate name
        if (!$crValid->valid_text($name) || $name === '') {
            $errArr['error_name'] = 'Bạn không được để trống hoặc có ký tự đặc biệt';
        }
        //validate phone
        if (!$crValid->valid_phone($phone) || $phone === '') {
            $errArr['error_phone'] = 'Bạn không được để trống hoặc có ký tự đặc biệt';
        }
        //validate address
        if (!$crValid->valid_text($address) || $address === '') {
            $errArr['error_address'] = 'Bạn không được để trống hoặc có ký tự đặc biệt';
        }
        //validate note
        if (!$crValid->valid_text($note)) {
            $errArr['error_note'] = 'Bạn không được sử dụng ký tự đặc biệt';
        }

        if (count($errArr) === 0) {
            $crCart->add_bill($mahd, $name, $phone, '', $address, $ngaymua, $tongtien, $note); //thêm bill vào db
            $cartPros = $_SESSION['cart'];

            foreach ($cartPros as $key => $pro) {
                //xóa số lượng sp
                $crCart->del_qtt($pro['soluong'], $key);
                //thêm hóa đơn chi tiết. giá là giá đã tính sẵn khuyến mãi
                $crCart->add_detail_bill($pro['soluong'], $crCart->checkKm($pro['gia'], $pro['khuyenmai']), $mahd, $key);
            }

            unset($_SESSION['cart']);

            $succesArr['success_field'] = 'Chúng tôi sẽ liên hệ trong thời gian sớm nhất. Sweet House xin cám ơn';
            $succesArr['direct'] = '.';
            echo json_encode($succesArr);
        } else {
            echo json_encode($errArr);
        }
        break;
    case 'pagination-catalog':
        $idCata = $_GET['idCata'];
        $page = $_GET['page'];
        $mams = $_GET['mams'];
        $mamh = $_GET['mamh'];
        $kyw = $_GET['kyw'];

        $limitPros = $crCata->proByPage($idCata, 3, $page, $kyw, $mams, $mamh);
        $output = '';

        foreach ($limitPros as $pro) {
            $promotion = ($pro['khuyenmai'] > 0 ) ? "<del>" . number_format($pro['gia'], 0, '', '.') . "VNĐ</del> - <b>" . $pro['khuyenmai'] . "%</b>" : '';
            $output .='<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <a href=".?act=product&masp=' . $pro['masp'] . '">
                                    <img src="../public/img/newproduct/upload/' . $pro['hinhanhsp'] . '" alt="">
                                </a>
                                <div class="single_product_text">
                                    <h4>' . $pro['tensp'] . '</h4>' . $promotion . '
                                    <h3>' . number_format($crPro->checkKm($pro['gia'], $pro['khuyenmai']), 0, '', '.') . ' VNĐ</h3>
                                    <input type="hidden" name="masp" value="' . $pro['masp'] . '"/>
                                    <a href="#/" class="add_cart add_to_cart_button">+ Thêm vào giỏ<i class="ti-heart"></i></a>
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