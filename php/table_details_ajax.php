<?php
extract($_REQUEST);

// echo "$tablecapacity,$description,$status";
if ($task == 1) {
     $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
     $st = $pdo->prepare("insert into table_details(table_capacity,description,status)
     values(:table_capacity,:description,:status)");

     $st->bindParam(":table_capacity", $tablecapacity);
     $st->bindParam(":description", $description);
     $st->bindParam(":status", $status);
     $st->execute();
     echo $pdo->lastInsertId();
} else if ($task == 2) {
     $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
     $st = $pdo->prepare("update table_details set table_capacity=:table_capacity,description=:description,status=:status where id=:id");

     $st->bindParam(":table_capacity", $tablecapacity);
     $st->bindParam(":description", $description);
     $st->bindParam(":status", $status);
     $st->bindParam(":id", $id);
     $st->execute();
     echo $pdo->lastInsertId();
     echo "$task";
} else if ($task == 3) {
     $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
     $st = $pdo->prepare("delete from table_details where id=:id");


     $st->bindParam(":id", $checked);
     $st->execute();
     echo $pdo->lastInsertId();
     echo "$task";
} else if ($task == 4) {
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
          echo "<tr><td>" . $r["menuitem"] . "<td>" . $r["qty"] . "<td>" .
               '<input type="checkbox" name="" value="' . $r["status"] . '" disabled id="" class="form-check-input "' . $check . '/> O'
               . '<input type="checkbox" name="" value="' . $r["status"] . '" disabled id="" class="ms-2 form-check-input "' . $check1 . '/> D';
     }
}
