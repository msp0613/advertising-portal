<?php
require ('navBar.php');
if (!isset($_SESSION['id'])){
    header("Location:index.php");
}
$sql = "SELECT * FROM messages WHERE product_id = ? and id_from = ? and id_to = ? or id_from = ? and id_to = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$_GET['idProduct'], $_GET['idFrom'], $_SESSION['id'], $_SESSION['id'], $_GET['idFrom']]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//todo
if (isset($_POST['text'])){
    $db->insert('messages',['text', 'id_from', 'id_to', 'product_id'],[$_POST['text'], $_SESSION['id'], $_GET['idFrom'], $_GET['idProduct']]);
}
?>
<!Doctype html>
<html lang="pl">
<body>
<?php
foreach ($data as $tex) {
    if ($tex['id_from'] == $_SESSION['id']) {
        echo("<div class='alert alert-success'>");
        echo("<h1>{$tex['text']}</h1>");
        echo("</div>");
    }
    else {
        echo("<div class='alert alert-info'>");
        echo("<h1>{$tex['text']}</h1>");
        echo("</div>");
    }
}
    ?>
<form action="oneMess.php" method="POST">
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleName">Odpowiedz</label>
        <input type="text" class="form-control" autocomplete="off" name="name" id="exampleInputEmail1"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
        <button class="btn btn-primary btn-lg" type="submit">Wyslij wiadomość</button>
</form>
</body>
</html>

