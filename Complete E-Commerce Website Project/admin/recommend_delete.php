<?php
require_once("db.php");
$id=$_GET['id'];
$obj->Delete_Recommend($id);
header("location:recommend_products.php");
?>