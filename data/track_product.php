<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'data';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user_id = 1;
$product_id = intval($_POST['product_id']);
$price_criteria = floatval($_POST['price_criteria']);
$criteria_type = $_POST['criteria_type'];


$sql = "INSERT INTO user_tracking (user_id, product_id, price_criteria, criteria_type) 
        VALUES ($user_id, $product_id, $price_criteria, '$criteria_type')";

if ($conn->query($sql) === TRUE) {
    echo "Product tracking successfully added.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
