<?php
include_once './Controllers/Controller.php';
class PolicyController extends Controller
{
    private $userModel;
    private $policyModel;
    public function __construct()
    {
        $this->userModel = parent::model('User');
        $this->policyModel = parent::model('Policy');
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
            // case 'show':
            //     $id = isset($_GET['id']) ? $_GET['id'] : '';
            //     $this->show($id);
            //     break;
            // case 'edit':
            //     $id = isset($_GET['id']) ? $_GET['id'] : '';
            //     $this->edit($id);
            //     break;
            // case 'update':
            //     $id = isset($_GET['id']) ? $_GET['id'] : '';
            //     $this->update($id);
            //     break;
            // case 'delete':
            //     $id = isset($_GET['id']) ? $_GET['id'] : '';
            //     $this->delete();
            //     break;
            // case 'getPosition':
            //     $this->getPosition();
            //     break;
            default:
                $courses = $this->policyModel->showAllPolicy();
                // echo '<pre>';
                // print_r($courses);
                // echo '</pre>';
                // die();
                include_once './Views/pages/manage_policy/index.php';
                break;
        }
    }

    // Hiện thị form thêm mới
    public function create()
    {
        // echo "toandaika";
        $customers = $this->policyModel->showAllCustomer();

        include_once './Views/pages/manage_policy/create.php';
    }

    public function store()
    {  
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        die();
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
                $addCourse = $this->policyModel->addCourse($nameCourse, $start_date, $end_date, $fileName, $description, $course_duration);
                move_uploaded_file($fileAvatar['tmp_name'], './public/storage/courses_images/'.$fileName);
                
                $lastIdCourse = $this->policyModel->returnLastId();

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
            $course = $this->policyModel->showCourseById($id);
            // list học viên đky khóa học
            include_once './Views/pages/manage_policy/show.php';
        }
    }

    public function edit($id)
    {
        if(!empty($id))
        {
            
            $course = $this->policyModel->showcourseById($id);
            include_once './Views/pages/manage_policy/edit.php';

            // echo "<pre>";
            // print_r($course);
            // echo "</pre>";
        }
    }

    public function update($id)
    {
        // get info course
        $course = $this->policyModel->showCourseById($id);
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
                
                $updateCourse = $this->policyModel->updateCourse($id, $nameCourse, $start_date, $end_date, $fileName, $description, $course_duration);

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
                $course = $this->policyModel->getAvatar($id);
                $avatarPath = $course['avatar'];
                unlink('./public/storage/courses_images/'.$avatarPath);
                $delete = $this->policyModel->deleteCourse($id);
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
            $positions = $this->policyModel->showPosition($departmentId);
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
$policy = new PolicyController();