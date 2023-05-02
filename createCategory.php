<?php
require('navBar.php');
if (!isset($_SESSION['role'])){
    header("Location:index.php");
}
if (isset($_POST['name'])){
    $isExist = $db->select('category', ['name'],[$_POST['name']],['name']);
    if ($isExist!=null){
        echo ("<div class='alert alert-danger'><strong>Istniej już taka kategoria</strong> </div>");
    }
    else{
        if (strlen($_POST['name'] )>2){
            $db->insert('category',['name'],[$_POST['name']]);
            header("Location:category.php");
        }
        else{
            echo ("<div class='alert alert-danger'><strong>Nazwa musi posiadać przynajmniej 3 znaki</strong> </div>");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<form action="createCategory.php" method="POST">
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleName">Nazwa Kategorii</label>
        <input type="text" class="form-control" autocomplete="off" name="name" id="exampleInputEmail1" placeholder="Wpisz nazwe"></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
        <button class="btn btn-primary btn-lg" type="submit">Stwórz kategorie</button>
</form>
</div>

</body>
