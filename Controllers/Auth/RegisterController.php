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

    public function index()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : 'register';
        if($method == 'register') {
            include_once './Views/auth/register.php';
            return;
        }
        else {
            // luu tru thong tin
            if($method == 'store') {
                $this->store();
            }
        }
    }
    
    // luu vao db
    public function store()
    {
        // Lấy dữ liệu từ client -> convert object to array
        $data = json_decode(file_get_contents('php://input'), true);
        if(isset($data)) {
            $name = $data['name'];
            $email = $data['email'];
            $password = md5($data['password']);
            $avatar = '';
            try {
                $user = $this->userModel->showUserByEmail($email);
                if(!isset($user) || empty($user)) {
                    $addUser = $this->userModel->addUser($email, $password, $name, $avatar);
                    if($addUser) {
                        echo json_encode([
                            'status' => 200,
                            'message' => 'Đăng ký tài khoản thành công!',
                        ]);
                    }
                }
                else {
                    echo json_encode([
                        'status' => 401,
                        'message' => 'Tài khoản này đã tồn tại!',
                    ]);
                }
                
            } catch (\Throwable $th) {
                echo json_encode([
                    'status' => 400,
                    'message' => $th
                ]);
            }
            
        }
    }
}
// run
$register = new RegisterController();