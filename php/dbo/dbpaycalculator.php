<?php
function insert_paycal($desn, $da, $ta, $hra, $spall)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "insert into paycalculator(designation_id, da, ta, hra, spall) values('$desn', '$da', '$ta', '$hra', '$spall')");
    return $rs;
}
function get_calculator()
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from paycalculator");
    return $rs;
}


function delete_paycal($desn)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "delete from paycalculator where designation_id='$desn'");
    return $rs;
}

function get_paycal($desn)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from paycalculator where designation_id='$desn'");
    return $rs;
}
function update_paycal($id, $desn, $da, $ta, $hra, $spall)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "update  paycalculator set designation_id='$desn',da='$da',ta='$ta',hra='$hra',spall='$spall' where id='$id'");
    return $rs;
}
