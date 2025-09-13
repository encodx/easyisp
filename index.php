<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$name = getenv('NAME', true) ?: 'World';
echo sprintf('Hello %s!', $name);

echo '<br><br><a href="logout.php">Logout</a>';
