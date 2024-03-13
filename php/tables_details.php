<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/time.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

</head>

<script>
    $(document).ready(function() {

        $(function() {
            $("#lp_tables").css("backgroundColor", "#78C1F3");
            $("#lp_tables a").css("color", "white");

        });

        $(".anc").click(function() {
            var val = $(this).html();
            // console.log(val);
            $.get("table_details_ajax.php?task=4&table_no=" + val, function(response) {
                console.log(response);
                $(".tbody").html(response);

                if (response == "") {
                    $(".tbody").html("<tr><td class='text-center' colspan='3'>no orders!</td></tr>")
                }

            });

        });
        $("#new_table").click(function() {
            var tablecapacity = $("#t_c").val();
            var description = $("#desc").val();
            var status = $(".cb:checked").val();
            console.log(description);
            $.get("table_details_ajax.php?task=1&tablecapacity=" + tablecapacity + "&description=" + description + "&status=" + status, function(response) {
                console.log(response);
                if (response == 1) {
                    alert("succesfully inserted");
                }
            })
        });






        $("#update_table").click(function() {
            var table_capacity = $("#tc_u").val();
            var description = $("#desc_u").val();
            var status = $(".cb_u:checked").val();
            var id = $("#id").val();
            // console.log(table_capacity, description, status, id);
            $.get("table_details_ajax.php?task=2&tablecapacity=" + table_capacity + "&description=" + description + "&status=" + status + "&id=" + id, function(response) {
                console.log(response);
            });
        });

        $("#all").click(function() {
            if ($("#all").prop("checked") == 1)
                $(".cb1").prop("checked", true);
            else {
                $(".cb1").prop("checked", false);

            }
        });


        $("#delete").click(function() {
            var a = $(".cb1");
            a = Array.from(a);
            a.forEach(v => {
                if (v.checked) {
                    console.log(v.value);
                }
            })
            var checked = $(".cb1:checked").val();


        });
        $(".cb2").prop("disabled", true);



    });
</script>

<body class="  mx-auto">
    <?php
    session_start();
    include "navbar.php";
    ?>
    <section>
        <div class="row">
            <div class="col-2 mt-3">
                <?php
                include "leftpanel.php";
                ?>
            </div>
            <div class="col-10 mt-4">
                <div class="center">
                    <!-- <h6 class="mb-4 mt-3"><u>Table Details</u></h6> -->
                </div>
                <div class=" w-75 mx-auto ">
                    <table id="table_details_table" class="table mx-auto mt-3 table-bordered  ">
                        <thead>
                            <th>s.no</th>
                            <!-- <th>id</th> -->
                            <th>table number</th>
                            <th>table_capacity</th>
                            <th>description</th>
                            <th>A/O</th>
                            <th>
                                <span>select all </span> <input type="checkbox" name="all" id="all" class="form-check-input">

                            </th>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $check = '';
                            $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");  //connection
                            $pdostm = $pdo->prepare("select * from table_details");          //query we use prepare
                            $pdostm1 = $pdo->prepare("select * from category");          //query we use prepare
                            $pdostm->execute();                                                   //execute
                            $pdostm1->execute();                                                   //execute

                            while ($r = $pdostm->fetch(PDO::FETCH_ASSOC)) {                       //fetch
                                $a = $r["status"];
                                if ($a == 'O') {
                                    $checked = "checked";
                                } else {
                                    $checked = '';
                                }


                                echo "<tr><td>" . "$sno" .
                                    "<td>" . $r["table_no"] . "<td>" . $r["table_capacity"] .  "<td>" . $r["description"] .
                                    "<td>" .
                                    '<input type="checkbox" name=""  value="' . $r["status"] . '" id="' . $r["id"] . '" class="form-check-input cb2" ' . $checked  . '>' .

                                    "<td>" . '<input type="checkbox" name="cb[]" value="' . $r["id"] . '" id="' . $r["id"] . '" class="form-check-input cb1">';
                                $sno++;
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <td colspan="6" class="text-end">
                                <input type="button" value="delete" id="delete" class="btn btn-sm btn-danger">
                                <input type="button" value="new" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="btn btn-sm btn-primary ms-2">
                            </td>
                            <tr>
                                <td colspan="6">
                                    <p class=" text-danger">* checked-occupied </p>

                                </td>

                            </tr>
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

<!-- modal 2 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">new table details</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-primary">
                    <thead>
                        <tr>
                            <td>table capacity</td>
                            <td><input type="number" id="t_c" placeholder="table capacity" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>description</td>
                            <td><input type="text" id="desc" placeholder="table capacity" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>
                                <input type="radio" id="available" name="status" class="form-check-input cb" value="A"><span class="ms-1">available</span>
                                <input type="radio" id="occupied" name="status" class="form-check-input cb" value="O"><span class="ms-1">occupied</span>
                            </td>

                        </tr>
                    </thead>
                    <tfoot>
                        <td colspan="3">
                            <input type="button" value="save" id="new_table" class="btn btn-outline-primary text-end  btn-sm">
                        </td>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table_details_table').DataTable();
    });
</script>















<!-- "<td>" . -->
<!-- '<a class="anc" href="" value="' . $r["id"] . '" data-bs-toggle="modal" data-bs-target="#exampleModal"  >' . $r["id"] . '</a>' -->