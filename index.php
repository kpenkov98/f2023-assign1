<?php
include 'php/header.php';
include 'php/footer.php';
include 'php/config.php';
include 'php/database.php';
include 'php/navigation.php';
?>
<!-- The style used in this website is from http://getskeleton.com/ -->
<html lang="en">
<head>
        <!-- Basic Page Needs
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta charset="utf-8">
        <title>Home Page</title>
        <meta name="description" content="">
        <meta name="author" content="">
      
        <!-- Mobile Specific Metas
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <!-- FONT
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
      
        <!-- CSS
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/skeleton.css">
      
        <!-- Favicon
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="icon" type="image/png" href="images/favicon.png">
      
      </head>
</head>
<body>     
<header>
    <?php music_header(); 
    navigation(); ?>
</header>
    <!--<section>
        <h2>Home Page</h2>
        <h3>Kirill Penkov COMP3512 <a href="https://github.com/kpenkov98/f2023-assign1.git" target="_blank">Github</a></h3>
        <p>This purpose of this assignment is to create a multi-page PHP website with database integration. Allowing users to browse, seach and favorite their music.</p>        
    </section> -->
    <section>
        <h2>Song Information</h2>
        <li>Top Genres</li>
        <li>Top Artists</li>
        <li>Most Popular Song</li>
        <li>One-Hit Wonder</li>
        <li>Longest Acoustic Song</li>
        <li>At The Club</li>
        <li>Running Songs</li>
        <li>Studying Songs</li>
    </section>


    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>