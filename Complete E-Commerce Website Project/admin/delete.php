<?php
require_once('db.php');
$id=$_GET['id'];
$obj->Delete_Product($id);

header('location:products.php');

?>