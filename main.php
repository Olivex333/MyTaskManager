<?php
session_start();


if (isset($_SESSION['user_id'])) {
    $id_uzytkownika = $_SESSION['user_id'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=projekt", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Zapytanie do bazy danych o nazwę użytkownika
        $stmt = $pdo->prepare("SELECT Login FROM Login WHERE ID = :id"); 
        $stmt->bindParam(':id', $id_uzytkownika); // Przypisz ID użytkownika
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nazwa_uzytkownika = $row['Login'];

    } catch (PDOException $e) {
        die("Błąd połączenia z bazą danych: " . $e->getMessage());
    }
} else {

}

$pogoda = "Raining";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="main.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <div class="left">
        <div class="sidebar">
            <i class="fas fa-bars"></i>
            <span class="text">Menu</span>
            <div class="user-info">
                <img src="wolnachwila.png" alt="Avatar">
                <h3>Hello!<p>Oliwier</p></h3> 

            </div>
            <div class="MenuList">
                <ul class="nice-list">
                <li><a href="main"><i class="fas fa-home"></i> Home</a></li>
                    <li>Lorem ipsum</li>
                    <li class="logout-button"><i class="fas fa-sign-out-alt"></i> Wyloguj</li>
                    <li><i class="fas fa-cog"></i> Settings</li>
                    <li><i class="fas fa-life-ring"></i> Support</li>
                </ul>
            </div>
            <div class="app-info">
                <h2>MyTaskManager</h2>
                <p>Wersja 1.0</p>
                <p>Autor: Oliwier Grabarczyk</p>
            </div>
            <div class="theme-options">
                <div class="theme-square" style="background-color: #ff5733;"></div>
                <div class="theme-square" style="background-color: #33ff57;"></div>
                <div class="theme-square" style="background-color: #5733ff;"></div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
    <div class="right">
        <div class="notifications">
            <i class="fas fa-bell"></i> <!-- Ikona dzwonka -->
        </div>
        <div class="container2">
            <div class="square weather">
                <div class="square-1">
                    <h1><i class="cloud-icon fas fa-cloud custom-icon"></i>&nbsp;Weather</h1>
                </div>
            </div>
            <div class="square" id="calendar-click">
                <div class="square-2">
                    <h1><i class="icon fas fa-calendar custom-icon"></i>&nbsp;Calendar</h1>
                </div>
            </div>
            <div class="square">
                <div class="square-3">
                    <h1><i class="icon fas fa-sticky-note custom-icon"></i>&nbsp;Notes</h1>
                </div>
            </div>
            <div class="square">
                <div class="square-4">
                    <h1><i class="fas fa-clock custom-icon"></i>&nbsp;Timer</h1>
                </div>
            </div>
            <div class="square">
                <div class="square-5">
                    <h1><i class="fas fa-file-import custom-icon"></i>&nbsp;Data export and import</h1>
                </div>
            </div>
            <div class="square">
                <div class="square-6">
                    <h1><i class="fas fa-tools custom-icon"></i>&nbsp;Tools</h1>
                </div>
            </div>
            <div class="overlay">
                <i class="fas fa-times x"></i>        
                    <h1><i class="fas fa-cloud"></i>&nbsp;Weather <br></h1> 
                <p>Today is: <?php echo $pogoda; ?> </p>
                
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="particles.js"></script>
    <script src="app.js"></script>
</body>
</html>
