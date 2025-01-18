<?php
$servername = "localhost";
$username = "root"; // Change if you use a different user
$password = "Fazil123##"; // Replace with your MySQL root password
$dbname = "unikal_ctf";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['team_name']) && isset($_POST['password'])) {
        $user = trim($_POST['team_name']); // Get username from input
        $pass = trim($_POST['password']);   // Get password from input

        if (!empty($user) && !empty($pass)) {
            // Hash the password for security
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $user, $hashed_password);

            if ($stmt->execute()) {
                // İstifadəçi ID-sini əldə et
                $user_id = $stmt->insert_id;
                echo "İstifadəçi müvəfəqqiyyətlə yaradıldı və sənin istifadəçi İD-in: " . $user_id;
               #echo "<br><a href='zero.php?id=$user_id'>Profile</a>";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Username and password cannot be empty.";
        }
    } else {
        echo "Invalid form submission.";
    }
} else {
    echo "No data submitted.";
}

// GİRİŞ ET forması
?>


<h2>GIRIS ET</h2>
<!-- Profil bölməsi altında GİRİŞ ET linki -->
<a href="login.html">GİRİŞ ET</a>

<?php
// Close connection
$conn->close();
?>

