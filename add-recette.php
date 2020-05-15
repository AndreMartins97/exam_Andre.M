<?php
require_once 'pdo_connections.php';
require_once 'functions.php';
$errors = [];
$imageUrl = null;
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validateForm();
    $errors = $returnValidation['errors'];

    if( count($errors) === 0) {
        addBdd($pdo, $returnValidation['image']);
        header('Location: list-recettes.php');
    }
}
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

    <h1>Ajouter une recette</h1><br>

    <form method="post" action="add-planet.php" enctype="multipart/form-data">
        <label>title</label>
        <input name="ttle" class="form-control" placeholder="title">
        <label>description</label>
        <input name="description" class="form-control" placeholder="description" >
        <label>data</label>
        <select name="data" class="form-control" placeholder="data" >
            <?php
                foreach (getRecettes() as $recette) {
                    echo('<option value="'.$recette.'">'.$recette.'</option>');
                }
            ?>
        </select>
        <label>Key facts</label>
        <textarea name="key_fact" class="form-control" placeholder="Key facts" ></textarea><br>
        <label>Image</label>
        <input type="file" name="image"><br><br>

        <input type="submit">

        <?php
            if(count($errors) != 0){
                echo(' <h2>Erreurs lors de la dernière soumission du formulaire : </h2>');
                foreach ($errors as $error){
                    echo('<div class="error">'.$error.'</div>');
                }
            }
        ?>
    </form>
</div>
</body>
</html>
