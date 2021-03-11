<?php
require __DIR__ . '/./backend/init.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">

    <title><?= $title = null ?></title>
</head>
<body>
<header>
    <div class="header" id="myHeader">
        <div class="container">
            <nav class="flex">
                <div class="links">
                    <a href="index.php">Home Page</a>
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo "<a href='dashboard.php'>Dashboard</a>";
                    } else {
                        echo "<a href=\"login.php\">Login</a>";
                    }
                    ?>
                </div>
                <div class="logo">
                    <a target="_blank" href="https://www.curio.nl/"><img src="img/curio-roze.png" alt="curio logo"></a>
                </div>
                <div class="links">
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo "<a href='logout.php'>Logout?</a>";
                    } else {
                    }
                    ?>
                </div>
            </nav>
        </div>
</header>
