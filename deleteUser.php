<?php
    require('connection.php');
    session_start();
    if (!isset($_SESSION['role'])){
        header("Location:index.php");
    }
    $db->delete('user',['id'],[ $_GET['id']]);
    header("Location:users.php");
?>
