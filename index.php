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
            <?php music_header(); ?>
        </header>
        <nav>
        <?php navigation() ?>
        </nav>
        <div class="container">
            <h2>Home Page</h2>
            <h3>Kirill Penkov COMP3512 <a href="https://github.com/kpenkov98/f2023-assign1.git" target="_blank">Github</a></h3>
            <p>This purpose of this assignment is to create a multi-page PHP website with database integration. Allowing users to browse, seach and favorite their music.</p>
        </div>
        <div class="container">
            <h2 align="center">Song Information</h2>
            <div class="row">

                <div class="two-half columns">
                    <table>
                        <th>Top Genres</th>
                        <?php top_genres($db); ?>
                    </table>
                </div>

                <div class="two-half columns">
                    <table>
                        <th>Top Artists</th>
                        <?php top_artists($db); ?>
                    </table>
                </div>
                <div class="two-half columns">
                    <table>
                        <th>Most Popular Songs</th>
                        <?php most_pop_songs($db); ?>
                    </table>
                </div>
                <div class="two-half columns">
                    <table>
                        <th>One-Hit Wonders</th>
                        <?php one_hit_wonders($db); ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="two-half columns">
                    <table>
                        <th>Longest Acoustic Songs</th>
                        <?php long_acoustic($db); ?>
                    </table>
                </div>
                <div class="two-half columns">
                    <table>
                        <th>At The Club</th>
                        <?php club($db); ?>
                    </table>
                </div>
                <div class="two-half columns">
                    <table>
                        <th>Running Songs</th>
                        <?php running_song($db); ?>
                    </table>
                </div>
                <div class="two-half columns">
                    <table>
                        <th>Studying Songs</th>
                        <?php studying_song($db); ?>
                    </table>
                </div>

            </div>
        </div>
        <footer>
            <?php footer(); ?>
        </footer>
    </div>
</body>

</html>