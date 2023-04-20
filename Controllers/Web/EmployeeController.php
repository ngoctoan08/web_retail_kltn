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
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $this->show($id);
                break;
            case 'edit':
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $this->edit($id);
                break;
            case 'update':
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $this->update($id);
                break;
            case 'delete':
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $this->delete();
                break;
            case 'getPosition':
                $this->getPosition();
                break;
            default:
                $employees = $this->employeeModel->showAllEmployee();

                // var_dump($employees);
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
        // $data = json_decode(file_get_contents('php://input'), true);
        
        if(isset($_POST)) {
            $data = $_POST;
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
            $description = 'nhân viên mới';
            
            $fileAvatar = $_FILES['avatar'];
            
            try {
                // insert employee
                $fileName = time().$fileAvatar['name'];
                $addEmployee = $this->employeeModel->addEmployee($birth_date, $gender, $nameEmployee, $fileName, $tel, $email, $description, $address);
                move_uploaded_file($fileAvatar['tmp_name'], './public/storage/employee_images/'.$fileName);
                
                $lastIdEmployee = $this->employeeModel->returnLastId();
                //insert employee details
                $addDetail = $this->employeeModel->addEmployeeDetail($lastIdEmployee, '$educationName', $position, $department);
                // insert contracts
                $addContract = $this->employeeModel->addContract($contractName, '$description', $salary, $start_date, $end_date, $lastIdEmployee, '1');

                if($addEmployee && $addDetail && $addContract) {
                    $_SESSION['success'] = "Thêm nhân viên mới thành công!";
                    header('location: index.php?page=employee&method=show&id='.$lastIdEmployee);
                    // echo json_encode([
                    //     'status' => 200,
                    //     'message' => 'Thêm nhân viên mới thành công!',
                    // ]);
                }
            } catch (\Throwable $th) {
                echo json_encode([
                    'status' => 401,
                    'message' => $th->getMessage(),
                ]);
            }
        }
    }

    public function show($id)
    {
        if(!empty($id))
        {
            
            $employee = $this->employeeModel->showEmployeeById($id);
            include_once './Views/pages/manage_employee/show.php';
        }
    }

    public function edit($id)
    {
        if(!empty($id))
        {
            // department
            $departments = $this->employeeModel->showAllDepartment();
            $positions = $this->employeeModel->showPosition(2);
            // contract
            $contracts = $this->employeeModel->showAllContractType();
            
            $employee = $this->employeeModel->showEmployeeById($id);
            include_once './Views/pages/manage_employee/edit.php';

            // echo "<pre>";
            // print_r($employee);
            // echo "</pre>";
        }
    }

    public function update($id)
    {
        // get info employee
        $employee = $this->employeeModel->showEmployeeById($id);
        // echo $id;
        // die();
        if(isset($_POST)) {
            $nameEmployee = $_POST['name'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $birth_date = $_POST['birth_date'];
            $contractName = $_POST['contract'];
            $department = isset($_POST['department']) ? $_POST['department'] : $employee['department'];
            $position = isset($_POST['position']) ? $_POST['position'] : $employee['position'];
            
            $tel = $_POST['tel'];
            $salary = $_POST['salary'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $description = 'nhân viên mới';
            $educationName = "Đại học";
            $fileAvatar = $_FILES['avatar'];

            $contract_type_id = 3;
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // die();
            try {
                // update employee
                $fileName = $employee['avatar'];
                if(!empty($fileAvatar['name'])) {
                    $fileName = $fileAvatar['name'];
                    move_uploaded_file($fileAvatar['tmp_name'], './public/storage/employee_images/'.$fileName);
                }
                
                $updateEmp = $this->employeeModel->updateEmployee($id, $birth_date, $gender, $nameEmployee, $fileName, $tel, $email, $description, $address);

                $updateEmpDetail = $this->employeeModel->updateDetail($id, $educationName, $position, $department);
                
                $updateContract = $this->employeeModel->updateContract($contractName, $description, $salary, $start_date, $end_date, $id, $contract_type_id);
                
                if($updateEmp || $updateEmpDetail || $updateContract) {
                    $_SESSION['success'] = "Cập nhật thành công!";
                    header('location: index.php?page=employee&method=edit&id='.$id);
                }
            } catch (\Throwable $th) {
                echo json_encode([
                    'status' => 401,
                    'message' => $th->getMessage(),
                ]);
            }
        }
    }
    
    public function delete() {
        $id = json_decode(file_get_contents('php://input'), true);
        try {
            //code...
            $delete = $this->employeeModel->deleteEmployee($id);
            if($delete) {
                // $_SESSION['success'] = "Cập nhật thành công!";
                // header('location: index.php?page=employee');
                echo json_encode([
                        'status' => 200,
                        'message' => 'Xóa nhân viên thành công!',
                    ]);
                    
            }
        } catch (\Throwable $th) {
            echo json_encode([
                'status' => 401,
                'message' => $th->getMessage(),
            ]);
        }
        
    }
    
    public function getPosition()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // get posiotion by departmet id
        if(isset($data)) {
            $departmentId = $data['departmentId'];
            $positions = $this->employeeModel->showPosition($departmentId);
            $html = '';
            foreach($positions as $position) {
                $html .= "<option value='" .$position['name']. "'" . ">" .$position['name']."</option>";
            }
            echo json_encode([
                'status' => 200,
                'html' => $html,
            ]);
        }
    }
}
$employee = new EmployeeController();