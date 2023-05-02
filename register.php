<?php
require('navBar.php');
if (isset($_SESSION['id'])){
    header("Location:index.php");
}
if (isset($_POST['login'])){
    $errorMessage = "Nieprawidłowa rejestracja ";
    $error = 0;
    $login = $db ->select('user',['login'],[$_POST['login']],['login']);
    if ($login != null){
        $errorMessage.="Podany login jest zajęty ";
        $error++;
    }
    if (strlen(($_POST['login'])) < 5){
        $errorMessage.="login za krótki musi posiadać conajmniej 5 znaków, ";
        $error++;
    }
    if (strlen($_POST['password']) < 5){
        $errorMessage.=" hasło za krótkie musi posiadać conajmniej 5 znaków";
        $error++;
    }
    if (strlen($_POST['name']) < 3){
        $errorMessage.=" imie za krótkie musi posiadać conajmniej 3 znaków";
        $error++;
    }
    if (strlen($_POST['firstName']) < 3){
        $errorMessage.=" nazwisko za krótkie musi posiadać conajmniej 3 znaków";
        $error++;
    }
    if (strlen($_POST['city']) < 3){
        $errorMessage.=" Miejscowość za krótka musi posiadać conajmniej 3 znaków";
        $error++;
    }
    if ($error>0){
        echo ("<div class='alert alert-danger'><strong>$errorMessage</strong> </div>");
    }
    if($error == 0){
        $options = [
            'cost' => 12,
        ];
        $db->insert('user',['role', 'login', 'password', 'firstName', 'lastName', 'city'],[1, $_POST['login'], password_hash($_POST['password'], PASSWORD_BCRYPT, $options), $_POST['name'], $_POST['firstName'], $_POST['city']]);
        header("Location:index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo basename( $_SERVER['SCRIPT_NAME'],".php"); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<form action="register.php" method="POST">
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleInputLogin">Login</label>
        <input type="text" class="form-control" autocomplete="off" name="login" id="exampleInputEmail1" placeholder="Wpisz Login"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleInputPassword">Hasło</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Wpisz Hasło"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleInputName">Imie</label>
        <input type="text" class="form-control" autocomplete="off" name="name" id="exampleInputN" placeholder="Wpisz Imie"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleFirstName">Nazwisko</label>
        <input type="text" class="form-control" autocomplete="off" name="firstName" id="exampleInputS" placeholder="Wpisz nazwisko"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleCity">Miejsce zamieszkania</label>
        <input type="text" class="form-control" autocomplete="off" name="city" id="exampleInputCity" placeholder="Wpisz adres zamieszkana"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
        <button class="btn btn-primary btn-lg" type="submit">Zarejestruj się</button>
</form>
</div>

</body>
</html>

