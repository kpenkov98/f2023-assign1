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
        <?php music_header();
        navigation();
        ?>
    </header>

    <body>
        <?php
        add_to_favorites($db);

        ?>
    </body>
    <footer>
        <?php footer(); ?>
    </footer>

</body>

</html>