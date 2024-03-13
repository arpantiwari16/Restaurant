<?php
require "db_rest.php";
extract($_REQUEST);
$pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
if ($task == 1) {
    $st = $pdo->prepare("insert into menuitem(`menu_id`, `menuitem`, `description`, `for_people`, `rate`, `available`,picture)
 values(:menu_id,:menuitem,:description,:for_people,:rate,:available,:img)");

    $st->bindParam(":menu_id", $menu_id);
    $st->bindParam(":menuitem", $menuitem);
    $st->bindParam(":description", $description);
    $st->bindParam(":for_people", $for_people);
    $st->bindParam(":rate", $rate);
    $st->bindParam(":available", $available);
    $st->bindParam(":img", $picture);

    $st->execute();
    echo "succesfully inserted!";
} else if ($task == 2) {
    $st = $pdo->prepare("UPDATE `menuitem` 
    SET `menu_id` = :menuid,
        `menuitem` = :menuitem,
        `description` = :description,
        `for_people` = :for_people,
        `rate` = :rate,
        `available` = :available,
        `picture` = :img 
    WHERE `id` = :id;
    ");

    $st->bindParam(":id", $id);
    $st->bindParam(":menuid", $menu_id);
    $st->bindParam(":menuitem", $menuitem);
    $st->bindParam(":description", $description);
    $st->bindParam(":for_people", $for_people);
    $st->bindParam(":rate", $rate);
    $st->bindParam(":available", $available);
    $st->bindParam(":img", $picture);

    $st->execute();
    echo "succesfully updated!";
}
