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
$sql = "SELECT ProductID, ProductName, UnitsInStock FROM products";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso a datos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 30%;
            border: 1px solid #000;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        table td:nth-child(3) {
            width: 100px;
        }
    </style>
</head>
<body>
    <table class="container d-flex justify-content-center .align-items-center gap-3">
        <tr>
            <td>ID</td>
            <td>ProductName</td>
            <td>UnitsInStock</td>
        </tr>
        <?php while ($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $row['ProductID'] ?></td>
                <td><?= $row['ProductName'] ?></td>
                <td><?= $row['UnitsInStock'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>