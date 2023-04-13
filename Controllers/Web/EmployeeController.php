<?php
include_once './Controllers/Controller.php';
class EmployeeController extends Controller
{
    private $userModel;
    private $employeeModel;
    public function __construct()
    {
        $this->userModel = parent::model('User');
        $this->employeeModel = parent::model('Employee');
        $this->index();
    }

    public function index ()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : '';
        switch ($method) {
            case 'create':
                $this->create();
                break;
            case 'store':
                $this->store();
                break;
            case 'show':
                break;
            case 'edit':
                break;
            case 'update':
                break;
            default:
                $users = $this->userModel->showAllUser();
                include_once './Views/pages/manage_employee/index.php';
                break;
        }
    }

    // Hiện thị form thêm mới
    public function create()
    {
        // department
        $departments = $this->employeeModel->showAllDepartment();
        $positions = $this->employeeModel->showPosition(2);
        // contract
        $contracts = $this->employeeModel->showAllContractType();
        // position
        // 
        include_once './Views/pages/manage_employee/create.php';
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if(isset($data)) {
            $nameEmployee = $data['name'];
            $address = $data['address'];
            $gender = $data['gender'];
            $email = $data['email'];
            $birth_date = $data['birth_date'];
            $contractName = $data['contract'];
            $department = $data['department'];
            $position = $data['position'];
            $tel = $data['tel'];
            $salary = $data['salary'];
            $start_date = $data['start_date'];
            $end_date = $data['end_date'];
            try {
                // insert employee
                $this->employeeModel->addEmployee($birth_date, $gender, $nameEmployee, '$avatar', $tel, $email, '$description', $address);
                $lastIdEmployee = $this->employeeModel->returnLastId();
                // insert employee details
                $this->employeeModel->addEmployeeDetail($lastIdEmployee, '$educationName', $position, $department);
                // insert contracts
                $this->employeeModel->addContract($contractName, '$description', $salary, $start_date, $end_date, $lastIdEmployee, '1');
                echo json_encode([
                    'status' => 200,
                    'message' => 'Thêm nhân viên mới thành công!',
                ]);
                //code...
            } catch (\Throwable $th) {
                echo json_encode([
                    'status' => 401,
                    'message' => $th,
                ]);
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
$employee = new EmployeeController();