<?php
extract($_REQUEST);
if (isset($tableno)) {
    // echo "$tableno";


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>client</title>
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

    <script>
        $(document).ready(function() {
            let arr = [];
            let tarr = [];
            var a1;
            let badge = 0;
            $(".a1").hover(function() {
                var cat = $(this).attr("value");
                $.get("client_table.php?task=1&category=" + cat, function(response) {

                    $(".tb").html(response);
                    $(".anchor").hover(function() {
                        $(".tb1").html("");
                        var menuid = $(this).attr("value");
                        $.get("client_table.php?task=2&menuid=" + menuid, function(response) {
                            $(".tb1").css("background-color", "#CCEEBC");
                            $(".tb1").css("display", "block");
                            $(".tb1").html(response);


                            ////order click


                            $(".order_btn").click(function() {
                                var menuitem = $(this).siblings().eq(0).text();
                                var for_people = $(this).siblings().children().eq(1).text();
                                var rate = $(this).siblings("div:last").children().eq(1).text();
                                var tno = $("#tno").val();
                                console.log(tno);
                                var index = arr.findIndex(v => v.title == menuitem); //checks for repeat
                                console.log(index);
                                if (index < 0) {
                                    let selected = {
                                        title: menuitem,
                                        for_people: for_people,
                                        rate: rate,
                                        tno: tno
                                    };
                                    arr.push(selected);
                                    badge++;
                                    console.log(arr);
                                    $(".badgevalue").text(badge);
                                }
                            });
                        });
                    });

                });

                $("#place_order").unbind('click').click(function() {
                    // console.log(arr);
                    arr.forEach((v, i) => {

                        var title = v["title"];
                        var tno = v["tno"];
                        var qty = $("#" + i).val();
                        var table_no = $("")
                        // console.log(qty);
                        // console.log(v["title"]);
                        $.get("client_table.php?task=3&menuitem=" + title + "&qty=" + qty + "&tno=" + tno, function(response) {
                            // console.log(response);
                        });

                    });
                    tarr = arr;
                    tarr = [tarr, arr];
                    
                    console.log(tarr);
                    alert("order placed succesfully!");
                    arr = [];
                    if (tarr.length >= 1) {

                        tarr.forEach(function(v, i) {

                            a1 += "<tr>" +
                                "<td>" + (i + 1) +
                                "<td>" + v.title +
                                "<td>" + v.for_people +
                                "<td>" + v.rate +
                                "<td>" + '<input type="number" max="10" min="0" class="form-control w-50" name="" id="' + i + '" value="1">';

                        });
                    };

                })

                $("#bill").unbind('click').click(function() {
                    arr.forEach((v) => {
                        var title = v["title"];
                        console.log(v["title"]);
                        $.get("client_table.php?task=4&menuitem=" + title + "&qty=1", function(response) {
                            console.log(response);
                        });


                    });
                    arr = [];
                    tarr.forEach(function(v, i) {

                    var a1 = "<tr>" +
                        "<td>" + (i + 1) + //append data in model
                        "<td>" + v.title +
                        "<td>" + v.for_people +
                        "<td>" + v.rate +
                        "<td>" + '<input type="number" max="10" min="0" class="form-control w-50" name="" id="' + i + '" value="1">';
                    // console.log(badge);


                    $("#tbody").append(a1);
                });


                })

            });

            $('#myModal').on('shown.bs.modal', function() { //model entry
                $("#tbody").text("");
                let a = '<input type="number" name="" id="qty" value="1">';



                arr.forEach(function(v, i) {

                    var a = "<tr>" +
                        "<td>" + (i + 1) + //append data in model
                        "<td>" + v.title +
                        "<td>" + v.for_people +
                        "<td>" + v.rate +
                        "<td>" + '<input type="number" max="10" min="0" class="form-control w-50" name="" id="' + i + '" value="1">';
                    // console.log(badge);


                    $("#tbody").append(a);
                });
                // tarr.forEach(function(v, i) {

                //     var a1 = "<tr>" +
                //         "<td>" + (i + 1) + //append data in model
                //         "<td>" + v.title +
                //         "<td>" + v.for_people +
                //         "<td>" + v.rate +
                //         "<td>" + '<input type="number" max="10" min="0" class="form-control w-50" name="" id="' + i + '" value="1">';
                //     // console.log(badge);


                //     $("#tbody").append(a1);
                // });



            })


        });
    </script>



    <?php
    include "navbar2.php";
    ?>

    <body>
        <section class="ms-3">

            <h5 class="text-success text-center mt-3">table:
                <?php
                echo "$tableno";
                ?>
            </h5>
            <div class="container mt-3 row ">



                <ul class="  col-3 list-group    ">
                    <?php
                    $pdo = new PDO("mysql:host=localhost;dbname=restaurant", "root", "");
                    $pdostm = $pdo->prepare("select * from category");
                    $pdostm1 = $pdo->prepare("select * from menu");
                    $pdostm->execute();
                    $pdostm1->execute();
                    while ($r = $pdostm->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li class='list-group-item'>" . "<a class='noline a1'  value='" . $r["id"] . "'>" . $r["category"] . "</a>";
                    }


                    ?>
                </ul>
                <div class="col-3">
                    <ul class="d-inline   list-group  bg-success  tb" style="background-color: blue;">

                    </ul>

                </div>
                <div class="col-6 ">
                    <div id="container" class=" row tb1">

                    </div>

                </div>




        </section>
    </body>

    </html>


    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header ">
                    <h4 class="modal-title text-center">ORDERS</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <table class="table table-bordered table-primary">
                        <thead>
                            <th>s.no</th>
                            <th>menuitem</th>
                            <th>for people</th>
                            <th>rate</th>
                            <th>qty</th>
                        </thead>
                        <tbody id="tbody"></tbody>
                        <tfoot class="text-end">
                            <tr>
                                <td colspan="5"><input type="button" id="place_order" value="place order" class="btn btn-success btn-sm"></td>

                            </tr>
                            <tr>
                                <td colspan="5"><input type="button" id="bill" value="generate Bill" class="btn btn-primary btn-block btn-sm"></td>

                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                </div>

            </div>
        </div>
    </div>


<?php
    echo "<input type='number' value='$tableno' hidden id='tno'>";
} else {
    echo "pls select table!";
}
?>