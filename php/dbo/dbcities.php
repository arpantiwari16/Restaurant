<?php

function getcities()
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from cities");
    return $rs;
}
function getcity($id)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from cities where id='$id'");
    return $rs;
}

function insertcities($city, $state, $pin)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "insert into cities (city,state,pincode) values('$city','$state','$pin')");
    return $rs;
}

function deletecities($city)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "delete from cities where city='$city'");
    return $rs;
}

function updatecities($id, $city, $state, $pin)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "update cities  set id='$city','$state','$pin' where id='$id'");
    return $rs;
}
