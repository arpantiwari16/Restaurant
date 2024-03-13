<?php

function getconn()
{
    $cn = mysqli_connect("localhost", "root", "", "classwork") or die("connection error");
    return $cn;
}

function getconn1()
{
    $cn = mysqli_connect("localhost", "root", "", "classwork2") or die("connection error");
    return $cn;
}
