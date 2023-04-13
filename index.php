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
        include_once './Controllers/Web/EmployeeController.php';
        break;
    case 'employee':
        include_once './Controllers/Web/EmployeeController.php';
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