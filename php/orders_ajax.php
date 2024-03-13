<?php
extract($_REQUEST);
if ($task == 1) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("select * from table_details join order_details on table_details.table_no=order_details.table_no JOIN menuitem on order_details.menuitem_id=menuitem.id  where table_details.table_no=:table_no");


    $st->bindParam(":table_no", $table_no);
    $st->execute();

    while ($r = $st->fetch(PDO::FETCH_ASSOC)) {
        if ($r["status"] == "O") {
            $check = "checked";
        } else {
            $check = "";
        }
        if ($r["status"] == "D") {
            $check1 = "checked";
        } else {
            $check1 = "";
        }
        print_r($st);
        echo "<tr><td>" . $r["menuitem"] . "<td>" . $r["qty"] . "<td>" . $r["status"];
    }
}
