<?php
include 'php/header.php';
include 'php/footer.php';
include 'php/config.php';
include 'php/database.php';
include 'php/navigation.php';
include 'php/htmlhead.php';
?>
<!-- The style used in this website is from http://getskeleton.com/ -->
<html lang="en">
<head>
<?php htmlhead(); ?>
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
        <table>
        <?php top_genres($db); ?>
        </table>
        <li>Top Artists</li>
        <table>
        <?php top_artists($db); ?>
        </table>
        <li>Most Popular Songs</li>
        <table>
        <?php most_pop_songs($db); ?>
        </table>
        <li>One-Hit Wonders</li>
        <table>
        <?php one_hit_wonders($db); ?>
        </table>
        <li>Longest Acoustic Songs</li>
        <table>
        <?php long_acoustic($db); ?>
        </table>
        <li>At The Club</li>
        <table>
        <?php club($db); ?>
        </table>
        <li>Running Songs</li>
        <li>Studying Songs</li>
    </section>


    <footer>
        <?php footer(); ?>
    </footer>
</body>
</html>