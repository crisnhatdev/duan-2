<?php

class Connect {

    protected $db = null;

    public function __construct() {
        $dsn = 'mysql:host=localhost:3308; dbname=php2';
        $user = 'root';
        $pass = '';
        $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    //Hàm lấy tất cả dữ liệu -> return array
    public function getAll($query) {
        //nhận chuỗi query
        $result = $this->db->prepare($query);
        //thực thi query trả về mảng
        $result->execute();
        return $result->fetchAll();
    }

    //Hàm lấy 1 giá trị -> return giá trị
    public function getOne($query) {
        //nhận chuỗi query
        $result = $this->db->prepare($query);
        //thực thi query trả về 1 phần tử
        $result->execute();
        return $result->fetch();
    }

    //Hàm thực thi các câu lệnh Insert, Delete, Update...
    public function execute($query) {
        $result = $this->db->exec($query);
        return $result;
    }

}

?>