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
            navigation();  ?>
        </header>
        <h3>
            <?php $songData = single_song($db); ?>
            <div class="song-info">
                <span class="info-label">Song Title:</span>
                <span class="info-value"><?php echo $songData['title']; ?></span>
            </div>
            <div class="song-info">
                <span class="info-label">Artist Name:</span>
                <span class="info-value"><?php echo $songData['artist_name']; ?></span>
            </div>
            <div class="song-info">
                <span class="info-label">Duration:</span>
                <span class="info-value"><?php echo $songData['minutes']; ?></span>
            </div>
            <div class="song-info">
                <span class="info-label">Genre:</span>
                <span class="info-value"><?php echo $songData['genre_name']; ?></span>
            </div>
            <div class="song-info">
                <span class="info-label">Type:</span>
                <span class="info-value"><?php echo $songData['type_name']; ?></span>
            </div>

        </h3>
        <footer>
            <?php footer(); ?>
        </footer>
    </div>
</body>

</html>