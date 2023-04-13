<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include_once './Views/partials/head.php'; ?>
    <!-- Title Page-->
    <title>
        <?=$title?>
    </title>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php include_once './Views/partials/sidebar.php'; ?>

        <div class="page-container">
            <!-- Header -->
            <?php include_once './Views/partials/header.php'; ?>

            <?php echo $content;?>

        </div>
    </div>


    <!-- Script -->
    <?php
        include_once './Views/partials/script.php';
        echo $script;
    ?>
</body>

</html>