<?php
include_once './Controllers/Controller.php';
class ClassroomController extends Controller
{
    private $courseModel;
    private $roomModel;
    private $classroomModel;
    public function __construct()
    {
        $this->courseModel = parent::model('Course');
        $this->roomModel = parent::model("Room");   
        $this->classroomModel = parent::model("Classroom");   
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
            case 'allocate':
                // hien thi thong tin thoi gian lop hoc
                $this->indexAllocateClassroom();
                
                break;
            case 'create_allocate':
                $this->createAllocateClassroom();
                break;
            case 'store_allocate':
                $this->storeAllocateClassroom();
                break;
            default:
                $rooms = $this->roomModel->showAllRoom();
                // echo '<pre>';
                // print_r($rooms);
                // echo '</pre>';
                // die();
                include_once './Views/pages/manage_classroom/index.php';
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


    // Hien thi danh sach lop hoc da phan bo
    public function indexAllocateClassroom()
    {
        $classrooms = $this->classroomModel->showAllocateClassroom();
        include_once './Views/pages/manage_classroom/index_allocate.php';

    }

    // hien thi form tao moi phan bo lop hoc
    public function createAllocateClassroom()
    {
        // show khóa học
        $courses = $this->courseModel->showAllCourse();
        // show phòng
        $rooms = $this->roomModel->showAllRoom();

        include_once './Views/pages/manage_classroom/create_allocate.php';
    }

    // luu thong tin
    public function storeAllocateClassroom()
    {
        if(isset($_POST)) {
            $courseId = $_POST['course'];
            $roomId = $_POST['room'];
            $day = $_POST['day'];
            $startTime = $_POST['start_time'];
            $endTime = $_POST['end_time'];
            
            
            try {
                // insert course
                $addClassroom = $this->classroomModel->addClassroom($roomId, $courseId, $day, $startTime, $endTime);

                if($addClassroom) {
                    $_SESSION['success'] = "Thêm thành công!";
                    header('location: index.php?page=classroom&method=allocate');
                }
            } catch (\Throwable $th) {
                echo json_encode([
                    'status' => 401,
                    'message' => $th->getMessage(),
                ]);
            }
        }
    }
}
$course = new ClassroomController();