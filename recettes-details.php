<?php
require_once 'pdo_connection.php';
require_once 'functions.php';
?>
<html>
<head>
    <head>
        <?php
        require_once 'stylesheets.php';
        ?>
    </head>
</head>
<body>

    <?php
    include 'nav.php';
    ?>

    <div style="text-align: center">
    <?php
    $res = $pdo->prepare('SELECT * FROM recettes WHERE id = :id');
    $res->execute(['title'=> $_GET['title']]);
    $fetchRes = $res->fetch();
    ?>

        <h1><?php echo($fetchRes['name']) ?></h1><br>
        <img  src="<?php echo('assets/img/'.$fetchRes['image']); ?>"
              alt="Image du Raviole <?php echo($fetchRes['name']); ?>" > <br>
        <h2><u>Recettes : </u> <?php echo($fetchRes['recette']) ?></h2>
        <div><u>Key facts : </u> <?php echo($fetchRes['key_fact']) ?></div>
        <?php $res->closeCursor(); ?>
    </div>
</body>
</html>
