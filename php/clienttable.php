<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="../js/time.js"></script>
</head>
<style>
    * {
        text-transform: capitalize;
    }

    body {
        background-color: #E8FFCE;

    }

    .noline {
        text-decoration: none;
        color: darkblue;
        cursor: pointer;
    }

    #container {
        width: 140%;
        display: none;
        aspect-ratio: 2/2;
        padding: 10px 0;
        margin: auto;
        /* border: solid black 2px; */
        overflow-x: hidden;
        overflow-y: scroll;
        scroll-snap-type: y mandatory;
        scroll-padding-block: 20px;
        border-radius: 5px;
    }


    .list-group-item {
        text-transform: uppercase;
        background-color: #CCEEBC;
        border: 2px solid #E8FFCE;
    }

    table {
        background-color: #CCEEBC;
    }

    .cards {
        max-width: 300px;
        /* max-height: 100px; */
        background-color: #CCEEBC;

    }

    .cards1 {
        background-color: #E8FFCE;
        border-radius: 10px;
        margin-left: 20px;
        margin-top: 20px;
    }
</style>

<!-- <input type="button" value="book" id="' . $r[" table_no"] . '" class="btn btn-sm book btn-primary ' . $r["status"] . '"> -->
<!-- <a href="client_panel.php" id="'.$r[" table_no"].'" class="btn btn-sm book btn-primary" value="'.$r[" status"].'"></a> -->

<body>
    <?php
    include "navbar2.php";
    ?>
    <section>
        <div class="container w-75">
            <h3 class="text-center mt-4 mb-3">select a table </h3>
            <table id="table_details" class="table mx-auto mt-3 table-striped   ">
                <thead>
                    <th>s.no</th>
                    <th>table number</th>
                    <th>capacity</th>
                    <th>description</th>
                    <th>status</th>
                    <th>Select</th>
                </thead>

                <tbody>
                    <?php
                    $sno = 1;
                    $check = '';
                    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");  //connection
                    $pdostm = $pdo->prepare("select * from table_details");          //query we use prepare
                    $pdostm->execute();                                                   //execute

                    while ($r = $pdostm->fetch(PDO::FETCH_ASSOC)) {                       //fetch
                        echo "<tr><td>" . "$sno" . "<td>" . $r["table_no"]  .
                            "<td>" . $r["table_capacity"] . "<td>" . $r["description"] .
                            "<td>" .  $r["status"] . "<td>" .
                            "<input  type='button' id='" . $r["table_no"] . "' value='book' class='btn btn-sm btn-primary book " . $r["status"] . "' />";
                        // '<a href="client_panel.php?tableno=' . $r["table_no"] . '" id="book" class="btn btn-sm  btn-primary ' . $r["status"] . '" value="' . $r["status"] . '">book</a>';
                        $sno++;
                    }

                    ?>

                </tbody>
                <!-- <tfoot>
                    <input type="button" value="hello" class="O">
                    <input type="button" value="show" class="Oa">
                </tfoot> -->
            </table>
        </div>
    </section>
</body>

</html>

<script>
    $(document).ready(function() {
        $(".O").prop("disabled", true);
        $(".A").css("background-color", "blue");

        $(".book").on("click", function() {
            var tno = $(this).attr("id");
            window.open("client_panel.php?tableno=" + tno);
            //     $.get("client_panel.php?tableno="+tno,function(response){
            //         console.log(response);
            //     });
            // document.open("client_panel.php");
        });

    });
</script>