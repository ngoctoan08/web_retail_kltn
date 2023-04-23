<?php
include_once './Controllers/Controller.php';
class CourseController extends Controller
{
    private $userModel;
    private $courseModel;
    public function __construct()
    {
        $this->userModel = parent::model('User');
        $this->courseModel = parent::model('course');
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
                $courses = $this->courseModel->showAllCourse();
                // echo '<pre>';
                // print_r($courses);
                // echo '</pre>';
                // die();
                include_once './Views/pages/manage_course/index.php';
                break;
        }
    }

    // Hiện thị form thêm mới
    public function create()
    {
        
        include_once './Views/pages/manage_course/create.php';
    }

    public function store()
    {  
        
        if(isset($_POST)) {
            $nameCourse = $_POST['name'];
            $course_duration = $_POST['course_duration'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $description = $_POST['description'];
            $fileAvatar = $_FILES['avatar'];
            
            try {
                // insert course
                $fileName = time().$fileAvatar['name'];
                $addCourse = $this->courseModel->addCourse($nameCourse, $start_date, $end_date, $fileName, $description, $course_duration);
                move_uploaded_file($fileAvatar['tmp_name'], './public/storage/courses_images/'.$fileName);
                
                $lastIdCourse = $this->courseModel->returnLastId();

                if($addCourse) {
                    $_SESSION['success'] = "Thêm khóa học mới thành công!";
                    header('location: index.php?page=course&method=show&id='.$lastIdCourse);
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
            $course = $this->courseModel->showCourseById($id);
            // list học viên đky khóa học
            include_once './Views/pages/manage_course/show.php';
        }
    }

    public function edit($id)
    {
        if(!empty($id))
        {
            
            $course = $this->courseModel->showcourseById($id);
            include_once './Views/pages/manage_course/edit.php';

            // echo "<pre>";
            // print_r($course);
            // echo "</pre>";
        }
    }

    public function update($id)
    {
        // get info course
        $course = $this->courseModel->showCourseById($id);
        // echo "<pre>";
        //     print_r($course);
        //     echo "</pre>";
        //     die();
        if(isset($_POST)) {
            $nameCourse = $_POST['name'];
            $course_duration = $_POST['course_duration'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $description = $_POST['description'];
            $fileAvatar = $_FILES['avatar'];
            
            try {
                // update course
                $fileName = $oldFile = $course['avatar'];
                if(!empty($fileAvatar['name'])) {
                    $fileName = $fileAvatar['name'];
                    move_uploaded_file($fileAvatar['tmp_name'], './public/storage/courses_images/'.$fileName);
                    unlink('./public/storage/courses_images/'.$oldFile);
                }
                
                $updateCourse = $this->courseModel->updateCourse($id, $nameCourse, $start_date, $end_date, $fileName, $description, $course_duration);

                if($updateCourse) {
                    $_SESSION['success'] = "Cập nhật thành công!";
                    header('location: index.php?page=course&method=edit&id='.$id);
                }
            } catch (\Throwable $th) {
                echo $th->getMessage();
                die();
            }
        }
    }
    
    public function delete() {
        $request = json_decode(file_get_contents('php://input'), true);
        if(!empty($request)) {
            $id = $request['id'];
            try {
                //code...
                $course = $this->courseModel->getAvatar($id);
                $avatarPath = $course['avatar'];
                unlink('./public/storage/courses_images/'.$avatarPath);
                $delete = $this->courseModel->deleteCourse($id);
                if($delete) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Xóa khóa học thành công!',
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
$course = new CourseController();