<?php
include 'php/header.php';
include 'php/footer.php';
include 'php/config.php';
include 'php/database.php';
include 'php/navigation.php';
?>
<html lang="en">
    <head>
        <head>
            <!-- Basic Page Needs
            –––––––––––––––––––––––––––––––––––––––––––––––––– -->
            <meta charset="utf-8">
            <title>Song Search</title>
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
<body>
<header>
    <?php navigation(); music_header(); ?>
</header>
    <form action="php/database.php" method="get">

        <div class="row">
          <div class="five columns">
            <label for="Song Title">Song Title</label>
            <input class="u-full-width" type="text" placeholder="Ex. Lose Yourself" id="exampleSongTitle">
          </div>
          <div class="five columns">
            <label for="typeOfGenre">Artist</label>
            <select class="u-full-width" id="Artist">
                <option value="Option 1"><!-- insert PHP here --></option>

            </select>
          </div>
        </div>
        <div class="five columns">
          <label for="typeOfGenre">Genre</label>
          <select class="u-full-width" id="Genre">
              <option value="Option 1">Questions</option>
          </select>
        </div>
        
        </div>
        <div class="five columns">
        <label for="exampleMessage">Year</label>
        <textarea class="u-full-width" placeholder="2017" id="Year"></textarea>
        <input class="button-primary" type="submit" value="Submit">
      </div>
    </form>
    
<footer>
  <?php footer(); ?>
</footer>
      
</body>
</html>