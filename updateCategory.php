<?php
require('navBar.php');
if (!isset($_SESSION['role'])){
    header("Location:index.php");
}
$nameCategory = $db->select('category',[],[],[]);
if (isset($_POST['name'])) {
    $db->update('category', ['name'], [$_POST['name']], ['idCategory'], [$nameCategory[0]['idCategory']]);
    header("Location:category.php");
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="updateCategory.php" method="POST">


    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 50px">
        <label for="exampleInputLogin">Nazwa</label>
        <input type="text" class="form-control" autocomplete="off" name="name" id="exampleInputEmail1" value="<?php echo ($nameCategory[0]['name']) ?>"  ></div>
    <div style= " width :50% ;
         margin-left: auto;
        margin-right: auto;
        margin-top: 100px">
        <button class="btn btn-primary btn-lg" type="submit">Zaktualizuj</button>
</form>
</div>
</body>
</html>

