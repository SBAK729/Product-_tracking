<?php
$localhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'data';

$conn = new mysqli(hostname: $localhost,username: $username,password: $password,database: $dbname);
if(!$conn){
    echo 'Database not connected';
}

$sql = 'SELECT business_name, price,product_name FROM products';

$result = $conn -> query(query: $sql);

$data =[];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);

?>

