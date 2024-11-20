<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'data';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$term = isset($_GET['term']) ? $_GET['term'] : '';
$term = $conn->real_escape_string($term);

$sql = "SELECT DISTINCT product_name FROM products WHERE product_name LIKE ? LIMIT 5";
$stmt = $conn->prepare($sql);
$searchTerm = "%$term%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$suggestions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row['product_name'];
    }
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($suggestions);
?>