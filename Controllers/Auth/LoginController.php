<?php
include_once './Controllers/Controller.php';
class LoginController extends Controller
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
            include_once './Views/auth/login.php';
            return;
        }
        switch($method) {
            case 'check':
                if(isset($_POST['submit_login'])) {
                    $error['email'] = '';
                    $error['password'] = '';
                    $flag = 0;
                    // Validate email
                    if(empty($_POST['email']))
                        $error['email'] = '(Vui lòng nhập email)';
                    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                        $error['email'] = '(Email không hợp lệ)';
                    else
                        $email = trim($_POST['email']);
                        $flag = 1;

                    // Validate password
                    if(empty($_POST['password']))
                        $error['pass'] = '(Vui lòng nhập mật khẩu)';
                    else
                        $password = trim($_POST['password']);
                    
                    if($flag == 1 && isset($email) && isset($password)) {
                        $user = $this->userModel->showUserByEmail($email);
                        $dbPass = md5($password);

                        // Đăng nhập thành công
                        if(!empty($user) && $user['password'] == $dbPass) {
                            if(isset($_POST['remember'])){
                                setcookie("username", $email);
                                setcookie("password", $password);
                            }
                            $_SESSION['id_account'] = $user['id'];
                            $_SESSION['role_account'] = $user['role_id'];
                            $_SESSION['name_account'] = $user['name'];
                            $_SESSION['email_account'] = $user['email'];
                            header('location: ../admin/'); 
                        }
                         // // Đăng nhập thất bại
                        else {
                            $error['fail'] = "Tài khoản hoặc mật khẩu không chính xác";
                        }
                    }
                }
                include_once './Views/auth/login.php';
                break;        
        }
    }

    public function checkUser()
    {
        $error['email'] = '';
        $error['password'] = '';

        $regexName = '/^[^\d+]*[\d+]{0}[^\d+]*$/';
        $regexPhone = '/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/';
        $regexEmail = '/(?![[:alnum:]]|@|-|_|\.)./';
        if(isset($_POST['submit_login'])) {
            $password = $_POST['password'];
            if(empty($_POST['email']))
                $error['email'] = '(Vui lòng nhập email)';
            else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                $error['email'] = '(Email không hợp lệ)';
            else
                $email = $_POST['email'];

        }
    }
}