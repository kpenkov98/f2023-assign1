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
    <header>
        <?php music_header(); ?>
    </header>
    </br>
    <nav>
        <?php navigation() ?>
    </nav>
    <div class="container">
        <h2>Home Page</h2>
        <h3>Kirill Penkov COMP3512 <a href="https://github.com/kpenkov98/f2023-assign1.git" target="_blank">Github</a></h3>
        <p>This purpose of this assignment is to create a multi-page PHP website with database integration. Allowing users to browse, seach and favorite their music.</p>
    </div>
    <h2>Song Information</h2>
    <div class="container">
        <div class="row">
            <div class="two-half columns">
                <ol>
                    Top Genres
                    <?php top_genres($db); ?>
                </ol>
            </div>
            <div class="two-half columns">
                <ol>
                    Top Artists
                    <?php top_artists($db); ?>
                </ol>
            </div>
            <div class="two-half columns">
                <ol>
                    Most Popular Songs
                    <?php most_pop_songs($db); ?>
                </ol>
            </div>
            <div class="two-half columns">
                <ol>
                    One-Hit Wonders
                    <?php one_hit_wonders($db); ?>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="two-half columns">
                <ol>
                    Longest Acoustic Songs
                    <?php long_acoustic($db); ?>
                </ol>
            </div>
            <div class="two-half columns">
                <ol>
                    At The Club
                    <?php club($db); ?>
                </ol>
            </div>
            <div class="two-half columns">
                <ol>
                    Running Songs
                    <?php running_song($db); ?>
                </ol>
            </div>
            <div class="two-half columns">
                <ol>
                    Studying Songs
                    <?php studying_song($db); ?>
                </ol>
            </div>

        </div>
    </div>
    <footer>
        <?php footer(); ?>
    </footer>
</body>

</html>