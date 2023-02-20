<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- import fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <!-- font awesome-->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.css">

    <!--customer stylesheet-->
    <link rel="stylesheet" href="css/create-account.css">
    <!-- customer javascript-->
    <title>Create Account</title>
    <style>
        form {
            width: 280px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black;
        }

        form h1 {
            width: 300px;
            text-align: center;
            /* clear: both; */
            font-size: 40px;
            border-bottom: 5px solid #BB0000;
            margin-bottom: 50px;
            padding: 13px 0;
        }

        form a {
            color: blueviolet;
        }

        body {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <form action="register.php" method="post" id="create-account">
        <h1>Create Account</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" name="name" placeholder="Your name" value="<?=isset($_GET['name']) ? $_GET['name']:'' ?>">
        </div>
        <div class="textbox">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" placeholder="Email" value="<?=isset($_GET['email']) ? $_GET['email']:'' ?>">
        </div>
        <div class="textbox">
            <i class="fas fa-phone-alt"></i>
            <input type="text" name="phone" placeholder="Phone" value="<?=isset($_GET['phone']) ? $_GET['phone']:'' ?>">
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" placeholder="Password">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" name="repass" placeholder="Confirm Password">
        </div>

        <input name="submit" type="submit" value="Create Account"><br><br>
        <p>If you already have account,<a href="login.php#page-title">Login here</a></p>
    </form>

</body>

</html>
<?php
if(isset($_SESSION['error'])){
    echo "<script>alert('{$_SESSION['error']}')</script>";
    unset($_SESSION['error']);
}
if(isset($_SESSION['error1'])){
    echo "<script>alert('Register failed. Please check the following issue(s):\\n";
    foreach ($_SESSION['error1'] as $value){
        echo " - $value"."\\n";
    }
    echo "')</script>";
    unset($_SESSION['error1']);
}

?>