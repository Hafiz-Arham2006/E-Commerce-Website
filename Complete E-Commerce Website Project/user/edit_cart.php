<?php
session_start();
if(isset($_POST['update_btn']) || isset($_POST['delete_btn'])){
    $name=$_POST['name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$img=$_POST['img'];
}
if(isset($_POST['update_btn'])){
    $detail=array($name,$price,$quantity,$img);
$_SESSION[$name]=$detail;
}else if(isset($_POST['delete_btn'])){
    unset($_SESSION[$name]);
}
header('location:view_carts.php');
?>