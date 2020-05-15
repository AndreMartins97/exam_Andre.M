<?php
require_once 'pdo_connection.php';
?>
<html>
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
<body>
<h1>Page qui liste nos recettes</h1>
<h2>
    <h1>Nous Ravioles :</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">date</th>
            <th scope="col">image</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $reponse = $pdo->query('SELECT * FROM recette');
        while ($data = $reponse->fetch())
        {
            ?>
            <tr>
                <td><?php echo($data['title']); ?></td>
                <td><?php echo($data['description']); ?></td>
                <td><?php echo($data['date']); ?></td>
                <td><?php echo($data['image']); ?></td>
                <td>
                    <img style="max-width: 140px;" src="<?php echo('assets/img/'.$data['image']); ?>"
                         alt="Image de la planète <?php echo($data['image']); ?>"/>
                </td>
                <td></td>
                    <a title="Supprimer" href="delete.php?title=<?php echo($data['title']);?>">
                    </a>
                </td>


            </tr>
            <?php
        }
        $reponse->closeCursor();
        ?>

        </tbody>
    </table>
</h2>
</body>
</html>