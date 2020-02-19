<?php

class Color {

    protected $tenmau = null;

// 
//    function __construct() {
//        if (func_num_args() === 2) {
//            $this->tenlh = func_get_args(0);
//            $this->hinhanhlh = func_get_args(1);
//        }
//    }
    //Hàm lấy danh sách catalog
    function getCl($mams = 0) {
        $db = new Connect();

        $query = "SELECT * FROM mausac WHERE 1";
        //lấy sp theo mã loại hàng
        if ($mams > 0) {
            $query .= " and mams = $mams";
        }

        $result = $db->getAll($query);
        return $result;
    }

//    function insertCata($tenlh, $hinhanhlh) {
//        $db = new Connect();
//        $query = "INSERT INTO `loaihang`(`tenlh`, `hinhanhlh`) VALUES ('$tenlh','$hinhanhlh')";
//        $db->execute($query);
//    }
//
//    function delCata($malh) {
//        $db = new Connect();
//        $query = "DELETE FROM `loaihang` WHERE malh = $malh";
//        $db->execute($query);
//    }
//
//    function updateCata($malh, $tenlh, $hinhanhlh) {
//        $db = new Connect();
//        $query = "UPDATE `loaihang` SET `tenlh`= $tenlh,`hinhanhlh`= $hinhanhlh WHERE `malh` = $malh";
//        $db->execute($query);
//    }
}

?>