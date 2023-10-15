<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        })
        calendar.render()
      })

    </script>
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
                <a href="main"><li><i class="fas fa-home"></i> Home</li></a>
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
    <div class="right2">
            <div id="calendar" class="calendar"></div>
    </div>
</body>
<script src="script.js"></script>
<script src="particles.js"></script>
<script src="app.js"></script>
</html>
