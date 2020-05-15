<?php

function getRecette($pdo, $title)
{
    $res = $pdo->prepare('SELECT * FROM recette WHERE title = :title');
    $res->execute(['title'=> $title]);
    return $res->fetch();
}

function deleteRecette($pdo, $title)
{
    $res = $pdo->prepare('DELETE FROM Recettes WHERE title = :title');
    $res->execute(['title'=> $title]);
}

function getRecettes()
{
    return [
        'Raviolle au Pesto',
        'Raviole carbonara',
        'Raviole 4 fromages',

    ];
}



?>