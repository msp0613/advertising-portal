<?php
session_start();
require ('connection.php');
if (!isset($_SESSION['role'])){
    header('Location:index.php');
}
$role = $db->select('user',['role'],[$_GET['id']],['id']);
if ($role['role'] == 0){
    $newRole = 1;
}
else{
    $newRole = 0;
}
$db->update('user',['role'],[$newRole],['id'],[$_GET['id']]);
header("Location:users.php");
?>
