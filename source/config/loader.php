<?php

function loadModel($modelName){
    require_once(MODEL_PATH . "/{$modelName}.php");
}

function loadView($viewName, $params = array()){
    if(count($params) > 0){
        declareParams($params);
    }
    require_once(VIEW_PATH . "/{$viewName}.php ");
}

function declareParams($params){
foreach($params as $key => $value){
        declareIfValid($key, $value);
    }
}

function declareIfValid($key, $value){
    if(strlen($key)> 0){
        ${$key} = $value;
    }
}