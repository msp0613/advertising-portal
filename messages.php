<?php
require ('navBar.php');
if (!isset($_SESSION['id'])){
    header("Location:index.php");
}

$nameProduct = $db->select('product',[],[$_SESSION['id']],['person_id']);
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Produkt</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i = 0; $i < count($nameProduct); $i++) {
        echo("<tr>");
        echo("<th scope='row'>{$nameProduct[$i]['name']}</th>");
        echo("<td><a href='messProduct.php?id={$nameProduct[$i]['id']}' class='btn btn-primary'>Zobacz wiadomości</a></td>");
        echo ("</tr>");
    }
    ?>
    </tbody>
</table>
</body>
</html>
