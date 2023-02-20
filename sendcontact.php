<?php
session_start();
if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
    unset($_SESSION['success']);
}

if(isset($_SESSION['errDB'])){
    unset($_SESSION['errDB']);
}

require_once 'admin/database.php';
if (isset($_POST['ok'])) {
    $error = [];
    $fname = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $lname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = htmlspecialchars($_POST['message']);
    
    if(empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($message) ){
        $error['empty'] = 'Please fill all the required fields.';
        header("location: contact.php?lname=$lname&fname=$fname&email=$email&phone=$phone&mess=$message");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Invalid email address.';
        $email = '';
    }else {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    if(!preg_match('/^\+?[0-9]*$/', $phone)) {
        $error['phone'] = 'Invalid phone number.';
        $phone = '';
    }
    if(strlen($phone) < 10) {
        $error['phone'] = 'Phone number must be atleast 10 digits.';
        $phone = '';
    }

    if(count($error)>0){
        $_SESSION['error'] = array();
        $_SESSION['error'] =  $error;
        header("location: contact.php?lname=$lname&fname=$fname&email=$email&phone=$phone&mess=$message#ct");
    } else {
        $conn = connect();
        $sql = "INSERT INTO contact_us (first_name, last_name, email, phone, message) 
        VALUES (?,?,?,?,?)";
        $stm = $conn->prepare($sql);
        $stm->bind_param("sssss", $fname, $lname, $email, $phone, $message);
        if($stm->execute()){
            $_SESSION['success'] = 'We have received your message and will contact you soon. Thank you.';
            echo 'D';
        } else {
            $_SESSION['errDB'] = 'Can not connect to the database.';
            echo 'E';
        }
        $conn->close();
        header("location: contact.php#ct");
    }
}
?>