<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'data';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product = isset($_GET['product']) ? $_GET['product'] : 'Air Max';
$product = $conn->real_escape_string($product);

$sql = "SELECT business_name, price FROM products WHERE product_name LIKE ? ORDER BY price DESC";
$stmt = $conn->prepare($sql);
$searchTerm = "%$product%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>