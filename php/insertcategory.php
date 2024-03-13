<?php
extract($_REQUEST);

$pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
$st = $pdo->prepare("insert into category(category) value(:cat)");

$st->bindParam(":cat", $cat);
$st->execute();
echo $pdo->lastInsertId();
