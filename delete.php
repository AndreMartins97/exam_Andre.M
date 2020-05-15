<?php
require_once 'pdo_connection.php';
require_once 'functions.php';
$title = $_GET['title'];
deleteRecette($pdo, $title);
header('Location: index.php');
?>