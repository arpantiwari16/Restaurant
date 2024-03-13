<?php

// function insert_attendance($day, $month, $year, $eno)
// {
//     $cn = getconn();
//     foreach ($eno as $v) {
//         $rs = mysqli_query($cn, "INSERT INTO attendencemaster (day,month,year,eno) values('$day','$month','$year','$v')");
//     }
//     return $rs;
// }
function insert_attendance($day, $month, $year, $eno, $present)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "INSERT INTO attendencemaster (day,month,year,eno,present) values('$day','$month','$year','$eno','$present')");
    return $rs;
}
