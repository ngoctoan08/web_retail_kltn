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
                <?php echo $content;?>
            </div>
        </div>
    </div>
    <?php
        include_once './Views/partials/script.php';
        echo $script;
    ?>
</body>

</html>