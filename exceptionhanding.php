<?php
session_start(); 

if(isset($_SESSION['login_user'])){
    header("location: welcome.php"); 
}

$username = $password = "";
$usernameErr = $passwordErr = "";
$errorMessage = "";

function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["u"])) {
        $usernameErr = "Masukkan username";
    } else {
        $username = bersihkan_input($_POST["u"]);
    }
    if (empty($_POST["p"])) {
        $passwordErr = "Masukkan password";
    } else {
        $password = bersihkan_input($_POST["p"]);
    }

    try {
        if($username == "adam" && $password == "adam"){ 
            $_SESSION['login_user'] = $username; 
            header("location: welcome.php"); 
        } else {
            throw new Exception("Username atau password salah"); 
        }
    } catch(Exception $e) {
        $errorMessage = $e->getMessage(); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <style>
        .error {
            color: red; 
            font-size: smaller; 
        }
    </style>
</head>
<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="u">
        <span class="error">* <?php echo $usernameErr;?></span>
        <br><br>
        Password: <input type="password" name="p">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <input type="submit" value="Login">
        <p class="error"><?php echo $errorMessage; ?></p>
    </form>
    
</body>
</html>