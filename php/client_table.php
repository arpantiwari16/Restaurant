<?php
extract($_REQUEST);
if ($task == 1) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("select * from category join menu on menu.cat_id=category.id where cat_id=:id");
    $st->bindParam(":id", $category);
    $st->execute();
    while ($r = $st->fetch(PDO::FETCH_BOTH)) {

        echo '<li class="list-group-item ">' . '<a class="noline anchor" value="' . $r["id"] . '">' . $r["menu"] . '</a></li>';
    }
} else if ($task == 2) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("select * from menu join menuitem on menu.id=menuitem.menu_id where menuitem.menu_id=:id");
    $st->bindParam(":id", $menuid);
    $st->execute();
    while ($r = $st->fetch(PDO::FETCH_BOTH)) {

        // w-50 m-4 mt-2 cards1
        $str = '<div class="col-6  cards1 ">
                <div class="row">
                    <div class="col-8 d-grid">
                        <h4 class="p-2 card-title menuitem">' . $r["menuitem"] . '</h4>
                        <div class="d-flex">
                        <span class="ps-2 card-text  d-inline">for people:</span>
                        <span class="for_people">' . $r["for_people"] . '</span>
                        </div>
                        <div class="d-flex">
                        <span class="ps-2 d-inline">Rate:</span>
                        <span class="rate">' . $r["rate"] . '</span>
                        </div>
                        
                        <a href="#" class="order_btn btn-block btn btn-sm mb-2 btn-primary">Order</a>
                    </div>
                    <div class="col-4">
                        <img class="d-inline card-img-end pt-2 img" style="max-width: 48px; height: 48px;" src="../imgs/' . $r["picture"] . '" alt="Card image">
                    </div>
                </div>
</div>';

        echo "$str";
    }
} else if ($task == 3) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("insert into kitchen(menuitem,qty,table_number) values(:menuitem,:qty,:tno)");
    $st->bindParam(":menuitem", $menuitem);
    $st->bindParam(":qty", $qty);
    $st->bindParam(":tno", $tno);
    $st->execute();
    echo "succesfully inserted";
} else if ($task == 4) {
    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
    $st = $pdo->prepare("insert into ordermaster,order_details(menuitem,qty) values(:menuitem,:qty)");
    $st->bindParam(":menuitem", $menuitem);
    $st->bindParam(":qty", $qty);
    $st->execute();
    echo "succesfully inserted";
}
