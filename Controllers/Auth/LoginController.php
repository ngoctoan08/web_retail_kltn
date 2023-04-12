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
        $method = isset($_GET['method']) ? $_GET['method'] : 'login';
        if(empty($method) || $method == 'login') {
            include_once './Views/auth/login.php';
            return;
        }
        else {
            if($method == 'check') {
                $this->checkUser();
            }
        }
    }

    public function checkUser()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if(isset($data)) {
            $email = $data['email'];
            $password = $data['password'];
            $remember = $data['remember'];
            $user = $this->userModel->showUserByEmail($email);
            $dbPass = md5($password);

            // Đăng nhập thành công
            if(!empty($user) && $user['password'] == $dbPass) {
                if(isset($remember)){
                    setcookie("username", $email);
                    setcookie("password", $password);
                }
                $_SESSION['id_account'] = $user['id'];
                $_SESSION['role_account'] = $user['role_id'];
                $_SESSION['name_account'] = $user['name'];
                $_SESSION['email_account'] = $user['email'];
                echo json_encode([
                    'status' => 200,
                    'message' => 'Đăng nhập thành công!',
                ]);
            }
            else {
                echo json_encode([
                    'status' => 401,
                    'message' => 'Đăng nhập thất bại!',
                ]);
            }
        }
        
    }
}