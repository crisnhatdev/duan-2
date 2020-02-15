<?php

class Product {
//
//    protected $masp = null;
//    protected $tensp = null;
//    protected $gia = null;
//    protected $luotxem = 0;
//    protected $khuyenmai = null;
//    protected $dacbiet = null;
//    protected $ngaynhap = null;
//    protected $hinhanhsp = null;
//    protected $malh = null;
//
    function __construct() {
        if (func_num_args() === 9) {
            $this->$masp = func_get_args(0);
            $this->name = func_get_args(1);
            $this->img = func_get_args(2);
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

}

?>