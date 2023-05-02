<?php
require ('navBar.php');
if (!$_SESSION['id']){
    header("Location:index.php");
}
$category = $db->select('category',[],[],[]);
if (isset($_POST['name'])){
    $db->insert('product',['person_id','id_category','name','photo','description','price'],[$_SESSION['id'], $_POST['cat'], $_POST['name'], $_POST['photo'], $_POST['description'], $_POST['price']]);
    header("Location:myProduct.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form action="createProduct.php" method="POST">
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="idEx">Kategoria</label>
        <select class="selectpicker" name='cat'>
            <?php
            foreach ($category as $cat) {
                echo("<option value='{$cat['idCategory']}'>{$cat['name']}</option>");
            }
            ?>

        </select></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleName">Nazwa</label>
        <input type="text" class="form-control" autocomplete="off" name="name" id="exampleName" placeholder="Wpisz Nazwe"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="examplePhoto">Zdjęcie</label>
        <input type="text" name="photo" class="form-control" id="examplePhoto" placeholder="Zdjęcie"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleDesc">Opis</label>
        <input type="text" class="form-control" autocomplete="off" name="description" id="exampleDesc" placeholder="Opis"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="examplePrice">Cena</label>
        <input type="text" class="form-control" autocomplete="off" name="price" id="examplePrice" placeholder="Cena"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
        <button class="btn btn-primary btn-lg" type="submit">Dodaj produkt</button>
</form>
</div>

</body>
</html>
