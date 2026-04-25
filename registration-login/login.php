<?php
session_start();
include "db.php";

$error = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0){
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            $_SESSION['user'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>
* {
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#ffffff;
}

.container {
    width:280px;
    padding:25px 20px;
    border-radius:16px;
    background:#111;
    color:#fff;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    text-align:center;
}

h2 {
    color:orange;
    margin-bottom:10px;
}

.message {
    font-size:13px;
    margin-bottom:10px;
}

.error {
    color:#ff4d4d;
}

.success {
    color:lightgreen;
}

.logout {
    color:orange;
}

input {
    width:100%;
    padding:11px;
    margin:6px 0;
    border:none;
    border-radius:8px;
    outline:none;
    font-size:14px;
}

button {
    width:100%;
    padding:11px;
    margin-top:10px;
    background:orange;
    border:none;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;
}

a {
    color:orange;
    font-size:13px;
    text-decoration:none;
}

p {
    margin-top:10px;
    font-size:13px;
}
</style>

</head>

<body>

<div class="container">
    <h2>Login</h2>

    <!-- Messages -->
    <?php
    if($error != ""){
        echo "<div class='message error'>$error</div>";
    }

    if(isset($_GET['logout'])){
        echo "<div class='message logout'>Logged out successfully</div>";
    }
    ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button name="login">Login</button>
    </form>

    <p>Don't have an account?</p>
    <a href="register.php">Register</a>
</div>

</body>
</html>