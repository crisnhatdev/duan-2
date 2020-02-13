<?php
<<<<<<< HEAD

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

=======
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
>>>>>>> 8ada7d6bd9ca5217b540d15b8b398d7cbe4ba7a4
?>