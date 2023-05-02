<?php
require('navBar.php');
if ($_SESSION['id'] != $_GET['id'] && !isset($_SESSION['role'])){
    header("Location:index.php");
}
$user = $db->select('user',[],[$_GET['id']],['id']);
if (isset($_POST['login'])){
    $options = [
        'cost' => 12,
    ];
    $db->update('user',['login','password','firstName','lastName','city'],[$_POST['login'], password_hash($_POST['password'], PASSWORD_BCRYPT, $options), $_POST['name'], $_POST['firstName'], $_POST['city']]);
    header('Location: users.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <form action="updateUser.php" method="POST">


        <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
            <label for="exampleInputLogin">Login</label>
            <input type="text" class="form-control" autocomplete="off" name="login" id="exampleInputEmail1" value="<?php echo ($user[0]['login']) ?>"  ></div>
        <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
            <label for="exampleInputPassword">Hasło</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo ($user[0]['password']) ?>"></div>
        <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
            <label for="exampleInputName">Imie</label>
            <input type="text" class="form-control" autocomplete="off" name="name"  id="exampleInputN" value="<?php echo ($user[0]['firstName']) ?>"></div>
        <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
            <label for="exampleFirstName">Nazwisko</label>
            <input type="text" class="form-control" autocomplete="off" name="firstName" id="exampleInputS" value="<?php echo ($user[0]['lastName']) ?>"></div>
        <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
            <label for="exampleCity">Miejsce zamieszkania</label>
            <input type="text" class="form-control" autocomplete="off" name="city" id="exampleInputCity" value="<?php echo ($user[0]['city']) ?>"></div>
        <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
            <button class="btn btn-primary btn-lg" type="submit">Zaktualizuj</button>
    </form>
    </div>
    </body>
</html>
