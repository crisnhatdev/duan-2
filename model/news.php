<?php

class News {

    function getNews($malbv = 0, $mabv = 0) {
        $db = new Connect();
        $query = "select a.*, b.*, c.tenkh, c.hinhanhkh, c.gioithieu from baiviet a inner join loaibaiviet b on a.malbv = b.malbv inner join taikhoan c on a.matk = c.matk where 1";

        if ($malbv > 0) {
            $query .= " and b.malbv = $malbv";
        }

        if ($mabv > 0) {
            $query .= " and a.mabv = $mabv";
        }

        return $db->getAll($query);
    }
 
    //lấy danh mục bài viết
    function getCataNews($malbv = 0) {
        $db = new Connect();
        $query = "select * from loaibaiviet where 1";
        if ($malbv > 0) {
            $query .= " and malbv = $malbv";
        }
        return $db->getAll($query);
    }

    function insertSubcriNews($email) {
        $db = new Connect();
        $query = "INSERT INTO `dangky-baiviet`(`email`) VALUES ('$email')";
        $db->execute($query);
    }

//thêm danh mục bài viết
    function them_danhmucbv($tenlbv, $hinhanh) {
        $query = "INSERT INTO loaibaiviet(tenlbv,hinhanh) VALUES(?,?)";
        $db->execute($query, $tenlbv, $hinhanh);
    }

//xoa danh muc san pham
    function xoa_danhmucbv($malbv) {
        $query = "DELETE FROM loaibaiviet WHERE malbv=?";
        $db->execute($query, $malbv);
    }

//cap nhat danh muc san pham
    function capnhat_danhmucbv($tenlbv, $hinhanh, $malbv) {
        if ($hinhanh != "") {
            $query = "UPDATE loaibaiviet SET tenlbv=?,hinhanh=? WHERE malbv=?";
            $db->execute($query, $tenlbv, $hinhanh, $malbv);
        } else {
            $query = "UPDATE loaibaiviet SET tenlbv=? WHERE malbv=?";
            $db->execute($query, $tenlbv, $malbv);
        }
    }

//check trung lap danh mục bai viet
    function check_catenews($condition, $value) {
        $query = "SELECT * FROM `loaibaiviet` WHERE `$condition` = ?";

        $check = false;

        if (is_array($db->getAll_one($query, $value))) {
            $check = true;
        }

        return $check;
    }

}

?>