<?php

require_once(dirname(__FILE__,2) . '/source/config/config.php');
require_once(dirname(__FILE__,2) . '/source/config/loader.php');


//require_once(MODEL_PATH . '/Login-model.php');
require_once((CONTROLLER_PATH) . '/login-controller.php');

/*$login = new Login( [
    'email' => 'admin@cod3r.com.br',
    'password' => 'na'
]);

try {
    $login->checkLogin();
    echo "show";
}catch(Exception $e){
    echo "Zika";
}
*/


/*$filtro = ['email' => 'quico@cod3r.com.br'];
$logintry = new Login(['name' => 'Quico']);
$logintry->getOne($filtro);*/

