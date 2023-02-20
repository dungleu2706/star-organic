<?php
session_start();
if (!isset($_SESSION['cid'])) {
    header("location: index.php");
} else {
    $cid = $_SESSION['cid'];
}
require_once "admin/database.php";

if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if (isset($_POST['upinfo'])) {
    $error = [];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //check email:
    if (empty($email)) {
        $error['email'] = "Email can not be left empty";
    } else {
        //validate email string if not empty:
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Invalid email address.";
        } else {
            //check if email already taken by other user:
            $conn = connect();
            $email = $conn->real_escape_string($email);
            $checkEmail = $conn->query("SELECT * FROM customers WHERE customerID != '$cid' AND customerEmail = '$email'");
            if ($checkEmail->num_rows > 0) {
                $error['email'] = "The email has already taken by other user.";
            }
            $conn->close();
        }
    }

    if (empty($phone)) {
        $error['phone'] = "phone can not be left empty";
    } else {
        //validate phone string if not empty:
        $phone = filter_var(trim($phone), FILTER_SANITIZE_STRING);
        if (!preg_match('/^\+?[0-9]*$/', $phone) || strlen($phone) < 10) {
            $error['phone'] = "Invalid phone number.";
        } else {
            //check if phone already taken by other user:
                $conn = connect();
            $phone = $conn->real_escape_string($phone);
            $checkphone = $conn->query("SELECT * FROM customers WHERE customerID != '$cid' AND customerPhone = '$phone'");
            $conn->close();
            if ($checkphone->num_rows > 0) {
                $error['phone'] = "The phone number has already taken by other user.";
            }
        }
    }
    
    if (count($error) > 0) {
        $_SESSION['error'] = $error;
        header("location: useraccount.php");
    } else {
        $conn = connect();
        $sql = "UPDATE customers SET customerEmail = ?, customerPhone = ? WHERE customerID = ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param("ssi", $email, $phone, $cid);
        if ($stm->execute()) {
            $_SESSION['success'] = "Account updated.";
        } else {
            $_SESSION['errDB'] = "Can not update password due to database error.";
        }
        $conn->close();
        header("location: useraccount.php");
    }
}

if (isset($_POST['uppass'])) {
    $oldPass = $_POST['oldpass'];
    $newPass = $_POST['newpass'];
    $rePass = $_POST['repass'];
    $error = [];
    //validate old pass
    $conn = connect();
    $query = $conn->query("SELECT * FROM customers WHERE customerID = '$cid'");
    $userInfo = $query->fetch_object();
    $conn->close();
    if (!password_verify($oldPass, $userInfo->password)) {
        $error['pass'] = 'Incorrect old password';
    } else {
        if (strcmp($newPass, $rePass) != 0) {
            $error['pass'] = 'The password you re-entered doesn\'t match';
        }
        if(strcmp($oldPass,$newPass) == 0){
            $error['pass'] = 'The password you entered same the old password';
        }
    }
    if (count($error) > 0) {
        $_SESSION['error'] = $error;
        header("location: useraccount.php");
    } else {
        $conn = connect();
        $newPass = password_hash($newPass, PASSWORD_DEFAULT);
        $sql = "UPDATE customers SET password = ? WHERE customerID = ?";
        $stm = $conn->prepare($sql);
        $stm->bind_param("si", $newPass, $cid);
        if ($stm->execute()) {
            $_SESSION['success'] = "Password updated.";
        } else {
            $_SESSION['errDB'] = "Can not update password due to database error.";
        }
        $conn->close();
        header("location: useraccount.php");
    }
}
