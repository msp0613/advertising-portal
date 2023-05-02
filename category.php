<?php
require('navBar.php');
if (!isset($_SESSION['role'])){
    header("Location:index.php");
}
$category = $db->select('category',[],[],[]);
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
        <th scope="col">Nazwa</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i = 0; $i < count($category); $i++){
        echo("<tr>");
        echo("<th scope='row'>{$category[$i]['idCategory']}</th>");
        echo("<td>{$category[$i]['name']}</td>");
        echo("<td><a href='updateCategory.php?id={$category[$i]['idCategory']}' class='btn btn-primary'>Aktulizuj</a></td>");
        echo("<td><a href='deleteCategory.php?id={$category[$i]['idCategory']}' class='btn btn-primary'>Usuń</a></td>");
        echo("</tr>");
    }
    ?>
    </tbody>
    <td><a href='createCategory.php' class='btn btn-primary'>Stwórz nową kategorię</a></td>
</table>
</body>
</html>