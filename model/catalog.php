<?php

class Catalog {

    protected $tenlh = null;
    protected $hinhanhlh = null;

    function __construct() {
        if (func_num_args() === 2) {
            $this->tenlh = func_get_args(1);
            $this->hinhanhlh = func_get_args(2);
        }
    }

    //Hàm lấy danh sách catalog
    function getCata($malh = 0) {
        $db = new Connect();

        $query = "SELECT * FROM loaihang WHERE 1";
        //lấy sp theo mã loại hàng
        if ($malh > 0) {
            $query .= " and malh = $malh";
        }

        $result = $db->getAll($query);
        return $result;
    }

    function insertCata() {
        $db = new Connect();
        $query = "INSERT INTO `loaihang`(`tenlh`, `hinhanhlh`) VALUES ($this->tenlh,$this->hinhanhlh)";
        $result = $db->execute($query);
    }

    function deleCata($malh) {
        $db = new Connect();
        $query = "DELETE FROM `loaihang` WHERE malh = $malh";
        $result = $db->execute($query);
    }

    function updateCata($malh, $tenlh, $hinhanhlh) {
        $db = new Connect();
        $query = "UPDATE `loaihang` SET `tenlh`= $tenlh,`hinhanhlh`= $hinhanhlh WHERE `malh` = $malh";
        $result = $db->execute($query);
    }

}

?>