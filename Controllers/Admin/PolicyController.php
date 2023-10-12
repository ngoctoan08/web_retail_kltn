<?php
include_once './Controllers/Controller.php';
class PolicyController extends Controller
{
    private $userModel;
    private $policyModel;
    private $itemModel;
    public function __construct()
    {
        $this->userModel = parent::model('User');
        $this->policyModel = parent::model('Policy');
        $this->itemModel = parent::model('Item');
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
                $policies = $this->policyModel->showAllPolicy();
                echo '<pre>';
                print_r($policies);
                echo '</pre>';
                die();
                include_once './Views/pages/manage_policy/index.php';
                break;
        }
    }

    // Hiện thị form thêm mới
    public function create()
    {
        // echo "toandaika";
        $customers = $this->policyModel->showAllCustomer();
        $items = $this->itemModel->showAllItem();
        
        include_once './Views/pages/manage_policy/create.php';
    }

    public function store()
    {  
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        if(isset($_POST)) {
            $employee_id = $_POST['employee'];
            $doc_date = $_POST['doc_date'];
            $doc_no = rand(0,9991);
            $start_date = !empty($_POST['start_date']) ? $_POST['start_date'] : NULL;
            $end_date = !empty($_POST['end_date']) ? $_POST['end_date'] : NULL;
            $description = $_POST['description'];
            // echo $start_date;
            $itemId = $_POST['ItemId'];
            $giftItemId = $_POST['GiftItemId'];
            $giftQuantity = $_POST['GiftQuantity'];
            $giftMaxQuantity = $_POST['GiftMaxQuantity'];
            $is_closed = !empty($_POST['isclosed']) ? 1 : 0;
            // echo "--".sizeof($itemId);
            // die();

            try {
                $addPolicy = $this->policyModel->addPolicy($doc_date, $doc_no, $description, $start_date, $end_date, $is_closed, $employee_id);
                $lastIdPolicy = $this->policyModel->returnLastId();
                $itemName = 'Test';
                $unit = 'Cái';
                for($i=0; $i < sizeof($itemId); $i++) {
                    $addPolicyDetail = $this->policyModel->addPolicyDetail($lastIdPolicy, $itemId[$i], $itemName, $unit, $giftItemId[$i], $giftQuantity[$i], $giftMaxQuantity[$i]);
                }
                if($addPolicy && $addPolicyDetail) {
                    $_SESSION['success'] = "Thêm chính sách mới thành công!";
                    header('location: index.php?page=policy');
                    // header('location: index.php?page=policy&method=show&id='.$lastIdPolicy);
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