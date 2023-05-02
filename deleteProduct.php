<?php
require('connection.php');
session_start();
if ($_SESSION['id'] != $_GET['id'] && !isset($_SESSION['role'])){
    header("Location:index.php");
}
//DELETE FROM `product` WHERE 0
$db->delete('product',['id'],[ $_GET['id']]);
header("Location:myProduct.php");
?>
