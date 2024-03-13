<?php
function insert_increament($eno, $increament)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "insert into increament_master (eno,increament) values ('$eno','$increament')");
    return $rs;
}
