<?php
require("navBar.php");
    if (isset($_POST['loginLog'])){
        $array = $db->select('user',['id','role','password'],[$_POST['loginLog']],['login']);
        if ($array == false || !password_verify($_POST['password'],$array['password'])){
            echo ("<div class='alert alert-danger'><strong>Logowanie niedane</strong> </div>");
        }
        else{
            if ($array['role'] == 0){
                $_SESSION['role'] = $array['role'];
            }
            $_SESSION['id'] = $array['id'];
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
<form action="login.php" method="POST">
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
        <label for="exampleInputLogin">Login</label>
        <input type="text" class="form-control" autocomplete="off" name="loginLog" id="exampleInputEmail1" placeholder="Wpisz Login"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleInputPassword">Hasło</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Wpisz Hasło"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
        <button class="btn btn-primary btn-lg" type="submit">Loguj</button>
</form>
</div>

</body>
</html>