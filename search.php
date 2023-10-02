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
        <head>
        <?php htmlhead(); ?>
          
          </head>
<body>
<header>
    <?php music_header(); 
    navigation();  ?>
</header>

<!--source for search info https://owlcation.com/stem/Simple-search-PHP-MySQL-->
<?php     

search_song(); 
?>



<footer>
  <?php footer(); ?>
</footer>
      
</body>
</html>