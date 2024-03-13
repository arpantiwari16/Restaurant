<?php
extract($_REQUEST);

$pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
$st = $pdo->prepare("delete from menu where id=:id");

$st->bindParam(":id", $id);
$st->execute();
echo $pdo->lastInsertId();
