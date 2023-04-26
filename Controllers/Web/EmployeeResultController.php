<?php
include_once './Controllers/Controller.php';
class EmployeeResultController extends Controller
{
    private $courseModel;
    private $employeeModel;
    private $employeeCourseModel;
    public function __construct()
    {
        $this->courseModel = parent::model('Course');
        $this->employeeModel = parent::model("Employee");   
        $this->employeeCourseModel = parent::model("EmployeeCourse");   
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
            case 'delete':
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $this->delete();
                break;
            case 'get_employee':
                $this->getEmployee();
                break;
            case 'get_course':
                $this->getCourse();
                break;
            default:
                $employeeResults = $this->employeeCourseModel->showAllEmployeeDoneCourse();
                include_once './Views/pages/employee_result/index.php';
                break;
        }
    }

    // Hiện thị form thêm mới
    public function create()
    {
        // phòng ban
        $departments = $this->employeeModel->showAllDepartment();
        // nhân viên
        $employees = $this->employeeModel->showAllEmployee();
        // thông tin khóa học
        $courses = $this->courseModel->showAllCourse();
        

        include_once './Views/pages/employee_result/create.php';
    }

    // update score
    public function store()
    {  
        $request = json_decode(file_get_contents('php://input'), true);
        if(!empty($request)) {
            $employeeCourseId = $request['course'];
            $score = $request['score'];
            try {
                $addScore = $this->employeeCourseModel->updateScore($employeeCourseId, $score);
                
                if($addScore) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Cập nhật điểm thành công!',
                    ]);
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
        $request = json_decode(file_get_contents('php://input'), true);
        if(!empty($request)) {
            $id = $request['id'];
            try {
                $delete = $this->employeeCourseModel->deleteEmployeeCourse($id);
                if($delete) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Xóa thành công!',
                    ]);
                }
            } catch (\Throwable $th) {
                echo json_encode([
                    'status' => 401,
                    'message' => $th->getMessage(),
                ]);
            }
        }
    }
    
    public function getEmployee()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // get posiotion by departmet id
        if(isset($data)) {
            $departmentName = $data['departmentName'];
            $employees = $this->employeeModel->showEmployeeByDepartmentName($departmentName);
            $html = '';
            foreach($employees as $employee) {
                $html .= "<option value='" .$employee['id']. "'" . ">" .$employee['name']."</option>";
            }
            echo json_encode([
                'status' => 200,
                'html' => $html,
            ]);
        }
    }

    public function getCourse()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // get posiotion by departmet id
        if(isset($data)) {
            $employeeId = $data['employeeId'];
            $courses = $this->employeeCourseModel->getCourseByEmployeeId($employeeId);
            // echo "<pre>";
            // print_r($courses);
            // echo "</pre>";
            // die();
            $html = '';
            foreach($courses as $course) {
                $html .= "<option value='" .$course['id']. "'" . ">" .$course['course_name']."</option>";
            }
            echo json_encode([
                'status' => 200,
                'html' => $html,
            ]);
        }
    }
}

$course = new EmployeeResultController();