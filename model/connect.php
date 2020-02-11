<?php
    class Connect{
        var $db = null;
        public function __construct(){
            $dsn = 'mysql:host=localhost; dbname=duan-2';
            $user = 'root';
            $pass = '';
            $this->db=new PDO($dsn,$user,$passa,array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
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
?>