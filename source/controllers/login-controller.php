<?php
loadModel('login-model');

if(count($_POST) > 0){
    $login - new Login($_POST);
    try{
        $user = $login->checkLogin();
        echo 'Usuário Logado';
    } catch(Exception $e){
        echo 'Falha no login';
    }
}

loadView('login-view', $_POST);