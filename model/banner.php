<?php

class Banner {

    protected $tieude = null;
    protected $noidung = null;
    protected $hinhanhbn = null;
    protected $link = null;

    function __construct() {
        if (func_num_args() >= 3) {
            $this->tieude = func_get_args(0);
            $this->noidung = func_get_args(1);
            $this->hinhanhbn = func_get_args(2);
            $this->link = func_get_args(3);
        }
    }

    //Hàm lấy danh sách sản phẩm
    function getBanner($mabn = 0, $gioihan = 0) {
        $db = new Connect();

        $query = "SELECT * FROM banner WHERE 1";
        //lấy BANNER theo mã banner
        if ($mabn > 0) {
            $query .= " and mabn = $mabn";
        }
        
        if ($gioihan > 0) {
            $query .= " and limit = $gioihan";
        }

        $result = $db->getAll($query);
        return $result;
    }
    function getBannerId($mabn = 0) {
        $db = new Connect();
        $query = "SELECT * FROM banner WHERE 1";
        if($mabn > 0){
            $query .=" and mabn= $mabn";
        }
        $result = $db->getOne($query);
        return $result;
    }
    function insertBanner($tieude,$noidung,$hinhanh) {
        $db = new Connect();
        $query = "INSERT INTO `banner`(`tieude`, `noidung`, `hinhanhbn`, `link`) VALUES ('$tieude','$noidung','$hinhanh',Null)";
        $result = $db->execute($query);
    }

    function deleBanner($mabn) {
        $db = new Connect();
        $query = "DELETE FROM `banner` WHERE mabn = $mabn";
        $result = $db->execute($query);
    }

    function updateBanner($mabn, $tieude, $noidung, $hinhanhbn,$link) {
        $db = new Connect();
        if($hinhanhbn !=""){
            $query = "UPDATE banner SET tieude='" .$tieude. "',noidung='" .$noidung. "',hinhanhbn='" .$hinhanhbn. "',link='" .$link. "' WHERE mabn = $mabn";
        }
        else{
            $query = "UPDATE banner SET tieude='" .$tieude. "',noidung='" .$noidung. "',link='" .$link. "' WHERE mabn = $mabn";   
        }
        echo $query;
        $result = $db->execute($query);
    }
    function activeBanner($mabn,$active) {
        $db = new Connect();
        $query = "UPDATE banner SET active =$active WHERE mabn = $mabn";
        $result = $db->execute($query);
    }
    function deActiveBanner($mabn,$active) {
        $db = new Connect();
        $query = "UPDATE banner SET active =$active WHERE mabn = $mabn";
        $result = $db->execute($query);
    }
}
