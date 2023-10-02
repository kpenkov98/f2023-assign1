<?php
require_once 'config.php';

function getDB($connString, $user, $pass) {

    try{

        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    }catch(PDOException $e){
        die($e -> getMessage());
    }
}

$db = getDB($connString, $user, $pass);

//joins the tables and sorts music for browsing
function sorted_music_list($db) {

    try{
        $sql = "SELECT songs.title, artists.artist_name, songs.year, songs.popularity, songs.song_id
                FROM songs
                INNER JOIN artists ON songs.artist_id = artists.artist_id
                ORDER BY songs.popularity DESC";      
                
    $result = $db->query($sql);

    $music_table = $result->fetchAll(PDO::FETCH_ASSOC);

    return $music_table;

    } catch (PDOException $e) {

        die($e->getMessage());
    }

}



//search song with query passing and prepopulated drop down fields
//source for my search information https://owlcation.com/stem/Simple-search-PHP-MySQL
function search_song($sql) {

    $artistOption = [];
    $genreOption = [];

    $artistQuery = "SELECT artist_id, artist_name FROM artists ORDER BY artist_name ASC";
    $artistResult = $sql->query($artistQuery);

    if ($artistResult) {
        while ($row = $artistResult->fetch(PDO::FETCH_ASSOC)) {
            $artistOption[$row['artist_id']] = $row['artist_name'];
        }
    }

    $genreQuery = "SELECT genre_id, genre_name FROM genres ORDER BY genre_name ASC";
    $genreResult = $sql->query($genreQuery);

    if ($genreResult) {
    while ($row = $genreResult->fetch(PDO::FETCH_ASSOC)) {
        $genreOption[$row['id']] = $row['genre_name'];
        }
    }

    
  echo "<form action='browse.php' method='GET'>";
//title
  echo "<label for='title'>Title</label>";
  echo "<input type='text' id='title' name='title' placeholder='Enter title' value=''/>";

//artist prepopulation into options 
  echo "<label for='artist'>Artist</label>";
  echo "<select id='artist' name='artist'>";
  echo    "<option value=''>Select an artist</option>";
    foreach($artistOption as $artist_id => $artistName)
          echo  "<option value='$artist_id'></option>";
          if (isset($artistName) && $artistName == $artist_id) {
            echo " selected";
        }
        echo ">$artistName</option>";
//year
  echo "<label for='year'>Year</label>";
  echo "<input type='text' id='year' name='year' placeholder='Enter year'/>";

//genre prepopulation into options
  echo"<label for='genre'>Genre</label>";
  echo "<select id='genre' name='genre'>";
     
  echo "<option value=''>Select a genre</option>";
  echo "<option value='genre1'>Genre 1</option>";
  echo "<option value='genre2'>Genre 2</option>";    
  echo "</select>";

  echo "<input type='submit' value='Search'/>";
echo "</form>";

}



//show all songs in the database
function navigation_link() {}

//view single song by clicking a link
function single_song() {}

//add button to add a song to favorites, includes remove from favorites and remove all
function add_to_favorites() {}

//top genres based on song amount 
function top_genres() {}

//top artists based on song amount
function top_artists() {}

//top song based on popularity
function most_pop_song() {}

//artists with one song sorted by popularity
function one_hit_wonders() {}

//longest acoustic song based on Acousticness Value > 40 sorted by popularity
function long_acoustic() {}

//club songs with danceability of >80 (danceability * 1.6 + energy * 1.4, sorted by desc)
function club() {}

//songs to run to (bpm 120-125) (energy * 1.3 + valence * 1.6 sorted by desc)
function running_song() {}

//studying (bmp 100-115 AND speechiness 1-20) (acousticness * 0.8 + speechiness 100 + valence 100, sorted by desc)
function studying_song() {}

$pdo = null;
?>