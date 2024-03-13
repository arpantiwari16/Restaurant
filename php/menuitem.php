<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

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
    <!-- <script src="../js/menuitem.js"></script> -->
</head>
<script>
    $(document).ready(function() {
        $(function() {
            $("#lp_menuitem").css("backgroundColor", "#78C1F3");
            $("#lp_menuitem a").css("color", "white");

        });

        $("#new_item").on("click", function() {
            if ($("#available_n").prop("checked") == true) {
                $("#available_n").val("yes");
            } else {
                $("#available_n").val("no");

            }
            // var sno = $(this).parent.siblings().eq(0).text();
            var menu_id = $("#menu_id_n").val();
            var menuitem = $("#menu_item_n").val();
            var description = $("#description_n").val();
            var for_people = $("#forpeople_n").val();
            var rate = $("#rate_n").val();
            var available = $("#available_n").val();
            var img = $("#img_n").val();
            // console.log(sno);

            $.get("insertmenu.php?task=1&menu_id=" + menu_id + "&menuitem=" + menuitem + "&description=" +
                description + "&for_people=" + for_people + "&rate=" + rate +
                "&available=" + available + "&picture=" + "img",
                function(response) {
                    alert(response);
                });
            var str = "<tr><td>" + menu_id;
            $("#tbody").append(str);
        });

        $("#update").on("click", function() {
            if ($("#available_n").prop("checked") == true) {
                $("#available_n").val("yes");
            } else {
                $("#available_n").val("no");

            }

            var id = $("#id").val();
            var menu = $("#menu").val();
            var menu_id = $("#menu_id").val();
            var menuitem = $("#menuitem").val();
            var description = $("#description").val();
            var for_people = $("#forpeople").val();
            var rate = $("#rate").val();
            var available = $("#available").val();
            var img = $("#img").val();
            // console.log(id);

            $.get("insertmenu.php?task=2&menu_id=" + menu_id + "&menuitem=" + menuitem + "&description=" +
                description + "&for_people=" + for_people + "&rate=" + rate +
                "&available=" + available + "&picture=" + "img" + "&id=" + id,
                function(response) {
                    alert(response);
                });
        });


        $(".anc").on("click", function() {
            var id = $(this).attr("value");
            var menu_item = $(this).text();
            var description = $(this).parent().next().text();
            var for_people = $(this).parent().next().next().text();
            var rate = $(this).parent().next().next().next().text();
            var available = $(this).parent().next().next().next().next().text();
            var menu = $(this).parent().siblings().eq(1).text();
            console.log(menu);
            // console.log(picture);

            $("#menuitem").val(menu_item);
            $("#description").val(description);
            $("#forpeople").val(for_people);
            $("#rate").val(rate);
            $("#available").val(available);
            $("#id").val(id);
            $("#menu_id").append('<option selected class="opt" value=' + id + '>' + menu + '</option>');


        });

        // $("#save_menu").on("click", function() {
        //     var category_id = $("#category_id").val();
        //     var menu_insert = $("#menu_insert").val();
        //     console.log(menu_insert);
        //     $.get("insertmenu1.php?cat_id=" + category_id + "&menu_i=" + menu_insert,
        //         function(response) {
        //             console.log(response);
        //         });
        // });
        // $("#new_category").on("click", function() {
        //     console.log("working");
        //     $("#cat_insert").css("display", "inline-block");
        //     $("#save_category").show();
        // });

        // $("#save_category").on("click", function() {
        //     var cat_i = $("#cat_insert").val();
        //     $.get("insertcategory.php?cat=" + cat_i, function(response) {
        //         console.log(response);
        //     });
        // });
    })
</script>

<body class="  mx-auto">
    <?php
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
                    <!-- <h6 class="mb-4 mt-3"><u>menuitem</u></h6> -->
                </div>
                <div class="ms-5 w-75  ">
                    <table id="menu_table" class="w-75 table mt-3 table-bordered  ">
                        <thead>
                            <th>s.no</th>
                            <th>menu</th>
                            <th>menuitem</th>
                            <th>description</th>
                            <th>forPeople</th>
                            <th>rate</th>
                            <th>available</th>
                            <th>picture</th>
                            <th>
                                <span>select all </span> <input type="checkbox" name="all" id="all" class="form-check-input">

                            </th>
                        </thead>
                        <tbody id="tbody">
                            <?php
                            $sno = 1;
                            $check = '';
                            $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
                            $pdostm = $pdo->prepare("select * ,menuitem.id as id_menuitem from menuitem join menu on menu.id=menuitem.menu_id;");          //query we use prepare
                            $pdostm->execute();

                            while ($r = $pdostm->fetch(PDO::FETCH_ASSOC)) {

                                echo "<tr><td>" . "$sno" . "<td>" . $r["menu"] . "<td><a data-bs-toggle='modal' data-bs-target='#exampleModal1' id='a' class='anc' value='" . $r["id_menuitem"] . "' />" . $r["menuitem"] . "</a><td>"
                                    . $r["description"] . "<td>" . $r["for_people"] . "<td class='rate'>" . $r["rate"] . "<td>"
                                    . $r["available"] . "<td>" . "<img height='25px' width='25px' src='../imgs/" . $r["picture"] . "'>" .
                                    "<td>" . '<input type="checkbox" name="cb[]" value="" id="" class="form-check-input cb1">';
                                $sno++;
                            }


                            ?>
                        </tbody>
                        <tfoot>

                            <td colspan="9" class="text-end me-5"><input type="button" value="delete" id="delete" class="btn btn-sm btn-danger">
                                <input type="button" value="new" id="newmenu_item" data-bs-toggle="modal" data-bs-target="#new_model" class="btn btn-sm btn-primary ms-3" />
                                <input type="text" id="id" hidden><input type="text" hidden name="" id="menu">
                            </td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </section>

</body>

</html>

<!-- new menuitem -->
<div class="modal fade" id="new_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">new menu item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="table-responsive">
                        <table class="table mx-auto mt-3 table-bordered ">
                            <tr>
                                <td>menu id</td>
                                <td>
                                    <select name="menu_id" class="form-select d-inline w-50" id="menu_id_n">
                                        <?php
                                        require_once "db_rest.php";
                                        $rs = menuall();
                                        while ($r = mysqli_fetch_array($rs)) {
                                            echo "<option class='opt' value='" . $r[1] . "'>" . $r[2] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <!-- <a name="new" id="new" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" value="new">New</a> -->
                                </td>


                            </tr>
                            <tr>
                                <td>menu item</td>
                                <td>
                                    <input type="text" id="menu_item_n" class="form-control" placeholder="menu item">
                                </td>
                            </tr>
                            <tr>
                                <td>description</td>
                                <td>
                                    <textarea class="form-control" placeholder="enter description" name="description" id="description_n" cols="15" rows="1"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>for number of people</td>
                                <td>
                                    <input type="number" class="form-control" min="1" max="6" name="forpeople" id="forpeople_n">
                                </td>
                            </tr>
                            <tr>
                                <td>rate:</td>
                                <td>
                                    <input type="number" class="form-control" min="50" max="300" name="rate" id="rate_n">
                                </td>
                            </tr>
                            <tr>
                                <td>available:</td>
                                <td>
                                    <input type="checkbox" class="form-check-input" name="available" id="available_n">
                                </td>
                            </tr>
                            <tr>
                                <td>image:</td>
                                <td>
                                    <input type="file" name="img" id="img_n" class="form-control">
                                </td>
                            </tr>
                            <tfoot>
                                <td colspan="2" class="text-end">
                                    <input type="button" value="save" id="new_item" class="btn btn-primary mt-2">
                                </td>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<!-- update menuitem  -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">update menu item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="table-responsive">
                        <table class="table mx-auto mt-3 table-bordered ">
                            <tr>
                                <td>menu id</td>
                                <td>
                                    <select name="menu_id" class="form-select d-inline w-50" id="menu_id">
                                        <?php
                                        require_once "db_rest.php";
                                        $rs = menuall();
                                        while ($r = mysqli_fetch_array($rs)) {

                                            echo "<option class='opt' value='" . $r[1] . "'>" . $r[2] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <!-- <a name="new" id="new" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" value="new">New</a> -->
                                </td>


                            </tr>
                            <tr>
                                <td>menu item</td>
                                <td>
                                    <input type="text" id="menuitem" class="form-control" placeholder="menu item">
                                </td>
                            </tr>
                            <tr>
                                <td>description</td>
                                <td>
                                    <textarea class="form-control" placeholder="enter description" name="description" id="description" cols="15" rows="1"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>for number of people</td>
                                <td>
                                    <input type="number" class="form-control" min="1" max="6" value="1" name="forpeople" id="forpeople">
                                </td>
                            </tr>
                            <tr>
                                <td>rate:</td>
                                <td>
                                    <input type="number" class="form-control" min="50" max="300" value="50" name="rate" id="rate">
                                </td>
                            </tr>
                            <tr>
                                <td>available:</td>
                                <td>
                                    <input type="checkbox" checked class="form-check-input" name="available" id="available">
                                </td>
                            </tr>
                            <tr>
                                <td>image:</td>
                                <td>
                                    <input type="file" name="img" id="img" class="form-control">
                                </td>
                            </tr>
                            <tfoot>
                                <td colspan="2" class="text-end">
                                    <input type="button" value="update" id="update" class="btn btn-primary mt-2">
                                </td>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#menu_table').DataTable();
    });
</script>