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
    <?php htmlhead() ?>
</head>


<body>
    <div class="container">
        <header>
            <?php music_header();
            navigation(); ?>
        </header>
        <div class="row">
            <h2>Home Page</h2>
            <h4>Kirill Penkov - COMP3512</h4>
            <h4><a class="button" href="https://github.com/kpenkov98/f2023-assign1.git" target="_blank">Github</a></h4>
            <h5>This purpose of this assignment is to create a multi-page PHP website with database integration. Allowing users to browse, seach and add to favourites music.</h5>
            <h2>Song Information</h2>
        </div>
        <div class="row">
            <div class="two-half column">
                <ol>
                    <h4>Top Genres</h4>
                    <?php top_genres($db); ?>
                </ol>
            </div>
            <div class="two-half column">
                <ol>
                    <h4>Top Artists</h4>
                    <?php top_artists($db); ?>
                </ol>
            </div>
            <div class="two-half column">
                <ol>
                    <h4>Most Popular Songs</h4>
                    <?php most_pop_songs($db); ?>
                </ol>
            </div>
            <div class="two-half column">
                <ol>
                    <h4>One-Hit Wonders</h4>
                    <?php one_hit_wonders($db); ?>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="two-half column">
                <ol>
                    <h4>Longest Acoustic Songs</h4>
                    <?php long_acoustic($db); ?>
                </ol>
            </div>
            <div class="two-half column">
                <ol>
                    <h4>At The Club</h4>
                    <?php club($db); ?>
                </ol>
            </div>
            <div class="two-half column">
                <ol>
                    <h4>Running Songs</h4>
                    <?php running_song($db); ?>
                </ol>
            </div>
            <div class="two-half column">
                <ol>
                    <h4>Studying Songs</h4>
                    <?php studying_song($db); ?>
                </ol>
            </div>

        </div>

        <footer>
            <?php footer(); ?>
        </footer>
    </div>
</body>

</html>