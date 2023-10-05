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
    navigation(); ?>
  </header>
  <div class="container">
    <h2 align="center"></h2>
    <p align="center">
      brief
      description of the tech used, the course name, information about the group members,
      and the github repo link for the site as well as the github links for each group member
    <h4>Tech Used</h4>
    <p>
    <ul>
      <li>phpAdmin was used to test and build SQL Queries.</li>
      <li>Google and StackOverFlow was used to research and understand concepts, as well as troubleshoot issues.</li>
      <li>GetSkeleton.com was used as a prewritten CSS styling.</li>
      <li>W3Schools for HTML, CSS, PHP and SQL tips and fixes.</li>
    </ul>
    </p>
    <h4>COMP3512</h4>
    <h4>Group Members </h4>
    <p>Kirill Penkov is a 5th year student at Mount Royal University. Studying Bachelor of Computer Information Systems.</p>
    <p>In his spare time Kirill rides motorcycles, builds cars and watches YouTube.</p>
    <h4>Github</h4>
    <a href="https://github.com/kpenkov98/f2023-assign1.git" target="_blank">Website Repo</a>
    <br>
    <a href="https://github.com/kpenkov98/" target="_blank">Kirills Repo</a>
    </p>
  </div>
  <footer>
    <?php footer(); ?>
  </footer>
</body>

</html>