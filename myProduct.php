<?php
require ('navBar.php');
if (!isset($_SESSION['id'])){
    header("Location:index.php");
}
$data = $db->select('product',[],[$_SESSION['id']],['person_id']);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div style=" margin-left: auto;
    margin-right: auto;
    width: 10em">
<td><a href='createProduct.php' class='btn btn-primary'>Dodaj Produkt</a></td>
</div>
<?php
foreach($data as $row){



echo"<div class='column'>";
    echo"<div class='card'>";
        echo "<img src={$row['photo']}  style=' width='200px'; height='300px'>";
        echo  "<h1>Tytuł: {$row['name']}</h1>";
        echo "<p>   {$row['description']}</p>";
        $nameCategory = $db->select('category',['name'],[$row['id_category']],['idCategory']);
        echo "<p>   {$nameCategory['name']}</p>";
        echo "<p>Cena :   {$row['price']} zł</p>";
        echo("<td><a href='updateProduct.php?id={$row['id']}' class='btn btn-primary'>Aktualizuj</a></td><br><br>");
        echo("<td><a href='deleteProduct.php?id={$row['id']}' class='btn btn-primary'>Usuń</a></td>");
        echo"</div>";
        echo "</div>";
}
echo "</div>";
?>

</body>
</html>
<style>

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .column {
        float: left;
        width: 25%;
        padding: 0 10px;
    }

    .row {margin: 0 -5px;}


    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 16px;
        height: 700px;
        width: 300px;
        text-align: center;
        float: left;
        background-color: #f1f1f1;
    }

</style>