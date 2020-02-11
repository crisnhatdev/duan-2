<?php
    class Catalog{
        var $id = null;
        var $name = null;

        function __construct()
        {
            if(func_num_args()==2){
                $this->id = func_get_args(0);
                $this->name = func_get_args(1);
            }    
        }

        //lay danh sach catalog tu db
        function getList()
        {
            $db = new Connect();
            $select = "SELECT * FROM CATALOG ORDER BY id DESC";
            $result = $db->getList($select);
            return $result;
        }
        //lay thong tin chi tiet san pham theo id
        function getCateById($id)
        {
            $db = new Connect();
            $select = "SELECT * FROM CATALOG WHERE id =$id";
            $result = $db->getInstance($select);
            return $result;
        }
    }
?>