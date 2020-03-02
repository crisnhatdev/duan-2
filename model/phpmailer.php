<?php

header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class PHPMail {

    function sendMail($title, $desc, $userEmail) {
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'baolkps08687@fpt.edu.vn';                     // SMTP username
        $mail->Password = '123zxz123A';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setLanguage('vi', 'PHPMailer/language/phpmailer.lang-vi.php');
//Recipients
        $mail->CharSet = "utf-8";
        $mail->setFrom('no-reply@gmail.com', 'Form Sweet House');
        $mail->addAddress($userEmail);               // Name is optional
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "$title";
//    $mail->Body = '<p>Bạn đã kích hoạt chức năng quên mật khẩu! Hãy click vào liên kết phía dưới để tiến hành đặt lại mật khẩu</p><a href = "http://localhost/php2/asm?act=change-pass-forgot&email=' . $userEmail . '&token=' . $token . '" > Đổi mật khẩu</a>';
        $mail->Body = "$desc";

        //send the message, check for errors
        if (!$mail->send()) {
            return 0;
        } else {
            return 1;
        }
    }

    function htmlRegister($email) {
        return '<!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Reset Form</title>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    .container {
                        width: 100%;
                        margin: 10px auto;
                        padding: 20px;
                        border: 1px solid #000;
                    }

                    header,
                    .btn {
                        text-align: center;
                        margin-bottom: 20px;
                    }

                    header {
                        display: flex;
                    }

                    ul {
                        list-style-type: none;
                    }

                    button {
                        padding: 10px;
                        background-color: #3598dc;
                        outline: none;
                        border: none;
                        border-radius: 8px;
                    }

                    @media only screen and (max-width: 768px) {
                        button {
                            width: 100%;
                        }
                        header {
                            display: block;
                        }
                    }
                </style>
            </head>

            <body>
                <div class="container">
                    <header style="justify-content: space-between;">
                        <a href="http://localhost/php2/asm">
                            <img src="http://localhost/php2/asm/public/img/logo1.png" alt="Logo Sweet House">
                        </a>
                        <ul>
                            <li>
                                    <h3>Sweet House Group</h3>
                            </li>
                            <li>Công viên Phần Mềm Quang Trung</li>
                            <li>Tô Ký, Quận 12</li>
                        </ul>
                    </header>
                    <main class="content">
                        <h1 style="text-align: center; margin-bottom: 20px;">Kích hoạt tài khoản</h1>
                        <p style="margin-bottom: 20px;">Hãy nhấn vào nút bên dưới để tiến hành kích hoạt tài khoản của bạn.</p>
                        <div class="btn">
                            <button>
                                <a style="text-decoration: none; color: #fff; font-size: 18px;" href = "http://localhost/php2/asm/controller/?act=account&email=' . $email . '" >Kích hoạt tài khoản</a>
                            </button>
                        </div>
                        <p>Cám ơn bạn đã tin tưởng và lựa chọn Sweet House. Chúng tôi sẽ cố gắng đem lại trải nghiệm tốt nhất cho bạn.</p>
                    </main>
                </div>
            </body>
            </html>';
    }

    function htmlResetPass($email, $token) {
        return '<!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Reset Form</title>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    .container {
                        width: 60%;
                        margin: 10px auto;
                        padding: 20px;
                        border: 1px solid #000;
                    }

                    header,
                    .btn {
                        text-align: center;
                        margin-bottom: 20px;
                    }

                    header {
                        display: flex;
                        justify-content: space-between;
                    }

                    ul {
                        list-style-type: none;
                    }

                    button {
                        padding: 10px;
                        background-color: #3598dc;
                        outline: none;
                        border: none;
                        border-radius: 8px;
                    }

                    @media only screen and (max-width: 768px) {
                        button {
                            width: 100%;
                        }
                        header {
                            display: block;
                        }
                    }
                </style>
            </head>

            <body>
                <div class="container">
                    <headerstyle="justify-content: space-between;">
                        <a href="https://trinhduy.com">
                            <img src="https://trinhduy.com/view/images/logo.png" alt="Logo Sweet House">
                        </a>
                        <ul>
                            <li>
                                    <h3>Ftyler Group</h3>
                            </li>
                            <li>Công viên Phần Mềm Quang Trung</li>
                            <li>Tô Ký, Quận 12</li>
                        </ul>
                    </header>
                    <main class="content">
                        <h1 style="text-align: center; margin-bottom: 20px;">Đặt lại mật khẩu</h1>
                        <p style="margin-bottom: 20px;">Có vẻ như bạn đã kích hoạt chức năng quên mật khẩu tại Ftyler. Hãy nhấn vào nút bên dưới để tiến hành đặt
                            lại mật khẩu.</p>
                        <div class="btn">
                            <button>
                                <a style="text-decoration: none; color: #fff; font-size: 18px;" href = "https://trinhduy.com?act=change-pass-forgot&email=' . $email . '&token=' . $token . '" >Đặt lại mật khẩu</a>
                            </button>
                        </div>
                        <p>Nếu bạn không thực hiện hành động này có thể bỏ qua email này. Mật khẩu của bạn sẽ không bị thay đổi</p>
                    </main>
                </div>
            </body>
            </html>';
    }

    function htmlContact() {
        return '<!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Reset Form</title>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    .container {
                        width: 60%;
                        margin: 10px auto;
                        padding: 20px;
                        border: 1px solid #000;
                    }

                    header,
                    .btn {
                        text-align: center;
                        margin-bottom: 20px;
                    }

                    header {
                        display: flex;
                        justify-content: space-between;
                    }

                    ul {
                        list-style-type: none;
                    }

                    button {
                        padding: 10px;
                        background-color: #3598dc;
                        outline: none;
                        border: none;
                        border-radius: 8px;
                    }

                    @media only screen and (max-width: 768px) {
                        button {
                            width: 100%;
                        }
                        header {
                            display: block;
                        }
                    }
                </style>
            </head>

            <body>
                <div class="container">
                    <header style="justify-content: space-between;">
                        <a href="https://trinhduy.com">
                            <img src="https://trinhduy.com/view/images/logo.png" alt="Logo Sweet House">
                        </a>
                        <ul>
                            <li>
                                    <h3>Ftyler Group</h3>
                            </li>
                            <li>Công viên Phần Mềm Quang Trung</li>
                            <li>Tô Ký, Quận 12</li>
                        </ul>
                    </header>
                    <main class="content">
                        <h1 style="text-align: center; margin-bottom: 20px;">Thư hồi đáp</h1>
                        <p style="margin-bottom: 20px;">Cám ơn những đóng góp quý giá của bạn. Chúng tôi sẽ xem xét và trả lời bạn trong thời gian sớm nhất.</p>
                        <p style="margin-bottom: 20px;">Trong khi chờ đợi bạn có thể tham khảo những sản phẩm mới nhất của chúng tôi tại.</p>
                        <div class="btn" style="text-align: center;">
                            <button>
                                <a style="text-decoration: none; color: #fff; font-size: 18px;" href = "https://trinhduy.com/" >Trang chủ</a>
                            </button>
                        </div>
                    </main>
                </div>
            </body>
            </html>';
    }

}

?>