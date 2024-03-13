<?php
extract($_REQUEST);
if ($id == 1) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("update menu set cat_id=:category, menu=:menu where id=:id");

    $st->bindParam(":category", $cat_id);
    $st->bindParam(":menu", $menu);
    $st->execute();
    echo $pdo->lastInsertId();
    echo "$cat_id";
}
if ($id == 2) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("insert into menu(cat_id,menu) values(:category,:menu)");

    $st->bindParam(":category", $cat_id);
    $st->bindParam(":menu", $menu);
    $st->execute();
    echo $pdo->lastInsertId();
}
// if ($id == 3) {
//     $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
//     $st = $pdo->prepare("delete from category where category=:cat");

//     $st->bindParam(":cat", $cat);
//     $st->execute();
//     echo $pdo->lastInsertId();
//     // echo "$cat_id";
// }
if ($id == 4) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("delete from menu where menu=:menu");

    // $st->bindParam(":category", $cat_id);
    $st->bindParam(":menu", $menu);
    $st->execute();
    echo $pdo->lastInsertId();
}
