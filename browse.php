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
  <?php htmlhead(); ?>
</head>

<body>
  <div class="container">
    <header>
      <?php music_header();
      navigation(); ?>
    </header>
    <div class="row">
      <br>

      <?php
      $musicTable = sorted_music_list($db);

      //source for my search information https://owlcation.com/stem/Simple-search-PHP-MySQL
      if (isset($_GET['title']) || isset($_GET['artist']) || isset($_GET['year']) || isset($_GET['genre'])) {

        $title = $_GET['title'];
        $artist = $_GET['artist'];
        $year = $_GET['year'];
        $genre = $_GET['genre'];

        // gets value sent over search form

        $min_length = 1;
        //minimum length of the query

        if (strlen($title) >= $min_length || strlen($artist) >= $min_length || strlen($genre) >= $min_length || strlen($year) >= $min_length) {

          $title = strtolower(htmlspecialchars($title));
          $artist = strtolower(htmlspecialchars($artist));
          $year = htmlspecialchars($year);
          $genre = strtolower(htmlspecialchars($genre));

          //changes characters used in html to their equivalents, for example: < to &gt;

          $searchQuery = "SELECT songs.song_id, songs.title, artists.artist_name, songs.year, genres.genre_name  
          FROM songs 
          INNER JOIN artists ON songs.artist_id = artists.artist_id
          INNER JOIN genres ON songs.genre_id = genres.genre_id
          WHERE 1";

          if (!empty($title)) {
            $searchQuery .= " AND songs.title LIKE '%$title%'";
          }

          if (!empty($artist)) {
            $searchQuery .= " AND artists.artist_name LIKE '$artist'";
          }

          if (!empty($genre)) {
            $searchQuery .= " AND genres.genre_name LIKE '$genre'";
          }

          if (!empty($year)) {
            $searchQuery .= " AND songs.year = '$year'";
          }

          $searchQuery .= " ORDER BY songs.popularity DESC";

          $searchResult = $db->prepare($searchQuery);
          $searchResult->execute();

          $searchDB = $searchResult->fetchAll(PDO::FETCH_ASSOC);
          echo "<form method='POST' action='favourite.php'>";
          echo "<table align='center'>";
          echo "<tr>";
          echo "<td>";
          echo "<h5 align='center'>Title</h5>";
          echo "</td>";
          echo "<td>";
          echo "<h5 align='center'>Artist</h5>";
          echo "</td>";
          echo "<td>";
          echo "<h5 align='center'>Year</h5>";
          echo "</td>";
          echo "<td>";
          echo "<h5 align='center'>Genre Name</h5>";
          echo "</td>";
          echo "<td>";
          echo "<h5 align='center'>Add To Favourites</h5>";
          echo "</td>";
          echo "</tr>";

          foreach ($searchDB as $music) {
            echo "<tr>";
            echo "<td><a href='song.php?song_id={$music['song_id']}' class='button-primary'>{$music['title']}</a></td>";
            echo "<td>{$music['artist_name']}</td>";
            echo "<td>{$music['year']}</td>";
            echo "<td>{$music['genre_name']}</td>";
            echo "<td><input align='center' type='checkbox' name='favourite_songs[]' value='{$music['song_id']}'></td>";
            echo "</tr>";
          }
          echo "<tr>";
          echo "<td align='center'><input type='submit' class='floating-button button button-primary' value='Add Selected to Favorites'></td>";
          echo "</tr>";
          echo "</table>";
          echo "</form>";
        } else {
          echo "<h5 align ='center'>No Results</h5>";
        }
      } else {
        echo "<form method='POST' action='favourite.php'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>";
        echo "<h5 align='center'>Title</h5>";
        echo "</td>";
        echo "<td>";
        echo "<h5 align='center'>Artist</h5>";
        echo "</td>";
        echo "<td>";
        echo "<h5 align='center'>Year</h5>";
        echo "</td>";
        echo "<td>";
        echo "<h5 align='center'>Popularity</h5>";
        echo "</td>";
        echo "<td>";
        echo "<h5 align='center'>Add To Favourites</h5>";
        echo "</td>";
        echo "</tr>";

        foreach ($musicTable as $music) {
          echo "<tr>";
          echo "<td><a href='song.php?song_id={$music['song_id']}' class='button-primary'>{$music['title']}</a></td>";
          echo "<td> {$music['artist_name']} </td>";
          echo "<td> {$music['year']}</td>";
          echo "<td> {$music['popularity']}</td>";
          echo "<td><input type='checkbox' name='favourite_songs[]' value='{$music['song_id']}'></td>";
          echo "</button>";
          echo  "</tr>";
        }
        echo "<tr>";
        echo "<td align='center'><input type='submit' class='floating-button button button-primary' value='Add Selected to Favorites'></td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
      }

      ?>

    </div>
    <footer>
      <?php footer(); ?>
    </footer>
  </div>
</body>

</html>