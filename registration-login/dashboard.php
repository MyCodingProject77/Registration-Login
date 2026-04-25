<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body style="text-align:center; font-family:Segoe UI;">

<h2>Welcome, <?php echo $_SESSION['user']; ?> 🎉</h2>
<a href="logout.php">Logout</a>

</body>
</html>