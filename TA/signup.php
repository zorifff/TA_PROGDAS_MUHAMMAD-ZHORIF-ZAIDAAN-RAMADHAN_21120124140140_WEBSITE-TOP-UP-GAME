<?php
session_start();
include 'dburl.php';


if (isset($_SESSION["email"])) {
    header("location: ../");
    exit();
}


class User {
    private $connection;
    public $error = "";
    public $success = "";

    public function __construct($dbConnection) {
        $this->connection = $dbConnection;
    }

    public function register($email, $password, $name) {
        
        $stmt = $this->connection->prepare("INSERT INTO user (email, password, name) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $password, $name);

        if ($stmt->execute()) {
            $this->success = "Pendaftaran berhasil! Silakan login.";
        } else {
            $this->error = "Terjadi kesalahan. Silakan coba lagi.";
        }
    }
}


$user = new User($connection);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $user->register($email, $password, $name);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Daftar</title>
</head>
<body>
    <div class="bar-signup">
    <h2>Daftar</h2>
    <?php if ($user->error) { echo "<p style='color:red;'>{$user->error}</p>"; } ?>
    <?php if ($user->success) { echo "<p style='color:green;'>{$user->success}</p>"; } ?>
    <form action="" method="POST">
        <label for="name">Nama:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Daftar">
    </form>
    <p>Sudah punya akun? <a href="./login/index.php">Login di sini</a></p>
    <p>Kembali ke main page <a href="index.php">klik di sini</a></p>
    </div>
</body>
</html>
