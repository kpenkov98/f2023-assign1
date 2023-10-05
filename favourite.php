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
            navigation();
            ?>
        </header>
        <div class="row">
            <?php
            add_to_favorites($db); ?>
        </div>
        <footer>
            <?php footer(); ?>
        </footer>
    </div>
</body>

</html>