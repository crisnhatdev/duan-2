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

    //Hàm lấy danh sách catalog
    function getPro() {
        $db = new Connect();
        $query = "SELECT * FROM sanpham";
        $result = $db->getAll($query);
        return $result;
    }

    //Hàm lấy catalog theo id
    function getProById($id) {
        $db = new Connect();
        $query = "SELECT * FROM sanpham WHERE masp = $id";
        $result = $db->getOne($query);
        return $result;
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