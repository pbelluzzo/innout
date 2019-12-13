<?php
loadModel('login-model');
$exception = null;

if(count($_POST) > 0) {
    $login = new Login($_POST);
    try{
        $user = $login->checkLogin();
        echo "usuario {$user->name} logado";
    } catch(AppException $e){
        $exception = $e;
    }
}

loadView('login-view', $_POST + ['exception' => $exception]);