<?php

session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}
include_once 'db.php';
$error = false;

if (isset($_POST['login'])) {

    foreach ($_POST as $key => $val) {
        $_POST[$key] = trim($val);
        $_POST[$key] = strip_tags($val);
        $_POST[$key] = htmlspecialchars($val);
        $_POST[$key] = mysqli_real_escape_string($conn, $val);
    }

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = $_POST['email'];
        $password = md5($_POST['password']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            //check user exist or not
            $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_row($result);
                $_SESSION["login"] = true;
                $_SESSION["user"] = $user[1];
                header("Location: home.php");
            } else {
                $error = "invalid-parameters";
            }
        } else {
            $error = "invalid-email";
        }
    } else {
        $error = "empty-fields";
    }
    if ($error != false) {
        header('Location: index.php?form=login-form&err=' . $error);
    }
}
?>