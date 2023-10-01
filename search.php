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
        <head>
        <?php htmlhead(); ?>
          
          </head>
<body>
<header>
    <?php music_header(); 
    navigation();  ?>
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