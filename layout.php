<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>My Website</h1>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <p>&copy; 2023 My Website</p>
    </footer>
    <?php
        include_once './Views/partials/script.php';
        echo $script;
    ?>
</body>

</html>