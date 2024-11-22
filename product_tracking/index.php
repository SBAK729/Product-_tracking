<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'data';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if created_at column exists
$check_column = $conn->query("SHOW COLUMNS FROM price_notifications LIKE 'created_at'");
if ($check_column->num_rows == 0) {
    // If created_at doesn't exist, add it
    $conn->query("ALTER TABLE price_notifications ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
}

// Get notifications
$sql = "SELECT ut.*, p.price AS current_price, p.product_name, p.business_name 
        FROM user_tracking ut 
        JOIN products p ON ut.product_id = p.id";
$result = $conn->query($sql);

// Process price changes and notifications
$notifications = [];
while ($row = $result->fetch_assoc()) {
    $user_id = $row['user_id'];
    $product_id = $row['product_id'];
    $current_price = floatval($row['current_price']);
    $price_criteria = floatval($row['price_criteria']);
    $criteria_type = $row['criteria_type'];

    $notify = false;
    if ($criteria_type == 'increase' && $current_price > $price_criteria) {
        $notify = true;
    } elseif ($criteria_type == 'decrease' && $current_price < $price_criteria) {
        $notify = true;
    } elseif ($criteria_type == 'equal' && $current_price == $price_criteria) {
        $notify = true;
    }

    if ($notify) {
        $message = "The price of {$row['product_name']} from {$row['business_name']} is now $current_price.";
        $notifications[] = [
            'message' => $message,
            'product' => $row['product_name'],
            'business' => $row['business_name'],
            'price_diff' => $current_price - $price_criteria,
            'current_price' => $current_price
        ];

        $notification_sql = "INSERT INTO price_notifications (user_id, product_id, old_price, new_price, notification_message) 
                           VALUES ($user_id, $product_id, $price_criteria, $current_price, '$message')";
        $conn->query($notification_sql);
    }
}

// Modified query to handle cases where there might be no notifications today
$today_alerts_query = "SELECT COUNT(*) as count FROM price_notifications 
                      WHERE DATE(created_at) = CURDATE()";
$today_alerts_result = $conn->query($today_alerts_query);
$today_alerts = $today_alerts_result ? $today_alerts_result->fetch_assoc()['count'] : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Price Tracking Dashboard</title>
    
    
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', system-ui, sans-serif;
    }

    :root {
        --primary: #2563eb;
        --secondary: #4338ca;
        --success: #16a34a;
        --danger: #dc2626;
        --background: #f8fafc;
        --card: #ffffff;
        --text: #1e293b;
        --border: #e2e8f0;
    }

    body {

    color: var(--text);
    line-height: 1.5;
    background-color: black; /* Add this line */
}


    .dashboard {
        display: grid;
        grid-template-columns: 250px 1fr;
        min-height: 100vh;
    }

    .sidebar {
        background: var(--card);
        padding: 2rem 1rem;
        border-right: 1px solid var(--border);
    }

    .logo {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .logo-icon {
        font-size: 1.75rem;
    }

    .nav-menu {
        list-style: none;
    }

    .nav-item {
        padding: 1rem;
        margin: 0.5rem 0;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-item:hover {
        background: rgba(37, 99, 235, 0.1);
        color: var(--primary);
    }

    .nav-item.active {
        background: var(--primary);
        color: white;
        box-shadow: 0 0 10px rgba(37, 99, 235, 0.3);
    }

    .main-content {
        padding: 2rem;
        background: var(--background);
    }

    .header {
        margin-bottom: 2rem;
    }

    .header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 0.5rem;
    }

    .header p {
        font-size: 1rem;
        color: #4b5563;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
    background: var(--card);
    padding: 1.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    border: 1px solid transparent; /* Add a border for better definition */
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    border: 1px solid var(--primary); /* Highlight border on hover */
}

.stat-card h3 {
    font-size: 1rem;
    color: #64748b;
    margin-bottom: 0.5rem;
    text-transform: uppercase; /* Make headings stand out */
}

.stat-value {
    font-size: 2rem;
    font-weight: 700; /* Bold for emphasis */
    color: var(--text);
    transition: color 0.3s ease; /* Smooth color transition */
}

.stat-card:hover .stat-value {
    color: var(--primary); /* Change color on hover */
}

.notifications {
        background: var(--card);
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .notifications h2 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid var(--border);
    }

    .notification-item {
        padding: 1rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.3s ease;
    }

    .notification-item:hover {
        background-color: rgba(37, 99, 235, 0.05);
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .product-info h4 {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .business-name {
        font-size: 0.875rem;
        color: #64748b;
    }

    .price-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .current-price {
        font-size: 1.125rem;
        font-weight: 600;
    }

    .price-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .price-increase {
        background: #fee2e2;
        color: var(--danger);
    }

    .price-decrease {
        background: #dcfce7;
        color: var(--success);
    }

    .chart-container {
        margin-top: 2rem;
        padding: 1.5rem;
        background: var(--card);
        border-radius: 0.75rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    @media (max-width: 768px) {
        .dashboard {
            grid-template-columns: 1fr;
        }

        .sidebar {
            display: none;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
    .nav-menu {
    position: relative; 
}

.sub-menu {
    list-style: none;
    padding-left: 1rem; 
    display: none; 
    position: absolute; 
    left: 50%; 
    top: 0; 
    background: var(--card); 
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); 
    border-radius: 0.5rem; 
    z-index: 1000; 
}

.nav-item:hover .sub-menu {
    display: block;
}

.nav-item {
    position: relative; 
}
    /* Loading Animation */
    .loading-spinner {
        width: 30px;
        height: 30px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid var(--primary);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 20px auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
</head>
<body>
    <div class="dashboard">
    <aside class="sidebar">
    <div class="logo">
        <span class="logo-icon">📊</span>
        PriceTracker
    </div>
    <nav>
        <ul class="nav-menu">
            <li class="nav-item active">Dashboard</li>
            <li class="nav-item">Products</li>
            <li class="nav-item">
                <span>Notifications</span>
                <ul class="sub-menu">
                    <li class="nav-item">All Notifications</li>
                    <li class="nav-item">Price Alerts</li>
                    <li class="nav-item">System Messages</li>
                </ul>
            </li>
            <li class="nav-item">Settings</li>
        </ul>
    </nav>
</aside>
        
        <main class="main-content">
            <div class="header">
                <h1>Price Tracking Dashboard</h1>
                <p>Monitor your product prices in real-time</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Active Trackers</h3>
                    <div class="stat-value">
                        <?php
                            $tracker_count = $conn->query("SELECT COUNT(*) as count FROM user_tracking")->fetch_assoc()['count'];
                            echo $tracker_count;
                        ?>
                    </div>
                </div>
                <div class="stat-card">
                    <h3>Price Alerts Today</h3>
                    <div class="stat-value">
                        <?php
                            $today_alerts = $conn->query("SELECT COUNT(*) as count FROM price_notifications WHERE DATE(created_at) = CURDATE()")->fetch_assoc()['count'];
                            echo $today_alerts;
                        ?>
                    </div>
                </div>
                <div class="stat-card">
                    <h3>Total Products</h3>
                    <div class="stat-value">
                        <?php
                            $products_count = $conn->query("SELECT COUNT(*) as count FROM products")->fetch_assoc()['count'];
                            echo $products_count;
                        ?>
                    </div>
                </div>
            </div>

            <div class="notifications">
                <h2>Recent Price Changes</h2>
                <div id="notifications-container">
                    <?php foreach ($notifications as $notification): ?>
                        <div class="notification-item">
                            <div class="product-info">
                                <h4><?php echo htmlspecialchars($notification['product']); ?></h4>
                                <div class="business-name"><?php echo htmlspecialchars($notification['business']); ?></div>
                            </div>
                            <div class="price-info">
                                <div class="current-price">
                                    $<?php echo number_format($notification['current_price'], 2); ?>
                                </div>
                                <span class="price-badge <?php echo $notification['price_diff'] > 0 ? 'price-increase' : 'price-decrease'; ?>">
                                    <?php 
                                        $arrow = $notification['price_diff'] > 0 ? '↑' : '↓';
                                        echo $arrow . ' $' . number_format(abs($notification['price_diff']), 2);
                                    ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

           
        </main>
    </div>

   
</body>



</html>

<?php
$conn->close();
?>