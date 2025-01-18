<?php
session_start();
$servername = "localhost";
$username = "root";  
$password = "Fazil123##";  
$dbname = "unikal_ctf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlanti qurulmadi" . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['team_name'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($pass, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user;
            header("Location: instructions.html"); 
        } else {
            echo "Şifrə Səhvdir";
        }
    } else {
        echo "Belə istifadəçi yoxdur";
    }
}
$conn->close();
?>

