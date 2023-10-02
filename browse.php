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
<header>
    <?php music_header(); navigation();?>
</header>
<div>
<table align="center" border="1" cellpadding ="3" cellspacing = "0">
<tr>
  <td><h5 align="center">Title</h5></td>
  <td><h5 align="center">Artist</h5></td>
  <td><h5 align="center">Year</h5></td>
  <td><h5 align="center">Popularity</h5></td>
</tr>
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
	// you can set minimum length of the query if you want
	
	if(strlen($title || $artist || $year || $genre) >= $min_length){ // if query length is more or equal minimum length then
		
		$title = htmlspecialchars($title); 
    $artist = htmlspecialchars($artist);
    $year = htmlspecialchars($year);
    $genre = htmlspecialchars($genre);
		// changes characters used in html to their equivalents, for example: < to &gt;
		
    $searchQuery = 
                "SELECT songs.song_id, songs.title, artists.artist_name, songs.year, genres.genre_name
                FROM songs
                INNER JOIN artists ON songs.artist_id = artists.artist_id
                INNER JOIN genres ON songs.genre_id = genres.genre_id
                WHERE (songs.title LIKE '%".$title."%') OR (artists.artist_name LIKE '%".$artist."%') OR (songs.year LIKE '%".$year."%') OR (genres.genre_name LIKE '%".$genre."%')
                ORDER BY songs.popularity DESC";

    $searchResult = $db -> prepare($searchQuery);
    $searchResult -> execute();    
	
    $searchDB = $searchResult->fetchAll(PDO::FETCH_ASSOC);
		
		if(count($searchDB) > 0){ // if one or more rows are returned do following
			

      foreach ($searchDB as $music) {
        echo "<tr>";
        echo "<td><a href='song.php?song_id={$music['song_id']}' class='button-primary'>{$music['title']}</a></td>";
        echo "<td>{$music['artist_name']}</td>";
        echo "<td>{$music['year']}</td>";
        echo "<td>{$music['genre_name']}</td>";
        echo "</tr>";
      }
			
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}
		
	}
} 

elseif (!isset($_GET['title']) || !isset($_GET['artist']) || !isset($_GET['year']) || !isset($_GET['genre'])){

  foreach ($musicTable as $music) {
  echo "<tr>";
  echo "<td><a href='song.php?song_id={$music['song_id']}' class='button-primary'>{$music['title']}</a></td>";

  echo "<td>  {$music['artist_name']} </td>";
  echo "<td> {$music['year']}</td>";
  echo "<td> {$music['popularity']}</td>";
  echo "</button>";
  echo  "</tr>";
  }
}

?>
</table>
</div>
<footer>
  <?php footer(); ?>
</footer>
</body>
</html>