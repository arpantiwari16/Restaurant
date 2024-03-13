<?php
// require "dbcon.php";
function getdesignation()
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from designation");
    return $rs;
}
function getdesn($id)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from designation where id='$id'");
    return $rs;
}
function insertdesignation($designation)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "insert into designation (designation) values('$designation')");
    return $rs;
}

function deletedesignation($designation)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "delete from designation where designation='$designation'");
    return $rs;
}

function updatedesignation($id, $designation)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "update designation  set designation='$designation' where id='$id'");
    return $rs;
}
