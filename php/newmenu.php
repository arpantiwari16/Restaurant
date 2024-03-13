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

    <!-- <script src="../js/restaurant.js"></script> -->
</head>
<!-- <style>
    * {
        text-transform: capitalize;
    }

    .col-2 {
        border-right: 2px solid lightgray;
        height: 700px;
    }

    /* Add custom styles here if needed */
    .category-box {

        background-color: aliceblue;
        padding: 10px;
        margin-bottom: 10px;
    }

    .category-link {
        color: #333;
        text-decoration: none;
        display: block;
    }

    .category-link:hover {
        color: lightsalmon;
    }

    .navname {
        margin-right: 80%;
    }
</style> -->
<script>
    $(document).ready(function() {

        $("#save").on("click", function() {
            if ($("#available").prop("checked") == true) {
                $("#available").val("yes");
            } else {
                $("#available").val("no");

            }
            var menu_id = $("#menu_id").val();
            var menuitem = $("#menuitem").val();
            var description = $("#description").val();
            var for_people = $("#forpeople").val();
            var rate = $("#rate").val();
            var available = $("#available").val();
            var img = $("#img").val();
            console.log(img);

            $.get("insertmenu.php?menu_id=" + menu_id + "&menuitem=" + menuitem + "&description=" +
                description + "&for_people=" + for_people + "&rate=" + rate +
                "&available=" + available + "&picture=" + "img",
                function(response) {
                    console.log(response);
                });
        });

        $("#save_menu").on("click", function() {
            var category_id = $("#category_id").val();
            var menu_insert = $("#menu_insert").val();
            console.log(menu_insert);
            $.get("insertmenu1.php?cat_id=" + category_id + "&menu_i=" + menu_insert,
                function(response) {
                    console.log(response);
                });
        });
        $("#new_category").on("click", function() {
            console.log("working");
            $("#cat_insert").css("display", "inline-block");
            $("#save_category").show();
        });

        $("#save_category").on("click", function() {
            var cat_i = $("#cat_insert").val();
            $.get("insertcategory.php?cat=" + cat_i, function(response) {
                console.log(response);
            });
        });
    })
</script>

<body class=" ">
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand ms-4 " href="adminpanel.php">
                    <img src="../imgs/user-gear.png" class="mb-2" width="30" height="30" alt="Logo">
                    <h4 class="d-inline ">Admin Panel</h4>
                </a>
            </div>

            <ul class="nav d-inline navbar-nav navbar-right me-5">
                <li class=" d-inline me-5">
                    <a id="" class="mx-5" href="#">
                        <?php session_start();
                        $cart = $_SESSION["ename"];
                        echo "$cart";
                        ?>
                    </a>
                    <span class="">time:</span>
                    <span class="text-uppercase me-2 time"></span>
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
            <div class="col-9">
                <form action="">
                    <!-- <h2 class="text-center"><u>MENU ITEM ENTRY</u></h2> -->
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
                                            echo "<option class='opt' value='" . $r[0] . "'>" . $r[2] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <a name="new" id="new" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" value="new">New</a>
                                </td>


                            </tr>
                            <!-- other inputs -->
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
                                <td colspan="2">
                                    <input type="button" value="save" id="save" class="btn btn-primary mt-2">
                                </td>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
            <!-- <div class="col-2"></div> -->
        </div>
    </section>
</body>

</html>
<!-- model window -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">new menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-primary">
                    <tr>
                        <td>category id</td>
                        <td>
                            <select name="category_id" class="form-select d-inline w-50" id="category_id">
                                <?php
                                require_once "db_rest.php";
                                $rs = categoryall();
                                while ($r = mysqli_fetch_array($rs)) {
                                    echo "<option class='opt' value='" . $r[0] . "'>" . $r[1] . "</option>";
                                }
                                ?>
                            </select>

                            <a name="new" type="" id="new_category" value="new">New</a>
                            <input type="text" style="display: none;" placeholder="enter category" id="cat_insert" class="form-control w-50 mt-2 ">
                            <input type="button" style="display: none;" value="save" class="btn btn-primary" id="save_category">
                        </td>
                    </tr>
                    <tr>
                        <td>menu</td>

                        <td><input type="text" class="form-control" id="menu_insert" placeholder="menu"></td>
                    </tr>
                    <tr>

                        <td colspan="2"><input type="button" class="btn btn-primary " id="save_menu" value="save"></td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>