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
        else {
            if($method == 'auth') {
                $this->authentication();
            }
        }
    }

    public function authentication()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if(isset($data)) {
            
            $email = $data['email'];
            $password = $data['password'];
            $remember = isset($data['remember']) ? $data['remember'] : '';
            $user = $this->userModel->showUserByEmail($email);
            $dbPass = md5($password);

            // Đăng nhập thành công
            if(!empty($user) && $user['Password'] == $dbPass) {
                if(isset($remember)){
                    setcookie("username", $email);
                    setcookie("password", $password);
                }
                $_SESSION['id_account'] = $user['Id'];
                $_SESSION['role_account'] = $user['RoleId'];
                $_SESSION['name_account'] = $user['Name'];
                $_SESSION['email_account'] = $user['Email'];
                echo json_encode([
                    'status' => 200,
                    'message' => 'Đăng nhập thành công!',
                    'redirect' => 'http://localhost/web_kltn/index.php?page=item'
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
$login = new LoginController();