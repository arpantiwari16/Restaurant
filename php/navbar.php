<?php
//   session_start();
?>
<nav class="navbar navbar-primary">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand ms-4 " href="adminpanel.php">
                <img src="../imgs/user-gear.png" class="mb-2" width="30" height="30" alt="Logo">
                <h4 id="logo" class="d-inline  ">Admin Panel</h4>
            </a>
        </div>

        <ul class="nav d-inline-block navbar-nav navbar-right me-5">

            <li class=" d-inline ">
                <a style="text-decoration: none;" class="mx-3" id="" href="#">
                    <?php
                    $cart = $_SESSION["ename"];
                    echo "$cart";
                    ?>
                </a>
                <span class="">time:</span>
                <span class="text-uppercase me-1 time"></span>
            </li>
            <li class="  logout btn btn-sm btn-danger" onclick="window.location.assign('login.php')">logout</li>
        </ul>
    </div>
</nav>








<!-- loginame -->