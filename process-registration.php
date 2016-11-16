<?php
session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}
include_once 'db.php';
$error = false;

if (isset($_POST['register'])) {

    foreach ($_POST as $key => $val) {
        $_POST[$key] = trim($val);
        $_POST[$key] = strip_tags($val);
        $_POST[$key] = htmlspecialchars($val);
        $_POST[$key] = mysqli_real_escape_string($conn, $val);
    }

    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['rpt_password'])) {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rpt_password = $_POST['rpt_password'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // check email exist or not
            $query = "SELECT id FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 0) {
                
                if (strlen($password) >= 8) {

                    if ($password == $rpt_password) {
                        $password = md5($password);
                        $query = "INSERT INTO user (first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email', '$password')";
                        $res = mysqli_query($conn, $query);
                        header('Location: index.php?form=login-form&register=true');
                    } else {
                        $error = "different-passwords";
                    }
                } else {
                    $error = "short-password";
                }
            } else {
                $error = "email-not-unique";
            }
        } else {
            $error = "invalid-email";
        }
    } else {
        $error = "empty-fields";
    }
    if ($error != false) {
        header('Location: index.php?form=register-form&err=' . $error);
    }
}
?>