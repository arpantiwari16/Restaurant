<?php
extract($_REQUEST);
if ($id == 1) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("insert into category(category) values(:category)");

    $st->bindParam(":category", $category);
    $st->execute();
    echo $pdo->lastInsertId();
}
if ($id == 2) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("update category set category=:category where id=:id");

    $st->bindParam(":category", $category);
    $st->bindParam(":id", $cat_id);
    $st->execute();
    echo $pdo->lastInsertId();
    echo "$cat_id";
}
if ($id == 3) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("delete from category where category=:cat");

    $st->bindParam(":cat", $cat);
    $st->execute();
    echo $pdo->lastInsertId();
    // echo "$cat_id";
}
