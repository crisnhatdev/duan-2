<?php

class Cart extends Product {

    function add_item($masp, $soluong) {
        $db = new Connect();
        $sp = $this->getPro(0, $masp)[0];

        if (isset($_SESSION['cart'][$masp])) {
            $soluong += $_SESSION['cart'][$masp]['soluong'];
            $this->update_item($masp, $soluong);
            return;
        }

        $arrSp = array(
            'masp' => $sp['masp'],
            'tensp' => $sp['tensp'],
            'khuyenmai' => $sp['khuyenmai'],
            'gia' => $sp['gia'],
            'tenmau' => $sp['tenmau'],
            'mams' => $sp['mams'],
            'mamh' => $sp['mamh'],
            'hinhanhsp' => $sp['hinhanhsp'],
            'soluong' => $soluong
        );
        $_SESSION['cart'][$masp] = $arrSp;
    }

    function update_item($masp, $soluong) {
        $db = new Connect();
        $soluong = (int) $soluong;
        if ($soluong <= 0) {
            //Thực hiện hủy phần tử trong giỏ hàng nếu người dùng nhập giá trị số lượng <=0 
            unset($_SESSION['cart'][$masp]);
        } else if ($soluong >= 5) {
            $_SESSION['cart'][$masp]['soluong'] = 5;
        } else {
            // Thực hiện cập nhật số lượng và thành tiền của sản phẩm trong giỏ hàng
            // với mảng biến $_SESSION['cart'] tại vị trí $masp của mảng
            $_SESSION['cart'][$masp]['soluong'] = $soluong;
        }
    }

// nếu có khuyến mãi trả về giá đã trừ khuyến mãi
    function checkKm($gia, $khuyenmai) {
        $db = new Connect();
        if ($khuyenmai > 0) {
            return $gia - $gia * $khuyenmai / 100;
        } else {
            return $gia;
        }
    }

// tổng tiền của nguyên hóa đơn
    function tongtien() {
        $db = new Connect();
        $tongtien = 0;
        $cartItems = $_SESSION['cart'];
        foreach ($cartItems as $item) {
            $tongtien += $item['soluong'] * $this->checkKm($item['gia'], $item['khuyenmai']);
        }
        return $tongtien;
    }

    function get_bill($matk = 0, $sdt = '') {
        $db = new Connect();
        $query = "select * from hoadon where 1";
        if ($matk > 0) {
            $query .= " and matk = $matk";
        }
        if ($sdt != '') {
            $query .= " and sdt = $sdt";
        }
        return $db->getAll($query);
    }

    function get_bill_($mahd = 0) {//$matk=0,$tenkh,$sdt,$email,$diachi,$ngaymua,$tongtien
        $db = new Connect();
        $query = "SELECT * FROM hoadon";
        if ($mahd > 0) {
            $query .=" and a.mahd = $mahd ";
        }
        // if($matk >0){
        //     $query .=" and a.matk = $matk";
        // }
        return $db->getAll($query);
    }

    function get_bill_by_page($mahd=0,$hienBill,$idtrang) {//phan trang hoa don admin
        $db = new Connect();
        $query = "SELECT * FROM hoadon a INNER JOIN hoadonchitiet b on a.mahd = b.mahd where 1";
        if($mahd >0){
            $query .=" and a.mahd = $mahd ";
        }
        $idtrang = (int) ($idtrang);
        $gioihanBill = ($idtrang - 1 ) * $hienBill;

        $query .= " limit $gioihanBill, $hienBill ";
        
        $result = $db->getAll($query);
        return $result; // trả về 1 mảng các sp đã theo giới hạn 
    }


    function get_bill_details($mahd = 0, $matk = 0) {//$matk=0,$tenkh,$sdt,$email,$diachi,$ngaymua,$tongtien
        $db = new Connect();
        $query = "SELECT * FROM hoadonchitiet a INNER JOIN sanpham b on a.masp = b.masp where 1";
        if ($mahd > 0) {
            $query .=" and a.mahd = $mahd ";
        }
        if ($matk > 0) {
            $query .=" and a.matk = $matk";
        }
        return $db->getAll($query);
    }

    function del_bill($mahd = 0) {
        $db = new Connect();
        if ($mahd > 0) {
            $query = " DELETE FROM hoadon where mahd = $mahd ";
        }
        $db->execute($query);
    }

    function del_bill_details($masp = 0) {
        $db = new Connect();
        if ($masp > 0) {
            $query = " DELETE FROM hoadonchitiet where masp = $masp ";
        }
        $db->execute($query);
    }

    function add_bill($mahd, $tenkh, $sdt, $email = '', $diachi, $ngaymua, $tongtien, $ghichu, $matk = 0) {
        $db = new Connect();
        if ($matk > 0) {
            $query = "INSERT INTO `hoadon`(`mahd`, `tenkh`, `sdt`, `email`, `diachi`, `ngaymua`, `tongtien`, `ghichu`, `matk`) VALUES ($mahd, '$tenkh', '$sdt', '$email', '$diachi', '$ngaymua', $tongtien, '$ghichu', $matk)";
        } else {
            $query = "INSERT INTO `hoadon`(`mahd`, `tenkh`, `sdt`, `diachi`, `ngaymua`, `tongtien`, `ghichu`) VALUES ($mahd, '$tenkh', '$sdt', '$diachi', '$ngaymua', $tongtien, '$ghichu')";
        }
        $db->execute($query);
    }

    function add_detail_bill($soluong, $dongia, $mahd, $masp) {
        $db = new Connect();
        $query = "INSERT INTO `hoadonchitiet`(`soluong`, `dongia`, `mahd`, `masp`) VALUES ($soluong, $dongia, $mahd, $masp)";
        $db->execute($query);
    }

    function del_qtt($soluong, $masp) {
        $db = new Connect();
        $query = "UPDATE `sanpham` SET `soluong` = soluong - $soluong WHERE masp = $masp";
        $db->execute($query);
    }
    function check_status_bill($status){
        $stt ='';
        if ($status == 1) {
            $stt = 'Đã xác nhận';
        } else if ($status == 2) {
            $stt = 'Đã lấy hàng';
        } else if ($status== 3) {
            $stt = 'Đã giao hàng';
        } else if ($status== 4) {
            $stt = 'Khách hủy';
        } else if ($status == 5) {
            $stt = 'Hệ thống hủy';
        } else {
            $stt = 'Chờ xác nhận';
        }
        return $stt;
    }

    function check_st($matt) {
        $arr = array('Chờ Xác Nhận', 'Đã Xác Nhận', 'Đã Lấy Hàng', 'Đã Giao Hàng', 'Khách Hủy', 'Hệ Thống Hủy');
        return $arr[$matt];
    }

}

?>