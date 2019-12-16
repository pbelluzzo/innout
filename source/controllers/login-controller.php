<?php
loadModel('login-model');
$exception = null;

if(count($_POST) > 0) {
    $login = new Login($_POST);
    try{
        $user = $login->checkLogin();
        header("Location: day_records.php");
    } catch(AppException $e){
        $exception = $e;
    }
}

loadView('login-view', $_POST + ['exception' => $exception]);