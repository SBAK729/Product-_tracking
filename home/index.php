<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'data';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM products";
$result = $conn->query(query: $sql);

echo "<h1>Available Products</h1>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
            <div>
                <h2>{$row['product_name']} - {$row['business_name']}</h2>
                <p>Price: {$row['price']}</p>
                <form method='POST' action='./data/track_product.php'>
                    <input type='hidden' name='product_id' value='{$row['id']}'>
                    <input type='number' name='price_criteria' placeholder='Enter price to track' required>
                    <select name='criteria_type' required>
                        <option value='increase'>When price increases</option>
                        <option value='decrease'>When price decreases</option>
                        <option value='equal'>When price equals</option>
                    </select>
                    <button type='submit'>Track</button>
                   
                </form>
                 <button type='submit'>Buy Now</button>
            </div>
        ";
    }
} else {
    echo "No products available.";
}

$conn->close();
?>
