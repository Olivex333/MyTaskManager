<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="welcome.css">
</head>

<body>
    <div class="container">
        <div class="Title">
            <h1>Hello!</h1>
        </div>
        <div class="Register">
            <form action="" method="post">
                <label for="Login">Login</label>
                <input type="text" name="Login" required>
                <br>
                <label for="Email">E-mail</label>
                <input type="email" name="Email" required>
                <br>
                <label for="Password">Password</label>
                <input type="password" name="Password" required>
                <br>
                <button type="submit" name="submit">Register!</button>
            </form>
        </div>
        
    </div>
</body>

</html>

<?php
session_start(); 

try {
    $pdo = new PDO("mysql:host=localhost;dbname=projekt", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Połączono z bazą danych!<br>";
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

if (isset($_POST['submit'])) {
    $login = $_POST['Login'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $hashedPassword = hash('sha256', $password);

    $sql = "INSERT INTO Login (Login, Email, Password) VALUES (:login, :email, :password)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword); 

    if ($stmt->execute()) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_login'] = $login;
        echo "Rejestracja zakończona pomyślnie.";
        header('Location: login.php'); // Przekieruj na stronę logowania
        exit; // Zakończ bieżący skrypt
    } else {
        echo "Wystąpił błąd podczas rejestracji.";
    }
}
?>

