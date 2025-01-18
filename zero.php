<?php
session_start();
$servername = "localhost";
$username = "root";  
$password = "Fazil123##";  
$dbname = "unikal_ctf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlanti qurulmadi: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id']; // URL-dən ID-ni alırıq

    $sql = "SELECT username, password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
	    $row = $result->fetch_assoc();
	       echo "İstifadəçi adı: " . htmlspecialchars($row['username']) . "<br>"; 
        echo "Şifrə: " . htmlspecialchars($row['password']);
    } else {
        echo "İstifadəçi tapılmadı.";
    }
} else {
    echo "İstifadəçi ID-si daxil edilməyib.";
}

$conn->close();
?>

