<?php

session_start();
$name=$_POST['name'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$img=$_POST['img'];
$detail=array($name,$price,$quantity,$img);
$_SESSION[$name]=$detail;
// if(!isset($_SESSION['cart_count'])){
//     $_SESSION['cart_count']=null;
// }
// if(isset($_POST['add_cart_btn'])){
//     $_SESSION['cart_count']++;
// }
header('location:index.php');



?>