<?php
include_once './Controllers/Controller.php';
class EnrollController extends Controller
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
            default:
                $enrolls = $this->employeeCourseModel->showAllEmployeeCourse();
                include_once './Views/pages/enroll_course/index.php';
                break;
        }
    }

    // Hiện thị form thêm mới
    public function create()
    {
        // phòng ban
        $departments = $this->employeeModel->showAllDepartment();
        // thông tin khóa học
        $courses = $this->courseModel->showAllCourse();
        // nhân viên
        $employees = $this->employeeModel->showAllEmployee();

        include_once './Views/pages/enroll_course/create.php';
    }

    public function store()
    {  
        if(isset($_POST)) {
            $courseId = $_POST['course'];
            $employeeId = $_POST['employee'];
            $score = NULL;
            
            try {
                $add = $this->employeeCourseModel->addEmployeeCourse($employeeId, $courseId, $score);

                if($add) {
                    $_SESSION['success'] = "Thêm mới thành công!";
                    header('location: index.php?page=enroll_course&method=index');
                }
            } catch (\Throwable $th) {
                echo ($th->getMessage());
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
    
    public function getPosition()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // get posiotion by departmet id
        if(isset($data)) {
            $departmentId = $data['departmentId'];
            $positions = $this->courseModel->showPosition($departmentId);
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

$course = new EnrollController();