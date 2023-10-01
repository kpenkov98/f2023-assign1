<?php
function navigation() {
    echo '<div class="navbar">';
    echo '<div class="menu-toggle" onclick="toggleMenu()">';
    echo '<div class="bar"></div>';
    echo '<div class="bar"></div>';
    echo '<div class="bar"></div>';
    echo '</div>';
    echo '<ul class="menu">';
    echo '<li><a href="index.php">Home</a></li>';
    echo '<li><a href="search.php">Search</a></li>';
    echo '<li><a href="browse.php">Browse</a></li>';
    echo '<li><a href="favourite.php">Favorite List</a></li>';
    echo '<li><a href="about.php">Song</a></li>';
    echo '<li><a href="song.php">About Us</a></li>';
    echo '</ul>';
    echo '</div>';
}
?>