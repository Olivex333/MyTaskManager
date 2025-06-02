<?php 

session_set_cookie_params(3600); 
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="welcome.css">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="container">
        <div class="Title">
            <h1>Log in</h1>
    <form action="" method="post">
    <div class="input-container">
        <input type="text" name="Login" required="">
        <label for="input" class="label">Login</label>
        <div div class="underline"></div>
    </div>

    <div class="input-container">
        <input type="password" name="Password" required="">
        <label for="input" class="label">Password</label>
        <div class="underline"></div>
    </div>
        <button class="learn-more" id="register-button" type="submit" name="submit" >
                <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
                </span>
                <span class="button-text">Log in</span>
            </button>
        </form>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: main.php'); 
    exit;
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=projekt", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

if (isset($_POST['submit'])) {
    $login = $_POST['Login'];
    $password = $_POST['Password'];

    $hashedPassword = hash('sha256', $password);

    $sql = "SELECT * FROM Login WHERE Login = :login AND Password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_login'] = $login;
        header('Location: main.php'); 
        exit;
    } else {
        echo "Nieprawidłowy login lub hasło.";
    }
}
?>
