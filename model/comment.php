<?php

class Comment
{

    //lấy bình luận theo sp || bv
    function getCmt($bang, $tenCot, $ma, $gioihan = 0)
    {
        $db = new Connect();
        $query = "SELECT a.*, b.tenkh ,b.hinhanhkh  FROM $bang a inner join taikhoan b on a.matk = b.matk WHERE a.$tenCot = $ma order by a.ngaydang desc";

        if ($gioihan > 0) {
            $query .= " limit $gioihan";
        }

        return $db->getAll($query);
    }

    function getStarFromCmt($arr, $star)
    {
        $result = array();

        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i]['sao'] == $star) {
                array_push($result, $arr[$i]);
            }
        }

        return $result;
    }

    //đăng bình luận
    function upCmt($bang, $tenCot, $cmt, $sao, $ngaydang, $matk, $ma)
    {
        $db = new Connect();
        $query = "INSERT INTO `$bang` (`noidung`, `sao`, `ngaydang`, `matk`, `$tenCot`) VALUES ('$cmt', '$sao', '$ngaydang', '$matk', '$ma')";

        return $db->execute($query);
    }
    //lay cmt theo bang
    function getCmtBv()
    {
        $db = new Connect();
        $query = "SELECT * FROM binhluanbv  ";
        return $db->getAll($query);
    }
    
    function getCmtPro()
    {
        $db = new Connect();
        $query = "SELECT * FROM binhluansp  ";
        return $db->getAll($query);
    }

    function delCmtBlog($stt)
    {
        $db = new Connect();
        $query = "DELETE FROM binhluanbv WHERE stt = $stt";
        $db->execute($query);
    }

    function delCmtPro($stt)
    {
        $db = new Connect();
        $query = "DELETE FROM binhluansp WHERE stt = $stt";
        $db->execute($query);
    }


    function upContact($email, $phone, $name, $mess)
    {
        $db = new Connect();
        $query = 'INSERT INTO `lienhe`(`email`, `sdt`, `tenkh`, `tinnhan`) VALUES (, $email, $phone, $name, $mess)';

        $db->execute($query);
    }

    function paginationCmts($bang, $tenCot, $hiensp, $idtrang, $ma = 0)
    {
        $db = new Connect();
        $query = "select a.*, b.tenkh, b.hinhanhkh from $bang a inner join taikhoan b on a.matk = b.matk where 1";

        if ($ma > 0) {
            $query .= " and $tenCot = $ma";
        }

        $gioihansp = ($idtrang - 1) * $hiensp;

        $query .= " order by ngaydang desc limit $gioihansp, $hiensp";

        return $db->getAll($query);
    }
    function total_cmt()
    {
        $db = new Connect();
        $query = "SELECT * FROM binhluansp";
        return $db->getAll($query);
    }
}
