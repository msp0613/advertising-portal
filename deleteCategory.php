<?php
require('connection.php');
session_start();
if (!isset($_SESSION['role'])){
    header("Location:index.php");
}
$db->delete('category',['idCategory'],[ $_GET['id']]);
header("Location:category.php");
?>
