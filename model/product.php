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
    function getPro($malh = 0, $masp = 0, $dacbiet = 0, $moi = 0, $gioihan = 0) {
        $db = new Connect();

        $query = "SELECT * FROM loaihang a INNER JOIN sanpham b on a.malh = b.malh where 1";
        //lấy sp theo mã loại hàng
        if ($malh > 0) {
            $query .= " and a.malh = $malh";
        }
        //lấy sp theo mã sp
        if ($masp > 0) {
            $query .= " and b.masp = $masp";
        }
        //lấy sp đặc biệt
        if ($dacbiet == 1) {
            $query .= " and b.dacbiet = 1";
        }
        //lấy sp mới
        if ($moi == 1) {
            $query .= " order by b.ngaynhap desc";
        }
        // giới hạn sp
        if ($gioihan > 0) {
            $query .= " limit $gioihan";
        }

        $result = $db->getAll($query);
        return $result;
    }

    //tăng lượt xem
    function up_view($bang, $tenCot, $ma) {
        $db = new Connect();
        $query = "UPDATE $bang SET luotxem = luotxem + 1 WHERE $tenCot = $ma";
        $result = $db->execute($query);
    }

    function insertPro() {
        $db = new Connect();
        $query = "INSERT INTO `sanpham`(`tensp`, `gia`, `mota`, `khuyenmai`, `dacbiet`, `ngaynhap`, `hinhanhsp`, `malh`) VALUES ($this->tensp,$this->gia,$this->mota,$this->khuyenmai,$this->dacbiet,$this->ngaynhap,$this->hinhanhsp,$this->malh)";
        $result = $db->execute($query);
    }

    function delePro($masp) {
        $db = new Connect();
        $query = "DELETE FROM `sanpham` WHERE masp = $masp";
        $result = $db->execute($query);
    }

    function updatePro($masp, $tensp, $gia, $mota, $khuyenmai, $dacbiet, $ngaynhap, $hinhanhsp, $malh) {
        $db = new Connect();
        $query = "UPDATE `sanpham` SET `tensp`= $tensp, `gia` = $gia, `mota` = $mota, `khuyenmai` = $khuyenmai, `dacbiet` = $dacbiet, `ngaynhap` = $ngaynhap, `hinhanhsp`= $hinhanhsp, `malh` = $malh WHERE `masp` = $masp";
        $result = $db->execute($query);
    }

}

?>