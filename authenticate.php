<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'web02';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if( mysqli_connect_errno() ) {
    exit('Failed to connect to MySQL: '.mysqli_connect_error());
}

if(isset($_POST['username']) && isset($_POST['password'])) {
    
    function validate($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
$username = mysqli_real_escape_string($con, $_POST["username"]);  
$password = mysqli_real_escape_string($con, $_POST["password"]);  
$password = md5($password);

$sql = "SELECT * FROM admin_user WHERE username='$username' AND password='$password'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['username'] == $username &&  $row['password'] == $password) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header('Location: dashboard.php');
        exit();
    }
    
}
else{
    header("Location: index.php?msg=incorrect");
    exit();
}
// if ( !isset($_POST['username'], $_POST['password']) ) {
// 	exit('Please fill both the username and password fields!');
// }

// if($stmt = $con->prepare('SELECT * FROM admin_user WHERE username = ?')) {
//     $stmt->bind_param('s', $_POST['username']);
//     $stmt->execute();
//     $stmt->store_result();
//     if ($stmt->num_rows > 0) {
//         $stmt->bind_result($id, $password);
//         $stmt->fetch();
//         if (password_verify($_POST['password'], $password)) {
//             session_regenerate_id();
//             $_SESSION['loggedin'] = TRUE;
//             $_SESSION['username'] = $_POST['username'];
//             $_SESSION['id'] = $id;
//             echo 'Welcome ' . $_SESSION['name'] . '!';
//         } else {
//             echo 'Incorrect username and/or password!';
//         }
//     } else {
//         echo 'Incorrect username and/or password!';
//     }

//     $stmt->close();
// }

?>