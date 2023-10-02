<?php
include 'php/header.php';
include 'php/footer.php';
include 'php/config.php';
include 'php/database.php';
include 'php/navigation.php';
include 'php/htmlhead.php';
?>
<html lang="en">
<head>
    <?php htmlhead(); ?>
</head>
<body>
<header>
    <?php music_header(); 
    navigation();  ?>
</header>
<h3 align="center"> 
<?php single_song($db);?>
</h3> 
<footer>
  <?php footer(); ?>
</footer>
</body>
</html>