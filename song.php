<?php
include 'php/header.php';
include 'php/footer.php';
include 'php/config.php';
include 'php/database.php';
include 'php/navigation.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <?php music_header(); 
    navigation();  ?>
</header>

<footer>
  <?php footer(); ?>
</footer>
</body>
</html>