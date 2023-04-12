<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include_once '../partials/head.php';
    ?>
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
							$page = isset($_GET['page']) ? $_GET['page'] : 'index';
							switch ($page) {
								case 'index':
									include_once '../../Controllers/Auth/LoginController.php';
									$login = new LoginController();
									break;
								case 'register':
									include_once '../../Controllers/Auth/RegisterController.php';
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
        include_once '../partials/script.php';
    ?>
</body>

</html>