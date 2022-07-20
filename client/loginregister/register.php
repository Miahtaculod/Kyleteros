<?php

include'../admin/database/dbController.php';

error_reporting(0);

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($db_admin, $sql);
        if(!$result->num_rows > 0){
            $sql = "INSERT INTO user(first_name, last_name, username, email, password, cpassword)
                    VALUES ('$first_name', '$last_name', '$username', '$email', '$password', '$cpassword')";
            $result = mysqli_query($db_admin, $sql);
            if($result){
                echo "<script>alert('Registered Complete')</script>";
                $first_name = "";
                $last_name = "";
                $username ="";
                $email ="";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Something went wrong')</script>";   
            } 
        } else {
            echo "<script>alert('Email already exist')</script>";   
        }
    } else{
        echo "<script>alert('Password not matched')</script>";
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
        
        <title>Register Form</title>
    </header>
    <body>
        <div class="containter">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="First Name" name="first_name" value="<?php echo $first_name ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $last_name ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password'] ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword'] ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Have an account? <a href="login.php">Login here</a></p>
        </form>
        </div>
    </body>
</html>