<?php

class Catalog {

    protected $tenlh = null;
    protected $hinhanhlh = null;


// 
//    function __construct() {
//        if (func_num_args() === 2) {
//            $this->tenlh = func_get_args(0);
//            $this->hinhanhlh = func_get_args(1);
//        }
//    }

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
        //Hàm lấy danh sách catalog theo id
    function getCataId($malh) {
        $db = new Connect();
        $query = "SELECT * FROM loaihang WHERE malh=$malh";
        $result = $db->getOne($query);
        return $result;
    }

    //lấy sản phẩm giới hạn theo số trang
    function proByPage($malh = 0, $hiensp = 0, $idtrang = 0, $timsp = '', $filter = '') {
        $db = new Connect();

        $query = "SELECT a.*, b.tenlh FROM sanpham a inner join loaihang b on a.malh = b.malh where 1";

        $idtrang = (int) ($idtrang);
        $gioihansp = ($idtrang - 1 ) * $hiensp;

        if ($malh > 0) {
            $query .= " and a.malh = $malh ";
        }
        //dùng để phân trang trong page tìm kiếm sản phẩm
        if ($timsp != '') {
            $query .= " and lcase(`tensp`) LIKE '%" . strtolower($timsp) . "%'";
        }
        //dùng để phân trang các sản phẩm lọc
        if ($filter != '') {
            $filter = explode('-', $filter);

            $query .= " and a.gia BETWEEN $filter[0] and $filter[1]";
        }

        $query .= " limit $gioihansp, $hiensp";

        $result = $db->getAll($query);
        return $result; // trả về 1 mảng các sp đã theo giới hạn 
    }

    //tính số trang theo tổng số sản phẩm
    function calcPage($arr, $hiensp) {
        $tongloaisp = count($arr); // tổng số sp 

        $sotrang = ceil($tongloaisp / $hiensp); // tính số trang và làm tròn lên

        return $sotrang;
    }

    function insertCata($tenlh, $hinhanhlh) {
        $db = new Connect();
        $query = "INSERT INTO `loaihang`(`tenlh`, `hinhanhlh`) VALUES ('$tenlh','$hinhanhlh')";
        $db->execute($query);
    }

    function delCata($malh) {
        $db = new Connect();
        $query = "DELETE FROM `loaihang` WHERE malh = $malh";
        $db->execute($query);
    }

    function updateCata($malh, $tenlh, $hinhanhlh) {
        $db = new Connect();
        $query = "UPDATE loaihang SET tenlh= '".$tenlh."',hinhanhlh= '".$hinhanhlh."' WHERE malh = $malh";
        $db->execute($query);
    }

    

}

?>