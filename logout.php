<?php
session_start();
if (
        isset($_SESSION['login']) && $_SESSION['login'] == true 
        && isset($_SESSION['user']) && !empty($_SESSION['user'])
) {
    session_destroy();
    header('Location: index.php');
}
?>