<?php

session_start();
require_once '../../model/connect.php';
require_once '../../model/catalog.php';
//include '../../model/product.php';
//include '../../model/cate.php';
//include '../../model/cart.php';
//include '../../model/validate.php';
//include '../../model/phpmailer.php';
//include './fetchshop.php';

date_default_timezone_set("Asia/Ho_Chi_Minh");

$type = $_GET['type'];

switch ($type) {
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
    case 'pagination':
        json_encode(123);
        $proByCata = new Catalog();

        $idCata = $_GET['idCata'];
        $page = $_GET['page'];
        $kyw = $_GET['kyw'];
        $filter = $_GET['filter'];

        $limitPros = $proByCata->proByPage($idCata, 3, $page, $kyw, $filter);
        $output = '1234567';
//        foreach ($limitPros as $pro) {
//            $output .= '<li class="product type-product">
//                            <article class="vertical-item text-center women">
//                                <div class="item-media-wrap bottommargin_25">
//                                    <div class="item-media"> 
//                                        <a href=".?act=product&masp=' . $pro['masp'] . '&mams=' . get_detailPro($pro['masp'])[0]['mams'] . '">
//                                            <img src="view/images/shop/' . $pro['hinhanhsp'] . '" alt="" />
//                                            <img src="view/images/shop/' . substr($pro['hinhanhsp'], 0, strrpos($pro['hinhanhsp'], '.jpg')) . '-1' . substr($pro['hinhanhsp'], strrpos($pro['hinhanhsp'], '.jpg')) . '" alt="" />
//                                        </a>
//                                        <div class="product_buttons darklinks">
//                                            <a class="p-view prettyPhoto " data-gal="prettyPhoto[product1-gal]" href="view/images/shop/' . $pro['hinhanhsp'] . '" data-toggle="tooltip" title="Phóng to hình">
//                                                <i class="qtyler-external"></i>
//                                                <span class="sr-only">Phóng to hình</span>
//                                            </a>
//                                            <a class="p-view prettyPhoto sr-only" title="" data-gal="prettyPhoto[product1-gal]" href="view/images/shop/' . $pro['hinhanhsp'] . '"></a>
//                                        </div>
//                                    </div>    
//                                </div>
//                                <div class="item-content">
//                                    <h3 class="entry-title"> <a href=".?act=product&masp=' . $pro['masp'] . '&mams=' . get_detailPro($pro['masp'])[0]['mams'] . '">' . $pro['tensp'] . '</a> </h3>
//                                    <div class="price"> <span class="amount">' . number_format($pro['gia']) . '</span> VNĐ</div>
//                                </div>   
//                            </article>
//                        </li>';
//        }

        echo json_encode($output);
        break;
    default:
        break;
}
?>