<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "user_db"; 
$port = "3307"; 

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); 


    $stmt = $conn->prepare("SELECT `password` FROM `user` WHERE `username` = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_password);
        $stmt->fetch();

        if ($password === $db_password) {
            $_SESSION['username'] = $username;
            echo "<script>alert('Login Successful! Redirecting...'); window.location='index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Invalid password! Please try again.'); window.location='login.html';</script>";
            exit();
        }
    } else {
        echo "<script>alert('User not found! Please sign up.'); window.location='signup.html';</script>";
        exit();
    }

    $stmt->close();
}


$conn->close();
?>
