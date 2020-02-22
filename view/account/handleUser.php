<?php

//Model
session_start();
require_once '../../model/connect.php';
require_once '../../model/catalog.php';
require_once '../../model/product.php';
require_once '../../model/comment.php';
require_once '../../model/validate.php';
require_once '../../model/news.php';
//<---End-Model---->
date_default_timezone_set("Asia/Ho_Chi_Minh");

//Catalog
$crCata = new Catalog();
// <---End-Catalog--->
//Product
$crPro = new Product();
// <---End-Product--->
//Comment
$crComm = new Comment();
// <---End-Comment--->
//Validate
$crValid = new Validate();
// <---End-Validate--->
//News
$crNews = new News();
// <---End-News--->
//Controller
$type = $_REQUEST['type'];
$errArr = array();

if ($type) {
    switch ($type) {
        case 'subscribe':
            $email = $_POST['arrData'][0]['value']; //email đăng ký nhận tin

            if (!$crValid->valid_text($email) || $email == '') {
                $errArr['error_field'] = 'Bạn không được để trống các ô có dấu * hoặc sử dụng ký tự đặc biết';
                echo json_encode($errArr);
                return;
            }

            if (!$crValid->valid_email($email)) {
                $errArr['error_field'] = 'Email không đúng định dạng';
                echo json_encode($errArr);
                return;
            }

            $crNews->insertSubcriNews($email);
            $errArr['success_field'] = 'Bạn đã đăng ký nhận tin thành công';
            echo json_encode($errArr);
            break;
        case 'contact':
            $data = $_POST['arrData'];

            $name = valid_value_insert($data[0]['value']);
            $email = $data[1]['value'];
            $phone = $data[2]['value'];
            $mess = valid_value_insert($data[3]['value']);

            foreach ($data as $value) {
                if (!valid_text($value['value']) || $value['value'] == '') {
                    $errArr['error_field'] = 'Bạn không được để trống các ô có dấu * hoặc sử dụng ký tự đặc biết';
                    echo json_encode($errArr);
                    return;
                }
            }

            if (!valid_phone($phone)) {
                $errArr['phone_field'] = 'Số điện thoại không đúng định dạng';
                echo json_encode($errArr);
                return;
            }

            if (!valid_email($email)) {
                $errArr['email_field'] = 'Email không đúng định dạng';
                echo json_encode($errArr);
                return;
            }

            $title = 'Thông báo';
            $desc = htmlContact();
            if (sendMail($title, $desc, $email) === 1) {
                up_contact($email, $phone, $name, $mess);
                $errArr['success_field'] = 'Bạn đã gửi hỗ trợ thành công. Hãy chờ liên hệ của chúng tôi';
                $errArr['direct'] = '.?';
                echo json_encode($errArr);
            }
            break;
        case 'register':
            $data = $_POST['arrData'];

            $name = valid_value_insert($data[0]['value']);
            $phone = $data[1]['value'];
            $email = $data[2]['value'];
            $pass = $data[3]['value'];
            $pass_2 = $data[4]['value'];
            $address = valid_value_insert($data[5]['value']);
            $gender = 'Nam';
            $level = 0;

            foreach ($data as $value) {
                if (!valid_text($value['value']) || $value['value'] == '') {
                    $errArr['error_field'] = 'Bạn không được để trống các ô có dấu * hoặc sử dụng ký tự đặc biết';
                    echo json_encode($errArr);
                    return;
                }
            }

            if (valid_email($email)) {
                if (check_register('email', $email)) {
                    $errArr['email_field'] = 'Email đã có người đăng ký';
                    echo json_encode($errArr);
                    return;
                }
            } else {
                $errArr['email_field'] = 'Email không đúng định dạng';
                echo json_encode($errArr);
                return;
            }

            if (valid_phone($phone)) {
                if (check_register('sdt', $phone)) {
                    $errArr['phone_field'] = 'Số điện thoại đã được đăng ký';
                    echo json_encode($errArr);
                    return;
                }
            } else {
                $errArr['phone_field'] = 'Hãy nhập đúng số điện thoại';
                echo json_encode($errArr);
                return;
            }

            if (valid_pass($pass)) {
                $hashedPass = bcrypt_password($pass); // băm mật khẩu sau đó mới up lên database

                if ($pass === $pass_2) {
                    $title = "Kích hoạt tài khoản";
                    $desc = htmlRegister($email);
                    if (sendMail($title, $desc, $email) === 1) {
                        register($name, $phone, $hashedPass, $address, $email, $gender, $level);
                        $errArr['success_field'] = 'Đăng ký thành công. Hãy kiểm tra email của bạn';
                        $errArr['direct'] = '?act=login';
                        echo json_encode($errArr);
                    } else {
                        $errArr['error_field'] = 'Đã xảy ra lỗi. Không thể đăng ký';
                        echo json_encode($errArr);
                    }
                } else {
                    $errArr['password2_field'] = 'Mật khẩu không giống nhau';
                    echo json_encode($errArr);
                }
            } else {
                $errArr['password_field'] = 'Mật khẩu cần có 8 ký tự trở lên bao gồm chữ hoa, thường và số';
                echo json_encode($errArr);
            }
            break;
        case 'login':
            $data = $_POST['arrData'];

            $email = $data[0]['value'];
            $pass = $data[1]['value'];

            foreach ($data as $value) {
                if (!valid_text($value['value']) || $value['value'] === '') {
                    $errArr['error_field'] = 'Bạn không được để trống các ô có dấu * hoặc sử dụng ký tự đặc biết';
                    echo json_encode($errArr);
                    return;
                }
            }

            if (!valid_email($email)) {
                $errArr['email_field'] = 'Hãy nhập đúng địa chỉ email';
                echo json_encode($errArr);
                return;
            }

            if (!valid_pass($pass)) {
                $errArr['password_field'] = 'Mật khẩu phải từ 8 ký tự (chữ hoa, thường và số)';
                echo json_encode($errArr);
                return;
            }

            $user = get_user_by('email', $email); // lấy mk đã băm trên database bằng email

            $isValid = bcrypt_verify($pass, $user['matkhau']); // check mật khẩu người dùng nhập và mật khẩu đã băm trên database

            if ($isValid) {
                if ($user['kichhoat'] === '0') {
                    $errArr['error_field'] = 'Tài khoản của bạn chưa kích hoạt. Hãy kiểm tra email';
                    $errArr['direct'] = '.?act=login';

                    $title = "Kích hoạt tài khoản";
                    $desc = htmlRegister($email);
                    sendMail($title, $desc, $user['email']);

                    echo json_encode($errArr);
                    return;
                }
                $_SESSION['user'] = array(
                    'idaccount' => $user['matk'],
                    'name' => $user['tenkh'],
                    'phone' => $user['sdt'],
                    'address' => $user['diachi'],
                    'email' => $user['email'],
                    'gender' => $user['gioitinh'],
                    'level' => $user['phanquyen']);

                $remember = searchForValue('rememberme', $data);
                if ($remember === 'on') {
                    add_cookie('user-email', $email, 1);
                } else {
                    if (check_cookie('user-email')) {
                        delete_cookie('user-email');
                    }
                }
                $direct = searchForValue('location', $data);

                $errArr['success_field'] = 'Đăng nhập thành công';
                $errArr['direct'] = $direct;
                echo json_encode($errArr);
            } else {
                $errArr['error_field'] = 'Email hoặc mật khẩu không đúng';
                echo json_encode($errArr);
            }
            break;
        case 'logout':
            unset($_SESSION['user']);
            $errArr['success_field'] = 'Đăng nhập thành công';
            $errArr['direct'] = "index.php";
            echo json_encode($errArr);
            break;
        case 'update':
            $data = $_POST['arrData'];

            foreach ($data as $value) {
                if (!valid_text($value['value']) || $value['value'] === '') {
                    $errArr['error_field'] = 'Bạn không được để trống các ô có dấu * hoặc sử dụng ký tự đặc biết';
                    echo json_encode($errArr);
                    return;
                }
            }

            $idAcc = $_SESSION['user']['idaccount'];
            $name = valid_value_insert($data[0]['value']);
            $address = valid_value_insert($data[1]['value']);
            $gender = $data[2]['value'];

            update_info($name, $address, $gender, $idAcc);
            $errArr['popup_field'] = 'Cập nhật thành công';
            echo json_encode($errArr);
            break;
        case 'change-pass':
            $data = $_POST['arrData'];

            $oldPass = $data[0]['value'];
            $newPass = $data[1]['value'];
            $newPass_2 = $data[2]['value'];
            $matk = $_SESSION['user']['idaccount'];

            foreach ($data as $value) {
                if ($value['value'] === '') {
                    $errArr['error_field'] = 'Bạn không được để trống các ô có dấu *';
                    echo json_encode($errArr);
                    return;
                }
            }

            $user = get_user_by('matk', $matk);

            if (bcrypt_verify($oldPass, $user['matkhau'])) { //1- check old pass of account if old pass correct
                if (valid_pass($newPass)) { //2- valid pass with regex if true
                    if ($newPass === $newPass_2) { //3- check 2 new pass if equals
                        $hashedNewPass = bcrypt_password($newPass); //băm mật khẩu mới

                        update_user_by('matkhau', $hashedNewPass, 'matk', $matk);

                        unset($_SESSION['user']);

                        $errArr['success_field'] = 'Đổi mật khẩu thành công';
                        $errArr['direct'] = '?act=login';
                        echo json_encode($errArr);
                    } else { //3- if pass not equals
                        $errArr['new_password2_field'] = 'Mật khẩu mới không giống nhau';
                        echo json_encode($errArr);
                    }
                }
            } else { //1- if old pass wrong
                $errArr['old_password_field'] = 'Mật khẩu cũ không đúng';
                echo json_encode($errArr);
            }
            break;
        case 'forgot':
            $data = $_POST['arrData'];

            $email = $data[0]['value'];

            if (valid_email($email)) {
                if (!check_register('email', $email)) {
                    $errArr['email_field'] = 'Không tồn tại email này';
                    echo json_encode($errArr);
                    return;
                }
            } else {
                $errArr['email_field'] = 'Email không đúng định dạng';
                echo json_encode($errArr);
                return;
            }

            $token = base64_encode("random_bytes(32)"); //tạo 1 chuỗi token random 

            $hashedToken = bcrypt_password($token); //hash token

            $expires = date('U') + 600;

            update_user_by('token', $hashedToken, 'email', $email); //upload token đã hash lên database

            update_user_by('hieuluc', $expires, 'email', $email); //token chỉ có hiệu lực trong 10'

            $title = 'Tìm lại mật khẩu';
            $desc = htmlResetPass($email, $token); //form reset pass
            if (sendMail($title, $desc, $email) === 1) {
                $errArr['success_field'] = 'Hãy kiểm tra email của bạn';
                $errArr['direct'] = '?act=login';
                echo json_encode($errArr);
            } else {
                $errArr['error_field'] = 'Không thể gửi email';
                echo json_encode($errArr);
            }
            break;
        case 'change-pass-forgot':
            $data = $_POST['arrData'];

            $newPass = $data[0]['value'];
            $newPass_2 = $data[1]['value'];
            $token = $data[2]['value'];
            $email = $data[3]['value'];

            $user = get_user_by('email', $email);

            if (bcrypt_verify($token, $user['token']) && ($user['hieuluc'] > date('U'))) {
                if (valid_pass($newPass)) {
                    if ($newPass === $newPass_2) {
                        $hashedNewPass = bcrypt_password($newPass); //băm mật khẩu mới

                        update_user_by('matkhau', $hashedNewPass, 'email', $email); //update mật khẩu mới đã hash lên database

                        update_user_by('token', '', 'email', $email); //update token = ''
                        update_user_by('hieuluc', '', 'email', $email); //update hieuluc = ''

                        $errArr['success_field'] = 'Đổi mật khẩu thành công';
                        $errArr['direct'] = '?act=login';
                        echo json_encode($errArr);
                    } else {
                        $errArr['new_password2_field'] = 'Mật khẩu mới không giống nhau';
                        echo json_encode($errArr);
                    }
                }
            } else {
                $errArr['error_field'] = 'Bạn không đủ điều kiện thực hiện hành động này';
                $errArr['direct'] = ".";
                echo json_encode($errArr);
            }
            break;

        default:
            json_encode(123213123);

            break;
    }
}
?>