<?php

//Model
session_start();
require_once '../../model/connect.php';
require_once '../../model/catalog.php';
require_once '../../model/product.php';
require_once '../../model/comment.php';
require_once '../../model/validate.php';
require_once '../../model/news.php';
require_once '../../model/account.php';
require_once '../../model/phpmailer.php';
require_once '../../model/cart.php';
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
//Account
$crAcc = new Account();
// <---End-Account--->
//Mail
$crMail = new PHPMail();
// <---End-Mail--->
//Cart
$crCart = new Cart();
// <---End-Cart--->
//Controller
$type = $_REQUEST['type'];
$errArr = array();
$succesArr = array();

if ($type) {
    switch ($type) {
        case 'subscribe':
            $email = $_POST['arrData'][0]['value']; //email đăng ký nhận tin

            if (!$crValid->valid_text($email) || $email == '') {
                $errArr['error_subscribe'] = 'Bạn không được để trống';
                echo json_encode($errArr);
                return;
            }

            if (!$crValid->valid_email($email)) {
                $errArr['error_subscribe'] = 'Email không đúng định dạng';
                echo json_encode($errArr);
                return;
            }

            $crNews->insertSubcriNews($email);
            $succesArr['success_subscribe'] = 'Bạn đã đăng ký nhận tin thành công';
            echo json_encode($succesArr);
            break;
        case 'contact':
            $data = $_POST['arrData'];

            $subject = $crValid->valid_value_insert($data[0]['value']);
            $name = $crValid->valid_value_insert($data[1]['value']);
            $phone = $data[2]['value'];
            $mess = $crValid->valid_value_insert($data[3]['value']);

            foreach ($data as $value) {
                if (!$crValid->valid_text($value['value']) || $value['value'] == '') {
                    $errArr['error_' . $value['name']] = 'Bạn không được để trống';
                }
            }

            if (!$crValid->valid_phone($phone)) {
                $errArr['error_phone'] = 'Số điện thoại không đúng định dạng';
            }

            if (count($errArr) === 0) {
                $crComm->upContact($subject, $name, $phone, $mess);
                $succesArr['success_field'] = 'Bạn đã gửi hỗ trợ thành công. Hãy chờ liên hệ của chúng tôi';
                $succesArr['direct'] = '.?';
                echo json_encode($succesArr);
            } else {
                echo json_encode($errArr);
            }
            break;
        case 'register':
            $data = $_POST['arrData'];

            $email = $data[0]['value'];
            $pass = $data[1]['value'];
            $pass_2 = $data[2]['value'];
            $name = $crValid->valid_value_insert($data[3]['value']);
            $phone = $data[4]['value'];
            $level = 0;

            foreach ($data as $value) {
                if (!$crValid->valid_text($value['value']) || $value['value'] == '') {
                    $errArr['error_' . $value['name']] = 'Bạn không được để trống';
                }
            }

            if ($crValid->valid_email($email)) {
                if ($crAcc->check_register('email', $email)) {
                    $errArr['error_' . $data[0]['name']] = 'Email đã có người đăng ký';
                }
            } else {
                $errArr['error_' . $data[0]['name']] = 'Email không đúng định dạng';
            }

            if ($crValid->valid_phone($phone)) {
                if ($crAcc->check_register('sdt', $phone)) {
                    $errArr['error_' . $data[4]['name']] = 'Số điện thoại đã được đăng ký';
                }
            } else {
                $errArr['error_' . $data[4]['name']] = 'Hãy nhập đúng số điện thoại';
            }

            if (!$crValid->valid_pass($pass)) {
                $errArr['error_' . $data[1]['name']] = 'Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)';
                $errArr['error_' . $data[2]['name']] = 'Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)';
            }

            if (count($errArr) === 0) {
                $hashedPass = $crAcc->bcrypt_password($pass); // băm mật khẩu sau đó mới up lên database

                if ($pass === $pass_2) {
                    $title = "Kích hoạt tài khoản";
                    $desc = $crMail->htmlRegister($email);
                    if ($crMail->sendMail($title, $desc, $email) === 1) {
                        $crAcc->register($name, $phone, $hashedPass, $email, $level);
//                        echo json_encode('http://localhost/php2/asm/controller/?act=account&email=' . $email);
                        $succesArr['success_field'] = 'Đăng ký thành công. Hãy kiểm tra email của bạn';
                        $succesArr['direct'] = '.';
                        echo json_encode($succesArr);
                    } else {
                        $errArr['error_field'] = 'Đã xảy ra lỗi. Không thể đăng ký';
                        echo json_encode($errArr);
                    }
                } else {
                    $errArr['error_' . $data[1]['name']] = 'Mật khẩu không giống nhau';
                    $errArr['error_' . $data[2]['name']] = 'Mật khẩu không giống nhau';
                    echo json_encode($errArr);
                }
            } else {
                echo json_encode($errArr);
            }
            break;
        case 'login':
            $data = $_POST['arrData']; //lấy thông tin tk và mk

            $email = $data[0]['value']; //tk lấy từ mảng arrData
            $pass = $data[1]['value']; //mk lấy từ mảng arrData

            if (!$crValid->valid_email($email)) {
                $errArr['error_' . $data[0]['name']] = 'Hãy nhập đúng địa chỉ Email!';
            }

            if (!$crValid->valid_pass($pass)) {
                $errArr['error_' . $data[1]['name']] = 'Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)';
                echo json_encode($errArr);
                return;
            }

            $user = $crAcc->get_user_by('email', $email); // lấy user trên databse và sử dụng mk đã băm

            $isValid = $crAcc->bcrypt_verify($pass, $user['matkhau']); // check mật khẩu người dùng nhập và mật khẩu đã băm trên database

            if (!$isValid) {
                $errArr['error_psw_lg'] = '';
                $errArr['error_field_lg'] = 'Tài khoản hoặc mật khẩu không đúng';
            }

            if (count($errArr) === 0) {
                if ($user['kichhoat'] === '0') {
                    $errArr['error_field_lg'] = 'Tài khoản của bạn chưa kích hoạt. Hãy kiểm tra email';
                    $errArr['error_psw_lg'] = '';

                    $title = "Kích hoạt tài khoản";
                    $desc = $crMail->htmlRegister($email);
                    $crMail->sendMail($title, $desc, $user['email']);

                    echo json_encode($errArr);
                    return;
                }
                $_SESSION['user'] = array(
                    'id' => $user['matk'],
                    'name' => $user['tenkh'],
                    'phone' => $user['sdt'],
                    'address' => $user['diachi'],
                    'introduce' => $user['gioithieu'],
                    'email' => $user['email'],
                    'level' => $user['phanquyen']);

                $remember = $crAcc->searchForValue('rememberme', $data);
                if ($remember === 'on') {
                    $crAcc->addCookie('user-email', $email, 1);
                } else {
                    if ($crAcc->checkCookie('user-email')) {
                        $crAcc->deleteCookie('user-email');
                    }
                }
                $direct = $crAcc->searchForValue('location', $data);

                $successArr['success_field_lg'] = 'Đăng nhập thành công';
                $successArr['direct'] = $direct;
                echo json_encode($successArr);
            } else {
                echo json_encode($errArr);
            }
            break;
        case 'logout':
            unset($_SESSION['user']);
            $errArr['direct'] = "index.php";
            echo json_encode($errArr);
            break;
        case 'update':
            $data = $_POST['arrData'];

            foreach ($data as $value) {
                if (!$crValid->valid_text($value['value'])) {
                    $errArr['error_' . $value['name']] = 'Bạn không được sử dụng ký tự đặc biết';
                }
            }

            if (count($errArr) === 0) {
                $idAcc = $_SESSION['user']['id'];
                $name = $crValid->valid_value_insert($data[2]['value']);
                $address = $crValid->valid_value_insert($data[3]['value']);
                $intro = $crValid->valid_value_insert($data[4]['value']);
//                $pic = $_POST['pic'];
//                move_uploaded_file($pic, "../public/img/user/$pic"); //chuyển bộ nhớ ảnh vào thư mục trên và gán tên

                $crAcc->update_info_client($name, $address, $intro, $idAcc);
                $succesArr['success_field'] = 'Cập nhật thành công';
                $succesArr['direct'] = '.?act=acc-update';
                echo json_encode($succesArr);
            } else {
                echo json_encode($errArr);
            }
            break;
        case 'change-pass':
            $data = $_POST['arrData'];

            $oldPass = $data[0]['value'];
            $newPass = $data[1]['value'];
            $newPass_2 = $data[2]['value'];
            $matk = $_SESSION['user']['id'];

            foreach ($data as $value) {
                if ($value['value'] === '') {
                    $errArr['error_' . $value['name']] = 'Bạn không được để trống các ô có dấu *';
                }
            }

            if ($newPass !== $newPass_2) { //3- check 2 new pass if not equals
                $errArr['error_new_pass'] = 'Mật khẩu mới không giống nhau';
                $errArr['error_new_pass_2'] = 'Mật khẩu mới không giống nhau';
            }

            if (!$crValid->valid_pass($newPass)) { //2- valid pass with regex if false
                $errArr['error_new_pass'] = 'Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)';
                $errArr['error_new_pass_2'] = 'Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)';
            }

            $user = $crAcc->get_user_by('matk', $matk);

            if ($crAcc->bcrypt_verify($oldPass, $user['matkhau'])) { //1- check old pass of account if old pass incorrect
                if (count($errArr) === 0) {
                    $hashedNewPass = $crAcc->bcrypt_password($newPass); //băm mật khẩu mới

                    $crAcc->update_user_by('matkhau', $hashedNewPass, 'matk', $matk);

                    unset($_SESSION['user']);

                    $succesArr['success_field'] = 'Đổi mật khẩu thành công';
                    $succesArr['direct'] = '?act=account';
                    echo json_encode($succesArr);
                } else {
                    echo json_encode($errArr);
                }
            } else {
                $errArr['error_old_pass'] = 'Hãy kiểm tra mật khẩu cũ';
                echo json_encode($errArr);
            }
            break;
        case 'forgot':
            $data = $_POST['arrData'];

            $email = $data[0]['value'];

            if ($crValid->valid_email($email)) {
                if (!$crAcc->check_register('email', $email)) {
                    $errArr['error_email'] = 'Không tồn tại email này';
                }
            } else {
                $errArr['error_email'] = 'Email không đúng định dạng';
            }

            if (count($errArr) === 0) {
                $token = base64_encode("random_bytes(32)"); //tạo 1 chuỗi token random 

                $hashedToken = $crAcc->bcrypt_password($token); //hash token

                $expires = date('U') + 600; // 10 phút

                $crAcc->update_user_by('token', $hashedToken, 'email', $email); //upload token đã hash lên database

                $crAcc->update_user_by('hieuluc', $expires, 'email', $email); //token chỉ có hiệu lực trong 10'

                $title = 'Tìm lại mật khẩu';
                $desc = $crMail->htmlResetPass($email, $token); //form reset pass
//                
                if ($crMail->sendMail($title, $desc, $email) === 1) {
//                    echo json_encode('http://localhost/php2/asm/controller/?act=acc-change-forgot&email=' . $email . '&token=' . $token);
                    $succesArr['success_field'] = 'Hãy kiểm tra email của bạn';
                    $succesArr['direct'] = '?act=login';
                    echo json_encode($succesArr);
                }
            } else {
                echo json_encode($errArr);
            }
            break;
        case 'change-pass-forgot':
            $data = $_POST['arrData'];

            $newPass = $data[0]['value'];
            $newPass_2 = $data[1]['value'];
            $token = $data[2]['value'];
            $email = $data[3]['value'];

            $user = $crAcc->get_user_by('email', $email);

            if ($newPass !== $newPass_2) {
                $errArr['error_new_pass'] = 'Mật khẩu mới không giống nhau';
                $errArr['error_new_pass_2'] = 'Mật khẩu mới không giống nhau';
            }

            if (!$crValid->valid_pass($newPass)) {
                $errArr['error_new_pass'] = 'Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)';
                $errArr['error_new_pass_2'] = 'Mật khẩu cần 8 ký tự trở lên (Hoa, Thường, Số)';
            }

            if (!$crAcc->bcrypt_verify($token, $user['token']) || ($user['hieuluc'] < date('U'))) {
                $errArr['error_field'] = 'Bạn không đủ điều kiện thực hiện hành động này';
                $errArr['direct'] = ".";
            }

            if (count($errArr) === 0) {
                $hashedNewPass = $crAcc->bcrypt_password($newPass); //băm mật khẩu mới

                $crAcc->update_user_by('matkhau', $hashedNewPass, 'email', $email); //update mật khẩu mới đã hash lên database

                $crAcc->update_user_by('token', '', 'email', $email); //update token = ''
                $crAcc->update_user_by('hieuluc', '', 'email', $email); //update hieuluc = ''

                $succesArr['success_field'] = 'Đổi mật khẩu thành công';
                $succesArr['direct'] = '?act=account';
                echo json_encode($succesArr);
            } else {
                echo json_encode($errArr);
            }
            break;
        case 'bill-detail':
            $mahd = $_POST['mahd'];
            $listBillDetail = $crCart->get_bill_details($mahd);

            $output = '';
            foreach ($listBillDetail as $bill) {
                $output .= '<tr>
                        <td>' . $bill['tensp'] . '</td>
                        <td>' . number_format($bill['dongia'], 0, '', '.') . ' VNĐ</td>
                        <td>' . $bill[1] . '</td>
                        <td>' . number_format($bill[1] * $bill['dongia'], 0, '', '.') . '</td>
                    </tr>';
            }
            echo json_encode($output);
            break;
        case 'check-bill-no-lg':
            $phone = $_POST['sdt'];

            if ($crValid->valid_phone($phone)) {
                if (count($crCart->get_bill(0, $phone)) === 0) {
                    $errArr['error_phone'] = 'Số điện thoại chưa từng mua hàng';
                }
            } else {
                $errArr['error_phone'] = 'Hãy nhập đúng số điện thoại';
            }
            
            echo json_encode($errArr);
            break;
        default:
            json_encode('Có vẻ bạn chưa biết phải làm gì nhỉ');
            break;
    }
}
?>