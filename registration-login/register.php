<?php
include "db.php";

$success = "";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if($conn->query($sql)){
        $success = "Registration Successful ✅";
    } else {
        $success = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

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
    color:lightgreen;
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
    <h2>Register</h2>

    <!-- ✅ Success Message -->
    <?php if($success != ""): ?>
        <div class="message"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button name="register">Create Account</button>
    </form>

    <p>Already have an account?</p>
    <a href="login.php">Login</a>
</div>

</body>
</html>