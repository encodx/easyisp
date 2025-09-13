
<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Your database username
define('DB_PASS', '');     // Your database password
define('DB_NAME', 'zynix_db'); // Your database name

// Create a database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8mb4
$conn->set_charset('utf8mb4');
?>
