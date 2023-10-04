<?php
session_start();
ob_start();
include_once('./configs/helper.php');


$page = isset($_GET['page']) ? $_GET['page'] : '';
switch ($page) {
    case '':
        if (!isset($_SESSION['id_account'])) {
            header('Location: index.php?page=login');
        }
        include_once './Controllers/Admin/EmployeeController.php';
        break;
    case 'dashboard':
        include_once './Controllers/Admin/EmployeeController.php';
        break;
    case 'item':
        include_once './Controllers/Admin/ItemController.php';
        break;
    case 'course':
        include_once './Controllers/Admin/CourseController.php';
        break;
    case 'classroom':
        include_once './Controllers/Admin/ClassroomController.php';
        break;
    case 'enroll_course':
        include_once './Controllers/Admin/EnrollCourseController.php';
        break;
    case 'employee_result':
        include_once './Controllers/Admin/EmployeeResultController.php';
        break;
    case 'login':
        include_once './Controllers/Auth/LoginController.php';
        break;
    case 'logout':
        unset($_SESSION['id_account']);
        unset($_SESSION['role_account']);
        unset($_SESSION['name_account']);
        unset($_SESSION['email_account']);

        setcookie("username", "", time()-3600);
        setcookie("password", "", time()-3600);
        header("location: index.php?page=login");
        break;
    case 'register':
        include_once './Controllers/Auth/RegisterController.php';
        break;

}
?>