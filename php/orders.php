<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <!-- <script src="../js/restaurant.js"></script> -->
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/time.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

</head>

<script>
    $(document).ready(function() {

        $(function() {
            $("#lp_orders").css("backgroundColor", "#78C1F3");
            $("#lp_orders a").css("color", "white");

        });

        $(".anc").click(function() {
            var val = $(this).text();
            console.log(val);
            $.get("orders_ajax.php?task=1&table_no=" + val, function(response) {
                console.log(response);
                $(".tbody").html(response);

                if (response == "") {
                    $(".tbody").html("<tr><td class='text-center' colspan='3'>no orders!</td></tr>")
                }

            });

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
    <?php
    session_start();
    include "navbar.php";
    ?>
    <section>
        <div class="row">
            <div class="col-2  mt-3">
                <?php
                include "leftpanel.php";
                ?>
            </div>
            <div class="col-10 mt-4">
                <div class="center ">
                    <!-- <h6 class="mb-4 mt-3"><u>Orders</u></h6> -->
                </div>
                <div class="center w-75 mx-auto ">
                    <table id="order_table" class="table mx-auto mt-3 table-bordered  ">
                        <thead>
                            <th>s.no</th>
                            <th>table no.</th>
                            <th>status</th>
                            <!-- <th>
                                <span>select all </span> <input type="checkbox" name="all" id="all" class="form-check-input">

                            </th> -->
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $check = '';
                            $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");  //connection
                            $pdostm = $pdo->prepare("select * from order_details join menuitem on order_details.menuitem_id=menuitem.id");          //query we use prepare
                            // $pdostm1 = $pdo->prepare("select * from menuitem");          //query we use prepare
                            $pdostm->execute();                                                   //execute
                            // $pdostm1->execute();                                                   //execute

                            while ($r = $pdostm->fetch(PDO::FETCH_ASSOC)) {

                                echo "<tr><td>" . "$sno" . "<td><a data-bs-toggle='modal' data-bs-target='#exampleModal' class='anc' value='" . $r["table_no"] . "'>" . $r["table_no"]   . "</a><td>" . $r["status"];

                                $sno++;
                            }


                            ?>
                        </tbody>
                        <tfoot>
                            <td class="text-danger" colspan="4 ">* O-ordered , D-delivered</td>
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
                <h5 class="modal-title" id="exampleModalLabel">Orders</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-primary">
                    <thead>
                        <th>menuitem</th>
                        <th>qty</th>
                        <th>status</th>
                    </thead>
                    <tbody class="tbody">

                    </tbody>
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
        $('#order_table').DataTable();
    });
</script>