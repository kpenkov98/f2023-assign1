<?php
function navigation() {
    echo "<nav class='navbar'>";
    echo "<div class='container'>";
        echo "<ul class='navbar-list'>";
            echo "<li class='navbar-item'><a class='navbar-link' href='index.php'>Home</a></li>";
            echo "<li class='navbar-item'><a class='navbar-link' href='search.php'>Search</a></li>";
            echo "<li class='navbar-item'><a class='navbar-link' href='browse.php'>Browse</a></li>";
            echo "<li class='navbar-item'><a class='navbar-link' href='favourite.php'>Favourite List</a></li>";
            echo "<li class='navbar-item'><a class='navbar-link' href='about.php'>About Us(Me)</a></li>";
        echo "</ul>";
    echo "</div>";
    echo "</nav>";
}
?>
