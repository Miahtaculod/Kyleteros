<?php

include'../admin/database/dbController.php';

session_start();
error_reporting(0);

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE email ='$email' AND password = '$password'";
    $result = mysqli_query($db_admin, $sql);
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: ../index.php");
    } else {
        echo "<script>alert('Email or Password is incorrect')</script>";   
    }
}

?>

<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">

        <link rel="stylesheet" type="text/css" href="style.css">
        
        <title>Login</title>
    </header>
    <body>
        <div class="containter">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Don't have an account? <a href="register.php">Register here</a></p>
        </form>
        </div>
    </body>
</html>