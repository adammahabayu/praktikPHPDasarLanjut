<?php
session_start();

if(isset($_SESSION['login_user'])){
    echo "<h1>Selamat datang, {$_SESSION['login_user']}!</h1>";
    echo "<p>Anda telah berhasil login.</p>";
    echo "<form action='logout.php' method='post'>";
    echo "<input type='submit' value='Logout'>";
    echo "</form>";
} else {
    header("location: login_sessions.php");
    exit();
}
?>
