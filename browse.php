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
    <?php music_header(); navigation();?>
</header>
<div>
<table align="center" border="1" cellpadding ="3" cellspacing = "0">
<tr>
  <td><h5 align="center">Title</h5></td>
  <td><h5 align="center">Artist</h5></td>
  <td><h5 align="center">Year</h5></td>
</tr>
<?php 
$musicList = sorted_music_list($db); 

foreach ($musicList as $music) {

  echo "<tr>";
  echo "<td> {$music['title']} </td>";
  echo "<td> {$music['artist_name']} </td>";
  echo "<td> {$music['year']}</td>";
  echo  "</tr>";

} 

?>
</table>
</div>
<footer>
  <?php footer(); ?>
</footer>
</body>
</html>