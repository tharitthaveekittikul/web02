<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
        <a href="logout.php"> Logout </a>
    </body>
    </html>

    <?php
}
else {
    header("Location: login.php");
    exit();
}
?>