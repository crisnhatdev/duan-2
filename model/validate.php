<?php

class Validate {

    function valid_value_insert($input) {
//    $value = ucwords(trim());
//    $value = ucwords(trim($value));
        $output = ucfirst(preg_replace('/\s+/u', ' ', $input));
        return $output;
    }

    function valid_email($str) {
        return (preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/", $str)) ? true : false;
    }

    function valid_pass($str) {
        return (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/", $str)) ? true : false;
    }

    function valid_phone($str) {
        return (preg_match("/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/", $str)) ? true : false;
    }

    function valid_text($str) {
        return (preg_match("/^\w?[^<>%$;:]*$/", $str)) ? true : false;
    }

}

?>