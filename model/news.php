<?php

class News {

    function getNews($malbv = 0, $mabv = 0, $gioihan = 0) {
        $db = new Connect();
        $query = "select a.*, b.*, c.tenkh, c.hinhanhkh, c.gioithieu from baiviet a inner join loaibaiviet b on a.malbv = b.malbv inner join taikhoan c on a.matk = c.matk where 1";
        // $query = "select * from loaibaiviet a INNER JOIN baiviet b on a.malbv= b.malbv INNER JOIN taikhoan c on b.matk = b.matk where 1 ";
        if ($malbv > 0) {
            $query .= " and b.malbv = $malbv";
        }

        if ($mabv > 0) {
            $query .= " and a.mabv = $mabv";
        }

        if($gioihan > 0){
            $query .= " limit $gioihan";
        }

        return $db->getAll($query);
    }

    function findNews($timbv = '') {
        $db = new Connect();

        $query = "select a.*, b.*, c.tenkh, c.hinhanhkh, c.gioithieu from baiviet a inner join loaibaiviet b on a.malbv = b.malbv inner join taikhoan c on a.matk = c.matk where 1";
        $query .= " and lower(tenbv) LIKE '%" . mb_strtolower($timbv, 'UTF-8') . "%' OR lower(motabv) LIKE '%" . mb_strtolower($timbv, 'UTF-8') . "%'";

        $result = $db->getAll($query);
        return $result; // trả về 1 mảng các sp đã theo giới hạn 
    }

    //lấy sản phẩm giới hạn theo số trang
    function newsByPage($mabv = 0, $hienbv = 0, $idtrang = 0, $timbv = '') {
        $db = new Connect();

        $query = " select a.*, b.*, c.tenkh, c.hinhanhkh, c.gioithieu from baiviet a inner join loaibaiviet b on a.malbv = b.malbv inner join taikhoan c on a.matk = c.matk where 1";

        $idtrang = (int) ($idtrang);
        $gioihanbv = ($idtrang - 1 ) * $hienbv;

        if ($mabv > 0) {
            $query .= " and a.malh = $mabv ";
        }
        //dùng để phân trang trong page tìm kiếm sản phẩm
        if ($timbv != '') {
            $query .= " and lcase(`tenbv`) LIKE '%" . strtolower($timbv) . "%'";
        }

        $query .= " limit $gioihanbv, $hienbv";

        $result = $db->getAll($query);
        return $result; // trả về 1 mảng các sp đã theo giới hạn 
    }

    //lấy danh mục bài viết
    function getCataNews(
    $malbv = 0) {
        $db = new Connect();
        $query = "select * from loaibaiviet where 1";
        if ($malbv > 0) {
            $query .= " and malbv = $malbv";
        }
        return $db->getAll($query);
    }

    function insertSubcriNews(
    $email) {
        $db = new Connect();
        $query = "INSERT INTO `dangky-baiviet`(`email`) VALUES ('$email')";
        $db->execute($query
        );
    }
      //Hàm lấy danh sách catalog theo id
      function getCataNewsId($malbv) {
        $db = new Connect();
        $query = "SELECT * FROM loaibaiviet WHERE malbv=$malbv";
        $result = $db->getOne($query);
        return $result;
    }


//thêm danh mục bài viết
    function them_danhmucbv($tenlbv, $hinhanh) {
        $db = new Connect();
        $query = "INSERT INTO `loaibaiviet`(`tenlbv`, `hinhanh`) VALUES ('$tenlbv','$hinhanh')";
        $db->execute($query);
    }

//xoa danh muc san pham
    function xoa_danhmucbv($malbv) {
        $db = new Connect();
        $query = "DELETE FROM loaibaiviet WHERE malbv = $malbv";
        $db->execute($query);
    }

//cap nhat danh muc san pham
    function capnhat_danhmucbv($tenlbv, $hinhanh, $malbv) {
        $db = new Connect();
        $query = "UPDATE loaibaiviet SET tenlbv= '" . $tenlbv . "', hinhanh= '" . $hinhanh . "' WHERE malbv = $malbv";
        $db->execute($query);
        }

//check trung lap danh mục bai viet
    function check_catenews($condition, $value) {
        $db = new Connect();
        $query = "  SELECT * FROM `loaibaiviet` WHERE `$condition` = ?";

        $check = false;

        if (is_array($db->getAll($query, $value))) {
            $check = true;
        }

        return $check;
    }

}

?>