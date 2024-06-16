<?php
include 'config.php';

// Realizar la consulta para obtener los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
return $products;
?>
