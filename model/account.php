<?php

class Account {

    function all_user() {
        $db = new Connect();
        $query = "select * from taikhoan";

        return $db->getAll($query);
    }

//hàm kiểm tra xem email hoặc sdt đã có người đăng ký chưa
//nếu chưa thì trả về false
    function check_register($col, $val) {
        $db = new Connect();
        $query = "SELECT * FROM `taikhoan` WHERE `$col` = $val";

        $check = false;

        if (is_array($db->getOne($query))) {
            $check = true;
        }

        return $check;
    }

//hàm đăng ký 
    function register($name, $phone, $pass, $address, $email, $gender, $phanquyen) {
        $db = new Connect();
        $query = "INSERT INTO `taikhoan`(`tenkh`, `sdt`, `matkhau`, `diachi`, `email`,`gioitinh`,`phanquyen`) VALUES ($name,$phone,$pass,$address,$email,$gender,$phanquyen)";

        $db->execute($query);
    }

//lấy info account
    function info_acc($matk) {
        $db = new Connect();
        $query = "select * from taikhoan where matk = $matk";

        return $db->getOne($query);
    }

//hàm update info
    function update_info($name, $address, $gender, $idAcc) {
        $db = new Connect();
        $query = "UPDATE `taikhoan` SET `tenkh`=$name,`diachi`=$address,`gioitinh`= $gender WHERE matk = $idAcc";

        $db->execute($query);
    }

//xóa acc
    function del_acc($matk) {
        $db = new Connect();
        $query = "DELETE FROM `taikhoan` WHERE matk = $matk";

        $db->execute($query);
    }

//thêm cookie
    function addCookie($name, $value, $day) {
        setcookie($name, $value, time() + (86400 * $day), "/");
    }

    function deleteCookie($name) {
        add_cookie($name, "", -1);
    }

    // kiểm tra ck có tồn tại không
    function checkCookie($ckName) {
        if (isset($_COOKIE[$ckName])) {
            return $_COOKIE[$ckName];
        }
    }

    // kiểm tra ss có tồn tại không
    function checkSs($ssName) {
        if (isset($_SESSION[$ssName])) {
            return $_SESSION[$ssName];
        }
    }

//lấy dữ liệu theo tên từ mảng truyền vào từ client
    function searchForValue($name, $array) {
        foreach ($array as $value) {
            if ($value['name'] === $name) {
                return $value['value'];
            }
        }
        return null;
    }

//hàm lấy user theo cột và giá trị

    function get_user_by($col, $val) {
        $db = new Connect();
        $query = "select * from taikhoan where $col = $val";

        return $db->getOne($query);
    }

//update user
    function update_user_by($col1, $val1, $col2, $val2) {
        $db = new Connect();
        $query = "UPDATE `taikhoan` SET `$col1`= $val1 WHERE $col2 = $val2";

        $db->execute($query);
    }

//mã hóa dữ liệu
    function bcrypt_password($pass) {
        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        return $hashed;
    }

//check dữ liệu nếu giống nhau
    function bcrypt_verify($pass, $hashed) {
        $isValid = password_verify($pass, $hashed);

        return $isValid;
    }

}

?>