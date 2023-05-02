<?php
require ('navBar.php');
if (!isset($_SESSION['id'])){
    header("Location:index.php");
}
//SELECT DISTINCT `id_from` FROM messages WHERE `product_id`= 2 and `id_from` not IN (16);
$sql = "SELECT DISTINCT `id_from` FROM messages WHERE `product_id`= ? and `id_from` not IN (?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$_GET['id'], $_SESSION['id']]);
$user_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
$login = [];
foreach ($user_id as $user){
    array_push($login, $db->select('user',['id','login'],[$user['id_from']],['id']));
}
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Wiadomości</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($login as $log) {
        echo("<tr>");
        echo("<th scope='row'>{$log['login']}</th>");
        echo("<td><a href='oneMess.php?idProduct={$_GET['id']}& idFrom={$log['id']}' class='btn btn-primary'>Zobacz wiadomości</a></td>");

        echo ("</tr>");
    }
    ?>
    </tbody>
</table>
</body>
</html>
