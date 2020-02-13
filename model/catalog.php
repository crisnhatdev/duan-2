<?php

class Catalog {

    protected $id = null;
    protected $name = null;
    protected $img = null;

    function __construct() {
        if (func_num_args() === 3) {
            $this->id = func_get_args(0);
            $this->name = func_get_args(1);
            $this->img = func_get_args(2);
        }
    }

    //Hàm lấy danh sách catalog
    function getCata() {
        $db = new Connect();
        $query = "SELECT * FROM loaihang";
        $result = $db->getAll($query);
        return $result;
    }

    //Hàm lấy catalog theo id
    function getCataById($id) {
        $db = new Connect();
        $query = "SELECT * FROM loaihang WHERE malh = $id";
        $result = $db->getOne($query);
        return $result;
    }

}

?>