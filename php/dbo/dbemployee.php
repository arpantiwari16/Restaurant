<?php
// require "dbcon.php";

function empInsert($ename, $city, $desgignation, $gender, $salary, $email, $mobile, $pwd, $name)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "INSERT INTO `employee`( `ename`, `city_id`, `salary`, `email`, `mobile`, `pwd`, `designation_id`, `gender`, `picture`) VALUES
     ('$ename','$city','$salary','$email','$mobile','$pwd','$desgignation','$gender','$name')");
}


function getempall()
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from employee");
    return $rs;
}

function getemp($eno)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from employee where eno=$eno");
    return $rs;
}

function delete_emp($eno)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "delete from employee where eno=$eno");
    return $rs;
}

function update_emp($eno, $ename, $city, $designation,  $salary, $email, $pwd, $mobile, $picture)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "update employee set ename='$ename', city_id='$city',designation_id='$designation' ,salary='$salary'  
    ,email='$email',pwd='$pwd',mobile='$mobile',picture='$picture'  where eno=$eno");
    return $rs;
}

function getename($eno)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select ename from employee where eno='$eno'");
    return $rs;
}
