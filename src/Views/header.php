<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Document</title>
    <link href="public/css/style.css" rel="stylesheet" />
</head>
<body>
    <div class="header">
        <div class="logo">
            <h1>Mali Oglasi</h1>
        </div>
        <div class="top-menu">
            <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?page=about-us">About Us</a></li>
                    <li><a href="index.php?page=contact">Contact</a></li>
                <?php
                if($securityService->isLoggedIn()) {
                ?>
                    <li>
                        <a href="index.php?page=logout">Logout</a>
                    </li>                        
                    <li>
                        <a href="index.php?page=create-ad">Create ad</a>
                    </li>                        
                <?php
                } else {
                ?>
                    <li>                
                        <a href="index.php?page=register">Register</a>
                    </li>                        
                    <li>                
                        <a href="index.php?page=login">Login</a>
                    </li>                        
                <?php
                }
                ?>                    
            </ul>
        </div>
    </div>