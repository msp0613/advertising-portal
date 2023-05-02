<?php
require ('navBar.php');
if (!$_SESSION['id'] ){
    header("Location:index.php");
}
$product = $db->select('product',[],[$_GET['id']],['id']);
$idCategory = $product[0]['id_category'];
$nameCategory = $db->select('category',['name'],[$idCategory],['idCategory']);
$category = $db->select('category',[],[],[]);
if (isset($_POST['cat'])){
    $db->update('product',['id_category', 'name', 'photo', 'description', 'price'],[$_POST['cat'], $_POST['name'],$_POST['photo'], $_POST['description'], $_POST['price']],['id'],[$_POST['id']]);
    header("Location: myProduct.php");
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="updateProduct.php" method="POST">


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
        <label for="nameEx">Nazwa produktu</label>
        <input type="text" name="name" class="form-control" id="nameEx" value="<?php echo ($product[0]['name']) ?>"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="photoEx">Zdjecie</label>
        <input type="text" class="form-control" autocomplete="off" name="photo"  id="exampleInputN" value="<?php echo ($product[0]['photo']) ?>"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="descEx">Opis</label>
        <input type="text" class="form-control" autocomplete="off" name="description" id="descEx" value="<?php echo ($product[0]['description']) ?>"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="priceEx">Cena</label>
        <input type="text" class="form-control" autocomplete="off" name="price" id="priceEx" value="<?php echo ($product[0]['price']) ?>"></div>
    <div style= "visibility: hidden">
        <input type="text" class="form-control" autocomplete="off" name="id" id="idEx" value="<?php echo ($product[0]['id']) ?>"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
        <button class="btn btn-primary btn-lg" type="submit">Zaktualizuj</button>
</form>
</div>
</body>
</html>
