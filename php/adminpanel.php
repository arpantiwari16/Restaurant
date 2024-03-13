<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Navbar with Image Logo</title>
    <script src="../js/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/time.js"></script>
</head>

<script>
    $(document).ready(function() {
        $("#loginname").click(function() {
            $(".logout").toggle().removeClass("d-none");
        });
        $(".logout").click(function() {

        });


    });
</script>

<body>
    <!-- <button class="openbtn">menu</button> -->
    <?php
    session_start();
    include "navbar.php";
    ?>
    <div class="row">
        <div class="col-2 mt-4">
            <?php

            include "leftpanel.php";
            // session_start();
            // $cart = $_SESSION["ename"];
            // echo "$cart";
            ?>
        </div>
    </div>

</body>

</html>