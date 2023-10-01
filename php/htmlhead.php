<?php 
function htmlhead() {
    echo '<meta charset="utf-8">';
    echo '<title>Home Page</title>';
    echo '<meta name="description" content="">';
    echo '<meta name="author" content="">';

    // mobile specifics
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';

    // fonts
    echo '<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">';

    // css style sheets
    echo '<link rel="stylesheet" href="css/normalize.css">';
    echo '<link rel="stylesheet" href="css/skeleton.css">';

    // webpage icon
    echo '<link rel="icon" type="image/png" href="images/favicon.png">';
}