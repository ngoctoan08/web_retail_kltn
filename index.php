<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include_once './Views/partials/head.php';
    ?>
    <!-- Title Page-->
    <title>
        <?=$title?>
    </title>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="../index.php">
                                <img src="" alt="Laforce">
                            </a>
                        </div>
                        <?php
                            echo $content;
							$page = isset($_GET['page']) ? $_GET['page'] : 'login';
							switch ($page) {
								case 'login':
                                    // include_once './Views/auth/login.php';
									// include_once './Controllers/Auth/LoginController.php';
									// $login = new LoginController();
									break;
								case 'register':
									include_once './Controllers/Auth/RegisterController.php';
                                    // include_once './Views/auth/register.php';

									$register = new RegisterController();
									break;
							}
						?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
        include_once './Views/partials/script.php';
        echo $script;
    ?>
</body>

</html>