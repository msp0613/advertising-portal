<?php
require ('navBar.php');
$data = $db->select('product',[],[],[]);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
foreach($data as $row){



    echo"<div class='column'>";
    echo"<div class='card'>";
    echo "<img src={$row['photo']}  style=' width='200px'; height='300px'>";
    echo  "<h1>Tytuł: {$row['name']}</h1>";
    echo "<p>   {$row['description']}</p>";
    $nameCategory = $db->select('category',['name'],[$row['id_category']],['idCategory']);
    echo "<p>   {$nameCategory['name']}</p>";
    $owner = $db->select('user',['login'],[],[]);
    echo "<p> Wystawiajacy  {$owner['login']}</p>";
    echo "<p>Cena :   {$row['price']} zł</p>";
    if (isset($_SESSION['id'])) {
        if ($_SESSION['id']!= $row['person_id']) {
            echo("<td><a href='questionProduct.php?id={$row['id']}' class='btn btn-primary'>Zapytaj o produkt</a></td><br><br>");
            echo("<td><a href='deleteProduct.php?id={$row['id']}' class='btn btn-primary'>Kup</a></td>");
        }
        else{
            echo "<p>Twój produkt</p>";
        }
    }
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