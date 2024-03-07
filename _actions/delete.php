<?php 

require '../config/config.php';

$statement = $pdo->prepare("DELETE FROM todolist WHERE id=".$_GET['id']);
$statement->execute();

header("location: ../index.php");