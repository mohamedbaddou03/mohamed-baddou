<?php
require_once 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = isset($_POST['login']) ? trim($_POST['login']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    if (empty($login) || empty($password)) {
        header("Location: login.php?error=1");
        exit();
    }
    if ($login === USERLOGIN && $password === USERPASS) {
        session_start();
        $_SESSION['CONNECT'] = 'OK';
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header("Location: accueil.php");
        exit();
    } else {
        header("Location: login.php?error=2");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>