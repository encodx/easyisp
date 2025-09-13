<?php
session_start();

$username = 'admin';
$password = 'password';

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit;
    } else {
        header('Location: login.php?error=1');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
?>