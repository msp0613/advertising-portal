<?php
session_start();
require_once('connection.php');
if (isset($_SESSION['id'])) {
    $login = $db->select('user',['login'],[$_SESSION['id']],['id'])['login'];
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Sklep internetowy</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Strona głowna</a></li>
            <?php
            if (isset($_SESSION['role'])) {
                echo("<li><a href='users.php'>Uzytkownicy</a></li>");
                echo("<li><a href='category.php'>Kategorie</a></li>");
            }
            if (isset($_SESSION['id'])){
                echo ("<li><a href='messages.php'>Wiadomości</a></li>");
                echo ("<li><a href='myProduct.php'>Moje produkty</a></li>");
            }

            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION['id'])) {
                echo("<li><a href='updateUser.php?id={$_SESSION['id']}'><span class='glyphicon glyphicon-log-in'></span> $login</a></li>");
                echo("<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span> Wyloguj się</a></li>");
            }
            else{
                echo("<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span>Zaloguj się</a></li>");
                echo("<li><a href='register.php'><span class='glyphicon glyphicon-log-in'></span>Zarejestruj się</a></li>");
            }
                    ?>
        </ul>
    </div>
</nav>