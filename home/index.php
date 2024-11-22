<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            display: flex;
            font-family: "Segoe UI", system-ui, sans-serif;
            background: #f0f4f8;
            color: #333;
            line-height: 1.6;
            margin: 0;
        }

        #sidebar {
            width: 250px;
            background: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            padding: 1rem;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 50px;
            margin-right: 10px;
        }

        .sidebar-menu {
            margin-top: 20px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .menu-item:hover {
            background: #f0f4f8;
        }

        .dark-mode-toggle {
            margin-top: auto;
        }

        .overlay {
            margin-left: 250px; 
            padding: 2rem;
            flex: 1;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            transition: transform 0.3s;
            height: 300px; 
            display: flex;
            flex-direction: column; 
            justify-content: space-between; 
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card h2 {
            margin: 0 0 10px;
            font-size: 1.2rem;
            flex-grow: 1;
        }

        .product-card p {
            margin: 0 0 15px;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button {
            background: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .button:hover {
            background: #0056b3;
        }

        .buy-button {
            background: #28a745;
            margin-left: 10px;
        }

        .buy-button:hover {
            background: #218838;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            justify-content: space-between;
        }

        .header input {
            margin-right: 10px; 
            padding: 0.5rem 1rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-size: 1rem;
            width: auto;
            margin-left:222px;
        }

        .header input:focus {
            border-color: #80bdff;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .header input::placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .header input:disabled {
            background-color: #e9ecef;
            border-color: #ced4da;
            color: #6c757d;
            cursor: not-allowed;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .searchButton {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            color: white;
            background-color: #007bff;
            border: 1px solid #0056b3;
            border-radius: 0.2rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            width: auto;
        }

        .searchButton:hover {
            background-color: #0056b3;
        }

        .searchButton:active {
            transform: scale(0.95);
        }

        .searchButton:disabled {
            background-color: #cfd8dc;
            color: #6c757d;
            cursor: not-allowed;
            box-shadow: none;
        }
    </style>
</head>
<body>

<nav id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIj48cmVjdCB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgZmlsbD0iIzRhOTBlMiIvPjwvc3ZnPg==" alt="Logo">
            <span class="logo-text">Dashboard</span>
        </div>
    </div>
    
    <div class="sidebar-menu">
        <a href="../home" class="menu-item active" data-tooltip="Home">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        <a href="../product_tracking" class="menu-item" data-tooltip="Product Tracking">
            <i class="fas fa-box-open"></i>
            <span>Product Tracking</span>
            <span class="badge">New</span>
        </a>
        <a href="../" class="menu-item" data-tooltip="Data Visualization">
            <i class="fas fa-chart-bar"></i>
            <span>Data Visualization</span>
        </a>
        <a href="#settings" class="menu-item" data-tooltip="Settings">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
    </div>

    <div class="dark-mode-toggle">
        <button id="toggleDarkMode"><i class="fas fa-moon"></i> Mode</button>
    </div>
</nav>

<div class="overlay">
    <div class="header">
        <h1>Available Products</h1>
        <input type="text" id="searchinput" placeholder="Search Product" class="serachInput">
        <button onclick="adddata()" class="searchButton">Search Product</button>
    </div>

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

    if ($result->num_rows > 0) {
        echo "<div class='product-grid'>";
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
                        <div class='button-group'>
                            <button type='submit' class='button'>Track</button>
                            <button type='button' class='button buy-button'>Buy Now</button>
                        </div>
                    </form>
                </div>
            ";
        }
        echo "</div>";
    } else {
        echo "<p>No products available.</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>