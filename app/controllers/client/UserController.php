<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Client\Users;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/phpmailer/PHPMailer/src/Exception.php';
require 'vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require 'vendor/phpmailer/PHPMailer/src/SMTP.php';
class UserController extends BaseController
{
    protected $user;
    protected $mail;
    public function __construct()
    {
        $this->user = new Users;
    }
    public function profile()
    {
        return $this->render('client.users.profile');
    }
    public function signUp()
    {
        return $this->render('client.users.sign-up');
    }
    public function signUpStore()
    {
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'verification_code' => md5(uniqid("yourrandomstringyouwanttoaddhere", true)),
        ];
        $cfpassword = $_POST['cfpassword'];
        $pattern = '/^[0-9A-Za-z]*[0-9A-Za-z]$/';
        $userPattern = '/^[A-Za-z\sÀ-ỹ]+$/';

        $errors = [];
        if ($data['username'] == "") {
            $errors['username'] = "Chưa nhập họ và tên";
        } else if (!preg_match($userPattern, $data['username'])) {
            $errors['username'] = "Họ và tên chỉ được chứa chữ hoa, chữ thường";
        }
        if ($data['password'] == "") {
            $errors['password'] = "Chưa nhập mật khẩu";
        } else if (strlen($data['password']) < 6) {
            $errors['password'] = "Mật khẩu phải nhiều hơn 6 ký tự";
        } else if (!preg_match($pattern, $data['password'])) {
            $errors['password'] = "Mật khẩu chỉ được chứa chữ hoa, chữ thường và số";
        }
        if ($data['email'] == "") {
            $errors['email'] = "Chưa nhập email";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email sai định dạng";
        }
        $result = $this->user->checkRegister($data['email']);
        // print_r($result);
        $isVerified = $this->user->isVerifired($data['email']);
        if (!empty($result)) {
            $errors['email'] = "Email đã tồn tại";
        }
        if (!empty($isVerified)) {
            $errors['email'] = "Email đã tồn tại nhưng chưa kích hoạt, vui lòng kiểm tra hộp thư Gmail";
        }
        if ($cfpassword == "") {
            $errors['cfpassword'] = "Chưa nhập xác nhận mật khẩu";
        } else if ($cfpassword !== $data['password']) {
            $errors['cfpassword'] = "Mật khẩu xác nhận không khớp";
        } else if (strlen($cfpassword) < 6) {
            $errors['cfpassword'] = "Mật khẩu phải nhiều hơn 6 ký tự";
        } else if (!preg_match($pattern, $cfpassword)) {
            $errors['cfpassword'] = "Mật khẩu chỉ được chứa chữ hoa, chữ thường và số";
        }

        if (count($errors) > 0) {
            redirectClient('errors', $errors, 'sign-up');
        } else {
            $verificationLink = BASE_URL . 'verified-email/' . $data['verification_code'];
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'codephpnguvl@gmail.com';                     //SMTP username
            $mail->Password   = 'qiix rpjx lrxc dzvr';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('codephpnguvl@gmail.com', 'FlixTv');
            $mail->addAddress($data['email']);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Verified Email ' . $data['email'];
            $mail->Body    = 'Nhấp vào đây để xác thực <b>' . $verificationLink . '</b>';

            $mail->send();
            $this->user->Register($data);
            redirectClient('success', 'Vui lòng kiểm tra email xác thực', 'sign-up');
        }
    }
    public function verified($verification_code)
    {
        $this->user->verifiedEmail($verification_code);
        redirectClient('success', 'Xác minh thành công, mời đăng nhập', 'sign-in');
    }
    public function signIn()
    {
        return $this->render('client.users.sign-in');
    }
    public function signInStore()
    {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $pattern = '/^[0-9A-Za-z]*[0-9A-Za-z]$/';

        $errors = [];

        if ($data['email'] == "") {
            $errors['email'] = "Email đăng nhập không được để trống";
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email sai định dạng";
        }

        if ($data['password'] == "") {
            $errors['password'] = "Mật khẩu không được để trống";
        } else if (!preg_match($pattern, $data['password'])) {
            $errors['users'] = "Sai thông tin đăng nhập";
        }
        if (count($errors) > 0) {
            redirectClient('errors', $errors, 'sign-in');
        } else {
            $isVerified = $this->user->isVerifiredLogin($data);
            $result = $this->user->login($data);
            if (!empty($result)) {
                $_SESSION['auth'] = $result->modifier;
                $_SESSION['id'] = $result->id;
                $this->user->active($result->id);
                header('location: ' . BASE_URL);
            } else if (!empty($isVerified)) {
                $errors['users'] = "Tài khoản chưa được kích hoạt";
                redirectClient('errors', $errors, 'sign-in');
            } else {
                $errors['users'] = "Sai thông tin đăng nhập";
                redirectClient('errors', $errors, 'sign-in');
            }
        }
    }
    public function signOut()
    {
        $result = $this->user->getDetail($_SESSION['id']);
        $this->user->unActive($result->id);
        unset($_SESSION['auth']);
        header('location:' . BASE_URL . 'sign-in');
    }
    public function forgotPassword()
    {
        return $this->render('client.users.forgot-password');
    }
    public function forgotPasswordStore()
    {
        $email = $_POST['email'];
        $checkEmail = $this->user->fogotPassword($email);
        $errors  = [];
        if ($email == "") {
            $errors['email'] = "Vui lòng nhập email của bạn";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email sai định dạng";
        }
        if (empty($checkEmail)) {
            $errors['email'] = "Email chưa có trong hệ thống";
        }
        if (count($errors) > 0) {
            redirectClient('errors', $errors, 'forgot-password');
        } else {
            $reset_password = BASE_URL . 'reset-password/' . $checkEmail->id . '/' . $checkEmail->verification_code;
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'codephpnguvl@gmail.com';                     //SMTP username
            $mail->Password   = 'qiix rpjx lrxc dzvr';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('codephpnguvl@gmail.com', 'FlixTv');
            $mail->addAddress($email);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Flix Tv: cap nhat mat khau moi cho tai khoan ' . $email;
            $mail->Body    = 'Nhấp vào đây để cập nhật <b><a href=' . $reset_password . '>Click here</a></b>';

            $mail->send();
            redirectClient('success', 'Đã gửi, vui lòng kiểm tra email', 'forgot-password/');
        }
    }
    public function updatePassword($id, $verification_code)
    {
        return $this->render('client.users.update-password');
    }
    public function updatePasswordStore($id, $verification_code)
    {
        $errors = [];
        $data = [
            'password' => $_POST['newpass'],
            'id' => $id,
            'verification_code' => $verification_code,
        ];
        $cfpass = $_POST['confirmpass'];
        $pattern = '/^[0-9A-Za-z]*[0-9A-Za-z]$/';
        if ($data['password'] == "") {
            $errors['password'] = "Chưa nhập mật khẩu";
        } else if (strlen($data['password']) < 6) {
            $errors['password'] = "Mật khẩu phải nhiều hơn 6 ký tự";
        } else if (!preg_match($pattern, $data['password'])) {
            $errors['password'] = "Mật khẩu chỉ được chứa chữ hoa, chữ thường và số";
        } else if ($data['password'] !== $cfpass || !preg_match($pattern, $cfpass)) {
            $errors['cfpass'] = "Mật khẩu xác nhận không khớp";
        }

        if (count($errors) > 0) {
            redirectClient('errors', $errors, 'reset-password/' . $data['id'] . '/' . $data['verification_code']);
        } else {
            $res = $this->user->updatePass($data);
            $res ? redirectClient('success', 'msg', 'reset-password/' . $data['id'] . '/' . $data['verification_code']) : "";
        }
    }
}
