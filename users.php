<?php
require('navBar.php');
if (!isset($_SESSION['role'])){
    header("Location:index.php");
}
$users = $db->select('user',[],[],[]);
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Rola</th>
                <th scope="col">Login</th>
                <th scope="col">Hasło</th>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Adres</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($users); $i++){
                echo("<tr>");
                echo("<th scope='row'>{$users[$i]['id']}</th>");
                $role = "";
                if ($users[$i]['role'] == 0){
                    $role = "Admin";
                    $message = "Odbierz uprawnienia Admina";
                }
                else{
                    $role = "Użytkownik";
                    $message = "Nadaj uprawnienia Admina";
                }
                echo("<td>{$role}</td>");
                echo("<td>{$users[$i]['login']}</td>");
                echo("<td>{$users[$i]['password']}</td>");
                echo("<td>{$users[$i]['firstName']}</td>");
                echo("<td>{$users[$i]['lastName']}</td>");
                echo("<td>{$users[$i]['city']}</td>");
                echo("<td><a href='updateUser.php?id={$users[$i]['id']}' class='btn btn-primary'>Aktualizuj</a></td>");
                echo("<td><a href='givingPerrmision.php?id={$users[$i]['id']}' class='btn btn-primary'>{$message}</a></td>");
                if ($_SESSION['id'] != $users[$i]['id']) {
                    echo("<td><a href='deleteUser.php?id={$users[$i]['id']}' class='btn btn-primary'>Usuń</a></td>");
                }
                echo("</tr>");
            }
            ?>
            </tbody>
        </table>
    </body>
</html>
