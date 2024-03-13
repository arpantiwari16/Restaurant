<?php
session_start();
require_once "dbo/dbcon.php";
require "dbo/dbemployee.php";
$row = getempall();
$flag = 0;
extract($_REQUEST);
while ($r = mysqli_fetch_assoc($row)) {
    if (($email == $r["email"] || $email == $r["mobile"]) && $pswd == $r["pwd"]) {
        header("location:category.php");

        $_SESSION["ename"] = $r["ename"];
        $flag = 1;
    }
}
if ($flag == 0) {
    header("location:login.php?msg=invalid email/password try again!");
}


?>