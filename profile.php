<?php

$selected_page="profile";
include "page.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="container">  
        <?php echo $header; ?>
        <section id="content">
            <div class="part">
                <div class="title">
                    <h1>Voici ton profile</h1>
                </div>
                <?php
                    foreach($_SESSION as $key => $value){
                        echo $key." ==> ". $value ."<br>";
                    }
                ?>
            </div>
        </section>
    </div>
</body>
</html>