<?php

function requireValidSession() {
    $user = $_SESSION['user'];
    if (!isset($user)){
        header('Location: login-controller.php');
        exit();
    }
}