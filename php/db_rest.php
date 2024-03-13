<?php
function getconn()
{
    $cn = mysqli_connect("localhost", "root", "", "restaurant") or die("connection error");
    return $cn;
}
function menuall()
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from menu");
    return $rs;
}

function categoryall()
{
    $cn = getconn();
    $rs = mysqli_query($cn, "select * from category");
    return $rs;
}
function insert_menuitem($menu_id, $menuitem, $description, $for_people, $rate, $available, $picture)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "insert into menuitem(menu_id,menuitem,description,for_people,rate,available,picture) values($menu_id,$menuitem,$description,$for_people,$rate,$available,$picture)");
    return $rs;
}

function insertcategory($category)
{
    $cn = getconn();
    $rs = mysqli_query($cn, "insert into category(category) values('$category')");
    return $rs;
}
