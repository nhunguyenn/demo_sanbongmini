<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAN BONG MINI</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
</head>
<body>

    <div class="container">
        <!-- Navbar -->
        <?php include("views/navbar.php") ?>

        <!-- Slideshow -->
        <?php include("views/slideshow.php") ?>

         <!--Gioi thieu  -->
         <?php include("views/gioiThieu.php") ?>

         <!-- Loai san -->
         <?php include("views/loaiSan.php") ?>

         <!-- Lich san -->
         <?php include("views/lichSan.php") ?>

         <!-- Lien he -->
         <?php include("views/lienHe.php") ?>
    </div>
    <!-- Footer -->
    <?php include("views/footer.php") ?>
</body>
</html>