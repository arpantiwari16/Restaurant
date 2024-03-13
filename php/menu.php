<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="../js/restaurant.js"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/time.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">



</head>
<script>
    $(document).ready(function() {

        $(function() {
            $("#lp_menu").css("backgroundColor", "#78C1F3");
            $("#lp_menu a").css("color", "white");

        });


        $("#all").click(function() {
            if ($("#all").prop("checked") == true)
                $(".cb1").prop("checked", true);
            else {
                $(".cb1").prop("checked", false);

            }
        });
        $(".anc").click(function() {
            $("#menu_i").val($(this).attr("value"));
            $("#catid").val($(this).attr("id"));
        });
        // $("#model_save").click(function() {
        //     var menu = $("#menu_i").val();
        //     var cat_id = $("#cat_id").val();
        //     var menuid = $("#menuid").val();
        //     // console.log(c);
        //     $.get("save_menu.php?id=1" + "&menu=" + menu + "&cat_id" + cat_id, function(response) {
        //         console.log(response);
        //     });
        // });

        $("#model_save").click(function() {
            var menu = $("#menu_i").val();
            var cat_id = $("#cat_id").val();
            console.log(cat_id);
            // var menuid = $("#menuid").val();
            // console.log(c);
            $.get("save_menu.php?id=2" + "&menu=" + menu + "&cat_id=" + cat_id, function(response) {
                console.log(response);
            });
        });
        $("#delete").click(function() {
            console.log($(".cb1:checked").val());
            console.log($(".cb1:checked").attr("id"));
            var checked = $(".cb1:checked").attr("id");


        });

    });
</script>

<body class="  mx-auto">
    <nav class="navbar navbar-primary">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand ms-4 " href="adminpanel.php">
                    <img src="../imgs/user-gear.png" class="mb-2" width="30" height="30" alt="Logo">
                    <h4 class="d-inline text-dark ">Admin Panel</h4>
                </a>
            </div>

            <ul class="nav d-inline navbar-nav navbar-right me-5">
                <li class="d-inline me-5 ">


                </li>
                <li class=" d-inline ">
                    <a class="mx-5" id="" href="#">
                        <?php

                        session_start();
                        $cart = $_SESSION["ename"];
                        echo "$cart";
                        ?>
                    </a>
                    <span class="">time:</span>
                    <span class="text-uppercase me-2 time"></span>
                    <!-- <span class="time">Time:</span> -->
                </li>
                <li class="  logout btn btn-sm btn-danger" onclick="  window.location.assign('login.php')">logout</li>
            </ul>
        </div>
    </nav>




    <section>
        <div class="row">
            <div class="col-2 mt-3">
                <?php
                include "leftpanel.php";
                ?>
            </div>
            <div class="col-10 mt-4">
                <div class="mt-3">
                    <!-- <h6 class="mb-4"><u>Menu</u></h6> -->
                </div>
                <div class="w-75 mx-auto">
                    <table id="example" class="table mx-auto mt-3 table-bordered  ">
                        <thead>
                            <th>s.no</th>
                            <th>category</th>
                            <!-- <th>id</th> -->
                            <th>menu</th>
                            <th>
                                <span>select all </span> <input type="checkbox" name="all" id="all" class="form-check-input">

                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $check = '';
                            $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");  //connection
                            $pdostm = $pdo->prepare("select *, menu.id as id1  from menu join category on category.id=menu.cat_id");          //query we use prepare
                            // $pdostm1 = $pdo->prepare("select * from category");          //query we use prepare
                            $pdostm->execute();                                                   //execute
                            // $pdostm1->execute();                                                   //execute

                            while ($r = $pdostm->fetch(PDO::FETCH_ASSOC)) {                       //fetch
                                // $r1 = $pdostm1->fetch(PDO::FETCH_ASSOC);
                                echo "<tr><td>" . "$sno" . "<td>" . '<a class="anc" href="" value="' . $r["menu"] . '" data-bs-toggle="modal" data-bs-target="#exampleModal"  >' . $r["category"] . '</a>'  .
                                    "<td>" . $r["menu"] . "<td>" . '<input type="checkbox" name="cb[]" value="' . $r["menu"] . '" id="' . $r["cat_id"] . '" class="form-check-input cb1">';
                                $sno++;
                            }


                            ?>
                        </tbody>
                        <tfoot>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="button" value="delete" id="delete" class="btn btn-sm btn-danger">
                                <input type="button" value="new" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="btn btn-sm btn-primary ms-3">
                            </td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </section>

</body>

</html>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">update menu</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-primary">
                    <tr>
                        <td>category id</td>
                        <td><select name="cat_id" class="form-select d-inline w-50" id="cat_id">
                                <?php
                                require_once "db_rest.php";
                                $rs = categoryall();
                                while ($r = mysqli_fetch_array($rs)) {
                                    echo "<option class='opt' value='" . $r[0] . "'>" . $r[1] . "</option>";
                                }
                                ?>
                            </select></select></td>
                    </tr>
                    <tr>
                        <td>menu</td>
                        <td><input type="text" class="form-control" id="menu_i" placeholder="enter menu"><input type="text" class="form-control" hidden value="" id="menuid" placeholder="enter menu"></td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="button" id="model_save" value="save" class="btn btn-primary">
                        </td>
                    </tr>

                </table>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">new menu</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-primary">
                    <tr>
                        <td>category id</td>
                        <td><select name="cat_id" class="form-select d-inline w-50" id="cat_id1">
                                <?php
                                require_once "db_rest.php";
                                $rs = categoryall();
                                while ($r = mysqli_fetch_array($rs)) {
                                    echo "<option class='opt' value='" . $r[0] . "'>" . $r[1] . "</option>";
                                }
                                ?>
                            </select></select></td>
                    </tr>
                    <tr>
                        <td>menu</td>
                        <td><input type="text" class="form-control" id="menu_i1" placeholder="enter menu"><input type="text" class="form-control" hidden value="" id="menuid" placeholder="enter menu"></td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="button" id="model1_save" value="save" class="btn btn-primary">
                        </td>
                    </tr>

                </table>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>