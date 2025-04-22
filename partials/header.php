<?php
require_once('_inc/autoload.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Studio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    
    <!-- Navigation bar -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="gaming-studio-brand" href="index.php">Gaming Studio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        
                    <?php
                    $menu = new Menu();
                    $menuItems = $menu->index();
                    foreach ($menuItems as $item) {
                    echo '<li><a class="nav-link" href="' . $item['link'] . '">' . $item['label'] . '</a></li>';
                    }
                    ?>
                    <!--
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="careers.php">Careers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gallery.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                    -->
                    </ul>
                    <button class="register-btn text-white" onclick="window.location.href='contact.php'">Contact Us</button>
                </div>
            </div>
        </nav>
    </header>