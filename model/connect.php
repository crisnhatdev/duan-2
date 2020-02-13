<?php
<<<<<<< HEAD

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

=======
    class Connect{
        var $db = null;
        public function __construct(){
            $dsn = 'mysql:host=localhost; dbname=duan-2';
            $user = 'root';
            $pass = '';
            $this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
        }
        //lay tac ca du lieu tu db
        public function getList($select){
            $result = $this->db->query($select);
            return $result;
        }
        //tao phuong thuc lay 1 ket qua cua bang
        public function getInstance($select){
            $results = $this->db->query($select);
            $result = $results->fetch();
            return $result;
        }
        //tao phuong thuc thuc thi cac cau lenh Insert,delete,update...
        public function execute($query){
            $result = $this->db->exec($query);
            return $result;
        }

    }
>>>>>>> 8ada7d6bd9ca5217b540d15b8b398d7cbe4ba7a4
?>