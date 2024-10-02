<?php

function connection() {

    $host = "localhost:3306";
    $user = "root";
    $pass = "root";
    $bd = "northwind";

    $connect = mysqli_connect($host, $user, $pass);
    mysqli_select_db($connect, $bd);

    return $connect;
}

$con = connection();
$sql = "SELECT p.ProductName \"Nombre Producto\", c.CategoryName \"Nombre de categoria\", p.UnitPrice \"Precio por unidad\" 
        FROM products p JOIN categories c ON p.CategoryID = c.CategoryID 
        WHERE p.UnitPrice > (SELECT AVG(p2.UnitPrice) FROM products p2 WHERE p2.CategoryID = p.CategoryID) ORDER BY c.CategoryName, p.ProductName";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea entregable tabla query northwind</title>
    <style>
        table {
            border-collapse: separate;
            width: 50%;
            border: 1px solid #000;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .izq {
            text-align: left;
        }
    </style>
</head>
<body>
    <table class="container d-flex justify-content-center .align-items-center gap-3">
        <tr>
            <td>Nombre de categoría</td>
            <td>Nombre Producto</td>
            <td>Precio por unidad</td>
        </tr>
        <?php while ($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td class="izq"><?= $row['Nombre de categoria'] ?></td>
                <td class="izq"><?= $row['Nombre Producto'] ?></td>
                <td><?= $row['Precio por unidad'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>