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
  <div class="container">
    <header>
      <?php music_header();
      navigation(); ?>
    </header>
    <div class="row">
      <h2></h2>
      <p>
      <h4><strong>Tech Used</strong></h4>
      <p>
      <ul>
        <li>phpAdmin was used to test and build SQL Queries.</li>
        <li>Google and StackOverFlow was used to research and understand concepts, as well as troubleshoot issues.</li>
        <li>GetSkeleton.com was used as a prewritten CSS styling.</li>
        <li>W3Schools for HTML, CSS, PHP and SQL tips and fixes.</li>
      </ul>
      </p>
      <h4><strong>COMP3512</strong></h4>
      <p>Web Development II</p>
      <h4><strong>Group Members</strong></h4>
      <p>Kirill Penkov is a 5th year student at Mount Royal University. Studying Bachelor of Computer Information Systems.
        In his spare time Kirill rides motorcycles, builds cars and watches YouTube.</p>
      <h4><strong>Github</strong></h4>
      <a class="button" href="https://github.com/kpenkov98/f2023-assign1.git" target="_blank">Website Repo</a>
      <br>
      <a class="button button-primary" href="https://github.com/kpenkov98/" target="_blank">Kirills Repo</a>
      </p>
    </div>
    <footer>
      <?php footer(); ?>
    </footer>
  </div>
</body>

</html>