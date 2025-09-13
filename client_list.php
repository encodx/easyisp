
<?php
session_start();
require_once 'db.php'; // Include the database connection

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Fetch clients from the database
$sql = "SELECT client_code, pppoe_user, full_name, zone, package, billing_status FROM clients ORDER BY id DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Client List</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
             <div class="sidebar-header">Zynix</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item"><a href="index.php">Dashboard</a></li>
                <li class="sidebar-menu-item"><a href="#">Configuration</a></li>
                <li class="sidebar-menu-item"><a href="#">SignUp List</a></li>
                <li class="sidebar-menu-item active"><a href="client_list.php">Client Menu</a></li>
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
                <div class="content-header">
                    <h1>Client List</h1>
                    <button class="btn">Add New Client</button>
                </div>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Client Code</th>
                            <th>PPPoE</th>
                            <th>Name</th>
                            <th>Zone</th>
                            <th>Package</th>
                            <th>Billing Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['client_code']); ?></td>
                                    <td><?php echo htmlspecialchars($row['pppoe_user']); ?></td>
                                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['zone']); ?></td>
                                    <td><?php echo htmlspecialchars($row['package']); ?></td>
                                    <td><span class="status <?php echo strtolower(htmlspecialchars($row['billing_status'])); ?>"><?php echo htmlspecialchars($row['billing_status']); ?></span></td>
                                    <td>
                                        <button class="btn-action view">View</button>
                                        <button class="btn-action edit">Edit</button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No clients found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
