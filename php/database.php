<?php
require_once 'config.php';

function getDB($dataPath)
{
    try {
        $conn = new PDO('sqlite:' . $dataPath);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

$db = getDB($dataPath);

//joins the tables and sorts music for browsing
function sorted_music_list($db)
{

    try {
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
function search_song($db)
{

    $artistOption = [];
    $genreOption = [];

    $artistQuery = "SELECT artist_id, artist_name FROM artists ORDER BY artist_name ASC";
    $artistResult = $db->query($artistQuery);

    if ($artistResult) {
        while ($row = $artistResult->fetch(PDO::FETCH_ASSOC)) {
            $artistOption[$row['artist_id']] = $row['artist_name'];
        }
    }

    $genreQuery = "SELECT genre_id, genre_name FROM genres ORDER BY genre_name ASC";
    $genreResult = $db->query($genreQuery);

    if ($genreResult) {
        while ($row = $genreResult->fetch(PDO::FETCH_ASSOC)) {
            $genreOption[$row['genre_id']] = $row['genre_name'];
        }
    }


    echo "<form action='browse.php' method='GET'>";
    //title
    echo "<label for='title'>Title</label>";
    echo "<input type='text' id='title' name='title' placeholder='Enter title' value=''/>";

    //artist prepopulation into options 
    echo "<label for='artist'>Artist</label>";
    echo "<select id='artist' name='artist'>";
    echo    "<option value=''>Select an Artist</option>";
    foreach ($artistOption as $artist_id => $artist_name) {
        if (isset($artist_name) && $artist_name == $artist_id) {
            echo " selected";
        }
        echo "<option>$artist_name</option>";
    }

    //year
    echo "<label for='year'>Year</label>";
    echo "<input type='text' id='year' name='year' placeholder='Enter year'/>";

    //genre prepopulation into options
    echo "<label for='genre'>Genre</label>";
    echo "<select id='genre' name='genre'>";

    echo "<option value=''>Select a genre</option>";
    foreach ($genreOption as $genre_id => $genre_name) {
        if (isset($genre_name) && $genre_name == $genre_id) {
            echo " selected";
        }
        echo "<option>$genre_name</option>";
    }
    echo "<input type='submit' value='Search'/>";
    echo "</form>";
}

//view single song by clicking a link
function single_song($db)
{
    if (isset($_GET['song_id'])) {

        $song_id = $_GET['song_id'];

        $songQuery =
            "SELECT songs.song_id, songs.title, artists.artist_name, 
            genres.genre_name, types.type_name, 
            CAST(songs.duration / 60 AS INTEGER) || 'm' || ':' || ROUND(songs.duration % 60) || 's' AS minutes
        FROM songs
        INNER JOIN artists ON songs.artist_id = artists.artist_id
        INNER JOIN genres ON songs.genre_id = genres.genre_id
        INNER JOIN types ON artists.artist_type_id = types.type_id
        WHERE songs.song_id = '$song_id'";

        $songResult = $db->query($songQuery);

        $singleSong = $songResult->fetchAll(PDO::FETCH_ASSOC);

        $songData = $singleSong[0];

        if ($songData) {

            return $songData;
        } else {
            echo "Song not found";
        }
    }
}


//add songs to favourites
function add_to_favourites($db)
{
    if (isset($_POST['favourite_songs'])) {
        $song_id_array = $_POST['favourite_songs'];

        //check $song_id_array is an array
        if (!is_array($song_id_array)) {
            $song_id_array = [$song_id_array];
        }

        //check if any favourites in the list
        $favourite_songs = $_SESSION['favourite_songs'] ?? [];

        foreach ($song_id_array as $song_id) {
            //add songs to the list
            if (!in_array($song_id, $favourite_songs)) {
                $favourite_songs[] = $song_id;
            }
        }

        //store favourites in the session
        $_SESSION['favourite_songs'] = $favourite_songs;
    }
}

//display favourite songs
function display_favourites($db)
{
    if (!empty($_SESSION['favourite_songs'])) {
        $song_ids = $_SESSION['favourite_songs'];
        $song_ids = implode(',', $_SESSION['favourite_songs']);
        $favourite_query = "SELECT songs.song_id, songs.title, artists.artist_name
                  FROM songs
                  INNER JOIN artists ON songs.artist_id = artists.artist_id
                  WHERE songs.song_id IN ($song_ids)";

        $favourite_result = $db->prepare($favourite_query);
        $favourite_result->execute();

        $favourite_songs = $favourite_result->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($favourite_songs)) {
            foreach ($favourite_songs as $songData) {
                echo "<bold>Song Title:</bold> " . $songData['title'];
                echo " <bold>Artist Name:</bold> " . $songData['artist_name'];
                echo "<br>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='remove_song_id' value='" . $songData['song_id'] . "'>";
                echo "<input type='submit' name='remove_from_favourites' value='Remove from Favourites'>";
                echo "</form>";
                echo "<br>";
            }
        }

        //remove song
        if (isset($_POST['remove_song_id'])) {
            $song_id_to_remove = $_POST['remove_song_id'];
            //search array and remove the song from the list
            if (($key = array_search($song_id_to_remove, $_SESSION['favourite_songs'])) !== false) {
                unset($_SESSION['favourite_songs'][$key]);
            }
            //reload page on button press
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
    } else {
        echo "No Songs Selected";
    }
}

//top genres based on song amount 
function top_genres($db)
{
    $genreQuery =
        "SELECT genres.genre_name, COUNT(songs.song_id) as song_count
    FROM genres
    INNER JOIN songs ON genres.genre_id = songs.genre_id
    GROUP BY genres.genre_name
    ORDER BY song_count DESC
    LIMIT 10";

    $genreResult = $db->query($genreQuery);

    $top_genre = $genreResult->fetchAll(PDO::FETCH_ASSOC);

    foreach ($top_genre as $genre_name) {

        echo "<li>";
        echo $genre_name['genre_name'];
        echo "</li>";
    }
}

//top artists based on song amount
function top_artists($db)
{
    $artistQuery =
        "SELECT artists.artist_name, COUNT(songs.song_id) as song_count
    FROM artists
    INNER JOIN songs ON artists.artist_id = songs.artist_id
    GROUP BY artists.artist_name
    ORDER BY song_count DESC
    LIMIT 10";

    $artistResult = $db->query($artistQuery);

    $top_artist = $artistResult->fetchAll(PDO::FETCH_ASSOC);

    foreach ($top_artist as $artist_name) {

        echo "<li>";
        echo $artist_name['artist_name'];
        echo "</li>";
    }
}

//top song based on popularity
function most_pop_songs($db)
{
    $topsongQuery =
        "SELECT songs.title, artists.artist_name, songs.song_id
    FROM songs
    INNER JOIN artists ON songs.artist_id = artists.artist_id
    ORDER BY songs.popularity DESC
    LIMIT 10";

    $topsongResult = $db->query($topsongQuery);

    $top_song = $topsongResult->fetchAll(PDO::FETCH_ASSOC);

    foreach ($top_song as $song_name) {

        echo "<li><a href='song.php?song_id={$song_name['song_id']}' class='button-primary'>{$song_name['title']} by {$song_name['artist_name']}</a></li>";
    }
}


//artists with one song sorted by popularity
function one_hit_wonders($db)
{
    $onehitQuery =
        "SELECT songs.title, artists.artist_name, songs.song_id
    FROM songs
    INNER JOIN artists ON songs.artist_id = artists.artist_id
    GROUP BY artists.artist_id
    HAVING COUNT(songs.song_id) = 1
    ORDER BY songs.popularity DESC
    LIMIT 10";

    $onehitResult = $db->query($onehitQuery);

    $onehit = $onehitResult->fetchAll(PDO::FETCH_ASSOC);

    foreach ($onehit as $song_name) {

        echo "<li><a href='song.php?song_id={$song_name['song_id']}' class='button-primary'>{$song_name['title']} by {$song_name['artist_name']}</a></li>";
    }
}


//longest acoustic song based on Acousticness Value > 40 sorted by duration
function long_acoustic($db)
{

    $acousticQuery =
        "SELECT songs.title, artists.artist_name, songs.song_id
    FROM songs
    INNER JOIN artists ON songs.artist_id = artists.artist_id
    WHERE songs.acousticness > 40
    GROUP BY songs.title
    ORDER BY songs.duration DESC
    LIMIT 10";

    $acousticResult = $db->query($acousticQuery);

    $acoustic = $acousticResult->fetchAll(PDO::FETCH_ASSOC);

    foreach ($acoustic as $song_name) {

        echo "<li><a href='song.php?song_id={$song_name['song_id']}' class='button-primary'>{$song_name['title']} by {$song_name['artist_name']}</a></li>";
    }
}

//club songs with danceability of >80 (danceability * 1.6 + energy * 1.4, sorted by desc)
function club($db)
{

    $clubQuery = "SELECT songs.title, artists.artist_name, ((songs.danceability * 1.6) + (songs.energy * 1.4)) AS suit, songs.song_id
    FROM songs
    INNER JOIN artists ON songs.artist_id = artists.artist_id
    WHERE songs.danceability > 80 
    GROUP BY songs.title
    ORDER BY suit DESC
    LIMIT 10";

    $clubResult = $db->query($clubQuery);

    $club = $clubResult->fetchAll(PDO::FETCH_ASSOC);

    foreach ($club as $song_name) {

        echo "<li><a href='song.php?song_id={$song_name['song_id']}' class='button-primary'>{$song_name['title']} by {$song_name['artist_name']}</a></li>";
    }
}

//songs to run to (bpm 120-125) (energy * 1.3 + valence * 1.6 sorted by desc)
function running_song($db)
{
    $runningQuery = "SELECT songs.title, artists.artist_name, ((songs.energy * 1.3) + (songs.valence * 1.6)) AS suit, songs.song_id
    FROM songs
    INNER JOIN artists ON songs.artist_id = artists.artist_id
    WHERE songs.bpm BETWEEN 120 AND 125 
    GROUP BY songs.title
    ORDER BY suit DESC
    LIMIT 10";

    $runningResult = $db->query($runningQuery);

    $running = $runningResult->fetchAll(PDO::FETCH_ASSOC);

    foreach ($running as $song_name) {

        echo "<li><a href='song.php?song_id={$song_name['song_id']}' class='button-primary'>{$song_name['title']} by {$song_name['artist_name']}</a></li>";
    }
}

//studying (bmp 100-115 AND speechiness 1-20) (acousticness * 0.8 + speechiness 100 + valence 100, sorted by desc)
function studying_song($db)
{
    $studyingQuery = "SELECT songs.title, artists.artist_name, ((songs.acousticness * 0.3) + (100 - songs.speechiness) + (100 - songs.valence)) AS suit, songs.song_id
    FROM songs
    INNER JOIN artists ON songs.artist_id = artists.artist_id
    WHERE songs.bpm BETWEEN 100 AND 115 AND songs.speechiness BETWEEN 1 AND 20 
    GROUP BY songs.title
    ORDER BY suit DESC
    LIMIT 10";

    $studyingResult = $db->query($studyingQuery);

    $studying = $studyingResult->fetchAll(PDO::FETCH_ASSOC);

    foreach ($studying as $song_name) {

        echo "<li><a href='song.php?song_id={$song_name['song_id']}' class='button-primary'>{$song_name['title']} by {$song_name['artist_name']}</a></li>";
    }
}

$pdo = null;
