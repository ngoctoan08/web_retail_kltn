<?php
include_once './Controllers/Controller.php';
class ItemController extends Controller
{
    private $userModel;
    private $itemModel;
    public function __construct()
    {
        $this->userModel = parent::model('User');
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
            case 'show':
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $this->show($id);
                break;
            // case 'edit':
            //     $id = isset($_GET['id']) ? $_GET['id'] : '';
            //     $this->edit($id);
            //     break;
            // case 'update':
            //     $id = isset($_GET['id']) ? $_GET['id'] : '';
            //     $this->update($id);
            //     break;
            case 'delete':
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $this->delete();
                break;
            // case 'getPosition':
            //     $this->getPosition();
            //     break;
            default:
                $items = $this->itemModel->showAllItem();

                // var_dump($Items);
                include_once './Views/pages/manage_item/index.php';
                break;
        }
    }

    // Hiện thị form thêm mới
    public function create()
    {
        //show units
        $units = $this->itemModel->showAllUnits();
        // 
        include_once './Views/pages/manage_item/create.php';
    }

    public function store()
    {
        // $data = json_decode(file_get_contents('php://input'), true);
        
        if(!empty($_POST)) {
            $data = $_POST;
            $code = $data['code'];
            $name = $data['name'];
            $unit = $data['unit'];
            $price = $data['price'];
            $user = $_SESSION['id_account'];
            $fileAvatar = $_FILES['avatar'];
            
            try {
                // insert Item
                $fileName = time().$fileAvatar['name'];
                $addItem = $this->itemModel->addItem($code, $name, $unit, $fileName, $price, $user);
                move_uploaded_file($fileAvatar['tmp_name'], './public/storage/item_images/'.$fileName);
                
                $lastIdItem = $this->itemModel->returnLastId();
                
                if($addItem) {
                    $_SESSION['success'] = "Thêm vật tư mới thành công!";
                    header('location: index.php?page=item&method=show&id='.$lastIdItem);
                    // header('location: index.php?page=item');
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
        else {
            echo "lỗi";
        }
    }

    public function show($id)
    {
        if(!empty($id))
        {
            $item = $this->itemModel->showItemById($id);
            var_dump($item);

            $user = $this->userModel->showUserById($item['CreatedBy']);
            
            include_once './Views/pages/manage_Item/show.php';
        }
    }

    // public function edit($id)
    // {
    //     if(!empty($id))
    //     {
    //         // department
    //         $departments = $this->ItemModel->showAllDepartment();
    //         $positions = $this->ItemModel->showPosition(2);
    //         // contract
    //         $contracts = $this->ItemModel->showAllContractType();
            
    //         $Item = $this->ItemModel->showItemById($id);
    //         include_once './Views/pages/manage_Item/edit.php';

    //         // echo "<pre>";
    //         // print_r($Item);
    //         // echo "</pre>";
    //     }
    // }

    // public function update($id)
    // {
    //     // get info Item
    //     $Item = $this->ItemModel->showItemById($id);
    //     // echo $id;
    //     // die();
    //     if(isset($_POST)) {
    //         $nameItem = $_POST['name'];
    //         $address = $_POST['address'];
    //         $gender = $_POST['gender'];
    //         $email = $_POST['email'];
    //         $birth_date = $_POST['birth_date'];
    //         $contractName = $_POST['contract'];
    //         $department = isset($_POST['department']) ? $_POST['department'] : $Item['department'];
    //         $position = isset($_POST['position']) ? $_POST['position'] : $Item['position'];
            
    //         $tel = $_POST['tel'];
    //         $salary = $_POST['salary'];
    //         $start_date = $_POST['start_date'];
    //         $end_date = $_POST['end_date'];
    //         $description = 'nhân viên mới';
    //         $educationName = "Đại học";
    //         $fileAvatar = $_FILES['avatar'];

    //         $contract_type_id = 3;
    //         // echo "<pre>";
    //         // print_r($data);
    //         // echo "</pre>";
    //         // die();
    //         try {
    //             // update Item
    //             $fileName = $oldFile = $Item['avatar'];
    //             if(!empty($fileAvatar['name'])) {
    //                 $fileName = $fileAvatar['name'];
    //                 move_uploaded_file($fileAvatar['tmp_name'], './public/storage/Item_images/'.$fileName);
    //                 unlink('./public/storage/Item_images/'.$oldFile);
    //             }
                
    //             $updateEmp = $this->ItemModel->updateItem($id, $birth_date, $gender, $nameItem, $fileName, $tel, $email, $description, $address);

    //             $updateEmpDetail = $this->ItemModel->updateDetail($id, $educationName, $position, $department);
                
    //             $updateContract = $this->ItemModel->updateContract($contractName, $description, $salary, $start_date, $end_date, $id, $contract_type_id);
                
    //             if($updateEmp || $updateEmpDetail || $updateContract) {
    //                 $_SESSION['success'] = "Cập nhật thành công!";
    //                 header('location: index.php?page=Item&method=edit&id='.$id);
    //             }
    //         } catch (\Throwable $th) {
    //             echo json_encode([
    //                 'status' => 401,
    //                 'message' => $th->getMessage(),
    //             ]);
    //         }
    //     }
    // }
    
    public function delete() {
        $request = json_decode(file_get_contents('php://input'), true);

        if(!empty($request)) {
            $id = $request['id'];
            
            try {
                //code...
                // unlink image in storage                
                $item = $this->itemModel->getAvatar($id);
                $avatarPath = $item['Avatar'];
                unlink('./public/storage/item_images/'.$avatarPath);
                // do delete
                $delete = $this->itemModel->deleteItem($id);
                if($delete) {
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
    }
    
    // public function getPosition()
    // {
    //     $data = json_decode(file_get_contents('php://input'), true);
    //     // get posiotion by departmet id
    //     if(isset($data)) {
    //         $departmentId = $data['departmentId'];
    //         $positions = $this->ItemModel->showPosition($departmentId);
    //         $html = '';
    //         foreach($positions as $position) {
    //             $html .= "<option value='" .$position['name']. "'" . ">" .$position['name']."</option>";
    //         }
    //         echo json_encode([
    //             'status' => 200,
    //             'html' => $html,
    //         ]);
    //     }
    // }
}
$item = new ItemController();