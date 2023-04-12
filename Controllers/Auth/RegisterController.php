<?php
include_once './Controllers/Controller.php';
class RegisterController extends Controller
{
    public $userModel;
    public function __construct()
    {
        $this->userModel = parent::model('User');
        $this->index();
    }

    public function index ()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : '';
        if(empty($method)) {
            include_once './Views/auth/register.php';
            return;
        }
        switch($method) {
            case 'check':
                $regexName = '/^[^\d+]*[\d+]{0}[^\d+]*$/';
                $regexPhone = '/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/';
                $regexEmail = '/(?![[:alnum:]]|@|-|_|\.)./';
                if(isset($_POST['submit_register'])) {
                    $error['email'] = '';
                    $error['password'] = '';
                    $flag = 1;
                    // Validate name
                    if(empty($_POST['name'])) {
                        $error['name'] = '(Vui lòng nhập họ tên)';
                        $flag = 0;
                    }
                    else if (!preg_match($regexName, $_POST['name'])){
                        $error['name'] = '(Họ tên không hợp lệ)';
                        $flag = 0;
                    }
                    else
                        $name = trim($_POST['name']);

                    // Validate email
                    // check email đã tồn tại bằng onkeyup
                    if(empty($_POST['email'])) {
                        $error['email'] = '(Vui lòng nhập email)';
                        $flag = 0;
                    }
                    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $error['email'] = '(Email không hợp lệ)';
                        $flag = 0;
                    }
                    else {
                        $email = trim($_POST['email']);
                    }
                    // Validate password
                    if(empty($_POST['password'])) {
                        $error['password'] = '(Vui lòng nhập mật khẩu)';
                        $flag = 0;
                    }
                    else
                        $password = trim($_POST['password']);
                    
                    // Validate Check pass
                    if(empty($_POST['check_pass'])) {
                        $error['check_pass'] = '(Vui lòng xác nhận mật khẩu)';
                        $flag = 0;
                    }
                    else
                        $checkPass = trim($_POST['check_pass']);

                    if($flag == 1) 
                    {
                        if($checkPass == $password) {
                            $user = $this->userModel->showUserByEmail($email);
                            if($email != $user['email']) {
                                $dbPass = md5($password);
                                $addUser = $this->userModel->addUser($email, $dbPass, $name);
                                if($addUser) {
                                    header('location: index.php?page=login');
                                }
                            }
                            else {
                                $error['email'] = "(Email đã tồn tại)";
                            }
                            
                        }
                        else {
                            $error['check_pass'] = "Xác nhận mật khẩu không hợp lệ";
                        }
                    }
                }
                include_once './views/register.php';
                break;        
        }
    }

    public function validateUser()
    {
        if(isset($_POST['btn_register'])) {
            $errors = [];
            $name = $_POST['name'];
            if($name = '')
                $errors['name'] = '(Vui lòng nhập họ tên)';
        }
    }
}