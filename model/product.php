<?php

class Product {

    protected $tensp = null;
    protected $gia = null;
    protected $mota = null;
    protected $khuyenmai = null;
    protected $dacbiet = null;
    protected $ngaynhap = null;
    protected $hinhanhsp = null;
    protected $malh = null;

    function __construct() {
        if (func_num_args() === 7) {
            $this->tensp = func_get_args(0);
            $this->gia = func_get_args(1);
            $this->mota = func_get_args(2);
            $this->khuyenmai = func_get_args(3);
            $this->dacbiet = func_get_args(4);
            $this->ngaynhap = func_get_args(5);
            $this->hinhanhsp = func_get_args(6);
            $this->malh = func_get_args(7);
        }
    }

    //Hàm lấy danh sách sản phẩm
    function getPro($malh = 0, $masp = 0, $dacbiet = 0, $moi = 0, $gioihan = 0, $mams = 0, $mamh = 0) {
        $db = new Connect();
        $order = '';
        $query = "SELECT * FROM loaihang a INNER JOIN sanpham b on a.malh = b.malh INNER JOIN mausac c on b.mams = c.mams INNER JOIN mathang d on d.mamh = b.mamh where 1";
        //lấy sp theo mã loại hàng
        if ($malh > 0) {
            $query .= " and a.malh = $malh";
        }
        //lấy sp theo mã sp
        if ($masp > 0) {
            $query .= " and b.masp = $masp";
        }
        //lấy sp đặc biệt
        if ($dacbiet === 1) {
            $query .= " and b.dacbiet = 1";
        }
        //lấy sp theo màu
        if ($mams > 0) {
            $query .= " and c.mams = $mams";
        }
        //lấy sp theo mặt hàng
        if ($mamh > 0) {
            $query .= " and d.mamh = $mamh";
        }
        //lấy sp mới
        if ($moi === 1) {
            $order = "desc";
        }

        $query .= " order by masp $order";

        // giới hạn sp
        if ($gioihan > 0) {
            $query .= " limit $gioihan";
        }

        $result = $db->getAll($query);
        return $result;
    }

    function findProduct($timsp = '') {
        $db = new Connect();

        $query = "SELECT * FROM loaihang a INNER JOIN sanpham b on a.malh = b.malh INNER JOIN mausac c on b.mams = c.mams INNER JOIN mathang d on d.mamh = b.mamh where 1";
        $query .= " and lcase(`tensp`) LIKE '%" . mb_strtolower($timsp, 'UTF-8') . "%'";

        $result = $db->getAll($query);
        return $result; // trả về 1 mảng các sp đã theo giới hạn 
    }

    //tăng lượt xem
    function upView($bang, $tenCot, $ma) {
        $db = new Connect();
        $query = "UPDATE $bang SET luotxem = luotxem + 1 WHERE $tenCot = $ma";
        $result = $db->execute($query);
    }

    //kiểm tra giá km
    function checkKM($gia, $khuyenmai) {
        if ($khuyenmai > 0) {
            return $gia - $gia * $khuyenmai / 100;
        } else {
            return $gia;
        }
    }

    //lay san pham theo id
    function getProId($masp) {
        $db = new Connect();
        $query = "SELECT * FROM loaihang a INNER JOIN sanpham b on a.malh = b.malh  WHERE masp=$masp";
        $result = $db->getOne($query);
        return $result;
    }

    // nhớ sửa lại mấy hàm
    function insertPro($tensp, $gia, $luotxem, $mota, $mamausac, $mamathang, $khuyenmai, $dacbiet, $ngaynhap, $hinhanhsp, $trangthai, $malh) {
        $db = new Connect();
        $query = "INSERT INTO `sanpham`(`tensp`,`gia`,`luotxem`,`mota`,`mams`,`mamh`,`khuyenmai`,`dacbiet`,`ngaynhap`,`hinhanhsp`,`trangthai`,`malh`) VALUES ('$tensp','$gia','$luotxem','$mota','$mamausac','$mamathang','$khuyenmai','$dacbiet','$ngaynhap','$hinhanhsp','$trangthai','$malh')";
        $result = $db->execute($query);
    }

    function delePro($masp) {
        $db = new Connect();
        $query = "DELETE FROM `sanpham` WHERE masp = $masp";
        $db->execute($query);
    }

    function updatePro($masp, $tensp, $gia, $luotxem, $mota, $mamausac, $mamathang, $khuyenmai, $dacbiet, $ngaynhap, $hinhanhsp, $malh) {
        $db = new Connect();
        if($hinhanhsp !=""){
        $query = "UPDATE sanpham SET tensp='$tensp',gia = '$gia',luotxem='$luotxem',mota ='$mota',mams= '$mamausac', mamh='$mamathang', khuyenmai ='$khuyenmai', dacbiet ='$dacbiet', ngaynhap ='$ngaynhap', hinhanhsp='$hinhanhsp', malh ='$malh' WHERE masp = $masp";
        }
        else{
            $query = "UPDATE `sanpham` SET tensp= " . $tensp . ",gia = " . $gia . ",luotxem=" . $luotxem . ",mota = " . $mota . ",mams=" . $mamausac . ",mamh=" . $mamathang . ", khuyenmai = " . $khuyenmai . ", dacbiet = " . $dacbiet . ", ngaynhap = " . $ngaynhap . ", malh = " . $malh . " WHERE masp = $masp";    
        }
        $result = $db->execute($query);
    }
    function total_pro() {
        $db = new Connect();
        $query = "SELECT * FROM sanpham";
        return $db->getAll($query);
    }

}
