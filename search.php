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
  <div class="container">
    <header>
      <?php music_header();
      navigation();  ?>
    </header>
    <div class="row">
      <br>
      <!--source for search info https://owlcation.com/stem/Simple-search-PHP-MySQL-->
      <?php
      search_song($db);
      ?>
    </div>
    <footer>
      <?php footer(); ?>
    </footer>
  </div>
</body>

</html>