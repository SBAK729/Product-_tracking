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
$result = $conn->query($sql);

echo "<h1>Available Products</h1>";

echo '<style>
    body {
        font-family: "Segoe UI", system-ui, sans-serif;
        background: #f0f4f8;
        color: #333;
        line-height: 1.6;
        padding: 2rem;
    }
    h1 {
        text-align: center;
        margin-bottom: 2rem;
        color: #2563eb;
    }
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    .product-card {
        background: #ffffff;
        border-radius: 0.75rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15);
    }
    .product-card h2 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: #1d4ed8;
    }
    .product-card p {
        font-size: 1.125rem;
        margin: 0.5rem 0;
        color: #4b5563;
    }
    .form-group {
        margin: 1rem 0;
    }
    .form-group input[type="number"],
    .form-group select {
        width: calc(100% - 1rem);
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        transition: border-color 0.3s ease;
    }
    .form-group input[type="number"]:focus,
    .form-group select:focus {
        border-color: #2563eb;
        outline: none;
    }
    .button {
        padding: 0.75rem 1.5rem;
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 0.375rem;
        cursor: pointer;
        transition: background 0.3s ease;
        margin-top: 0.5rem;
    }
    .button:hover {
        background: #1d4ed8;
    }
    .buy-button {
        margin-left: 1rem;
        background: #4caf50;
    }
    .buy-button:hover {
        background: #45a049;
    }
</style>';

echo "<div class='product-grid'>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
            <div class='product-card'>
                <h2>{$row['product_name']} - {$row['business_name']}</h2>
                <p>Price: \${$row['price']}</p>
                <form method='POST' action='../data/track_product.php'>
                    <div class='form-group'>
                        <input type='hidden' name='product_id' value='{$row['id']}'>
                        <input type='number' name='price_criteria' placeholder='Enter price to track' required>
                        <select name='criteria_type' required>
                            <option value='increase'>When price increases</option>
                            <option value='decrease'>When price decreases</option>
                            <option value='equal'>When price equals</option>
                        </select>
                    </div>
                    <button type='submit' class='button'>Track</button>
                    <button type='button' class='button buy-button'>Buy Now</button>
                </form>
            </div>
        ";
    }
} else {
    echo "No products available.";
}

echo "</div>";

$conn->close();
?>