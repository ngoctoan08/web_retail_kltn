<?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'login';
    switch ($page) {
        case 'login':
            include_once './Controllers/Auth/LoginController.php';
            $login = new LoginController();
            break;
        case 'register':
            include_once './Controllers/auth/RegisterController.php';
            $register = new RegisterController();
            break;
        
    }
?>