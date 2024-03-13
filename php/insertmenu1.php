<?php
extract($_REQUEST);
echo "$cat_id" . "$menu_i";
$pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
$st = $pdo->prepare("insert into menu(cat_id,menu) value(:cat_id,:menu)");

$st->bindParam(":cat_id", $cat_id);
$st->bindParam(":menu", $menu_i);
$st->execute();
echo $pdo->lastInsertId();
