<?php
require ('navBar.php');
if (!isset($_SESSION['id'])){
    header("Location:index.php");
}
$owner = $db->select('product',['person_id'],[$_GET['id']],['id']);
$productId = $db->select('product',['id'],[$_GET['id']],['id']);
if (isset($_POST['mess'])){
    //`messId`, `text`, `id_from`, `id_to`, `product_id`
    $db->insert('messages',['text','id_from','id_to','product_id'],[$_POST['mess'], $_SESSION['id'], $_POST['idUser'], $_POST['idProduct']]);
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<form action="questionProduct.php" method="POST">
    <div class="form-outline" style="margin-top: 100px">
        <textarea class="form-control" id="textAreaExample" name="mess" rows="4"></textarea>
        <label class="form-label" for="textAreaExample">Wiadomość</label>
    </div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
        <button class="btn btn-primary btn-lg" type="submit">Wyslij</button></div>
    <div style= "visibility: hidden">
        <input type="text" class="form-control" autocomplete="off" name="idUser"  value="<?php echo ($owner['person_id']) ?>"></div>
    <div style= "visibility: hidden">
        <input type="text" class="form-control" autocomplete="off" name="idProduct"  value="<?php echo ($productId['id']) ?>"></div>
</form>
</div>

</body>
</html>

