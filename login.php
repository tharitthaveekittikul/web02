<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <form action="check_login.php" method="post">
        <h1>LOGIN</h1>
        <?php
        session_start();

        if(isset($_SESSION['username']) && isset($_SESSION['id'])){
            header("Location: dashboard.php");
            exit();
        } ?>
    
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php
        } ?>

        <label> Username </label>
        <input type="text" name="username" placeholder="Username"> <br>

        <label> Password </label>
        <input type="password" name="password" placeholder="Password"> <br>

        <button type="submit"> Login </buton>
    </form>
</body>
</html>