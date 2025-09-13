
<?php
session_start();
require_once 'db.php'; // Include the database connection

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// --- Client Management Stats ---

// Total Clients
$total_clients_result = $conn->query("SELECT COUNT(*) as count FROM clients");
$total_clients = $total_clients_result->fetch_assoc()['count'];

// Inactive Clients (Assuming 'Unpaid' are inactive for now)
$inactive_clients_result = $conn->query("SELECT COUNT(*) as count FROM clients WHERE billing_status = 'Unpaid'");
$inactive_clients = $inactive_clients_result->fetch_assoc()['count'];

// Running Clients
$running_clients = $total_clients - $inactive_clients;

// New Clients (Last 30 days)
$new_clients_result = $conn->query("SELECT COUNT(*) as count FROM clients WHERE created_at >= NOW() - INTERVAL 30 DAY");
$new_clients = $new_clients_result->fetch_assoc()['count'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <div class="sidebar-header">Zynix</div>
            <ul class="sidebar-menu">
                 <li class="sidebar-menu-item active"><a href="index.php">Dashboard</a></li>
                <li class="sidebar-menu-item"><a href="#">Configuration</a></li>
                <li class="sidebar-menu-item"><a href="#">SignUp List</a></li>
                <li class="sidebar-menu-item"><a href="client_list.php">Client Menu</a></li>
                <li class="sidebar-menu-item"><a href="#">Billing Menu</a></li>
                <li class="sidebar-menu-item"><a href="#">Mikrotik Server</a></li>
                <li class="sidebar-menu-item"><a href="#">OLT Management</a></li>
                <li class="sidebar-menu-item"><a href="#">Network Diagram</a></li>
                <li class="sidebar-menu-item"><a href="#">HR & Payroll</a></li>
                <li class="sidebar-menu-item"><a href="#">Support & Ticketing</a></li>
                <li class="sidebar-menu-item"><a href="#">Bandwidth Buy-Sell</a></li>
                <li class="sidebar-menu-item"><a href="#">Purchase Menu</a></li>
                <li class="sidebar-menu-item"><a href="#">Accounting Menu</a></li>
                <li class="sidebar-menu-item"><a href="#">Report Menu</a></li>
                <li class="sidebar-menu-item"><a href="#">SMS Service Menu</a></li>
                <li class="sidebar-menu-item"><a href="#">System Menu</a></li>
                <li class="sidebar-menu-item"><a href="#">Release Note</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="topbar">
                <div>Welcome Back, Admin</div>
                <div>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
            <div class="content-area">
                <h1>Dashboard Overview</h1>
                <div class="cards-grid">

                    <div class="card">
                        <div class="card-header">Client Management</div>
                        <div class="card-body">
                            <p>Total Clients: <span><?php echo $total_clients; ?></span></p>
                            <p>Running Clients: <span><?php echo $running_clients; ?></span></p>
                            <p>Inactive Clients: <span><?php echo $inactive_clients; ?></span></p>
                            <p>New Clients (Month): <span><?php echo $new_clients; ?></span></p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Financials</div>
                        <div class="card-body">
                            <p>Total Monthly Bill: <span>৳550,000</span></p>
                            <p>Collected Bill: <span>৳510,000</span></p>
                            <p>Total Due: <span>৳40,000</span></p>
                            <p>Cash On Hand: <span>৳120,000</span></p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Support & Tickets</div>
                        <div class="card-body">
                            <p>Pending Tickets: <span>15</span></p>
                            <p>Processing Tickets: <span>5</span></p>
                            <p>Completed Tickets: <span>250</span></p>
                        </div>
                    </div>

                     <div class="card">
                        <div class="card-header">HR & Attendance</div>
                        <div class="card-body">
                            <p>Today's Attendance: <span>95%</span></p>
                            <p>Absent Employees: <span>3</span></p>
                            <p>On Leave: <span>2</span></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
